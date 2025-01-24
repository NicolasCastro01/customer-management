<?php

namespace App\Controllers;

use App\Contracts\Services\UserServiceContract;
use App\Core\Request;
use App\Core\Response;
use App\DTOs\Customer\CreateCustomerDTO;
use App\Entities\User;
use App\Support\Serializers\UserSerializer;

class UserController
{
    private UserServiceContract $service;

    public function __construct(UserServiceContract $service)
    {
        $this->service = $service;
    }

    public function list()
    {
        $users = array_map(fn(User $user) => UserSerializer::parse($user), $this->service->getAllUsers());

        return Response::json($users);
    }

    public function create()
    {
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
    }
}
