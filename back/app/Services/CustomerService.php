<?php

namespace App\Services;

use App\Contracts\Repositories\CustomerRepositoryContract;
use App\Contracts\Services\CustomerServiceContract;
use App\DTOs\Customer\CreateCustomerDTO;
use App\DTOs\Customer\CreateCustomerPropsDTO;
use App\Entities\Customer;

class CustomerService implements CustomerServiceContract
{
    private CustomerRepositoryContract $repository;

    public function __construct(CustomerRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->all();
    }

    public function create(CreateCustomerDTO $dto): void
    {
        $props = new CreateCustomerPropsDTO(
            $dto->name,
            $dto->birth_date,
            $dto->phone,
            $dto->rg,
            $dto->cpf
        );
        $customer = Customer::create($props);

        $this->repository->create($customer);
    }
}
