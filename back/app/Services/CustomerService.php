<?php

namespace App\Services;

use App\Contracts\Repositories\CustomerRepositoryContract;
use App\Contracts\Services\CustomerServiceContract;
use App\DTOs\Customer\CreateCustomerDTO;

class CustomerService implements CustomerServiceContract
{
    private CustomerRepositoryContract $repository;

    public function __construct(CustomerRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        // Implement getAll method
    }

    public function create(CreateCustomerDTO $dto): void
    {
        // Implement create method
    }
}
