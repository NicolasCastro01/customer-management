<?php

namespace App\Controllers;

use App\Contracts\Services\CustomerServiceContract;
use App\Core\Request;
use App\Core\Response;
use App\DTOs\Customer\CreateCustomerDTO;
use App\Entities\Customer;
use App\Support\Serializers\CustomerSerializer;

class CustomerController
{
    private CustomerServiceContract $service;

    public function __construct(CustomerServiceContract $service)
    {
        $this->service = $service;
    }

    public function list()
    {
        $users = array_map(fn(Customer $customer) => CustomerSerializer::parse($customer), $this->service->getAll());

        return Response::json($users);
    }

    public function create()
    {
        try {
            $body = Request::getBody();
            $dto = new CreateCustomerDTO(
                $body['nome'],
                $body['data_nascimento'],
                $body['telefone'],
                $body['rg'],
                $body['cpf']
            );

            $this->service->create($dto);

            return Response::json('', 201);
        } catch (\Throwable $th) {
            return Response::json('Ocorreu um erro interno.', 500);
        }
    }
}
