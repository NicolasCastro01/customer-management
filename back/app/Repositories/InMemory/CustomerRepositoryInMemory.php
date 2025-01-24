<?php

namespace App\Repositories\InMemory;

use App\Contracts\Repositories\CustomerRepositoryContract;
use App\Entities\Customer;
use App\Fakers\CustomerFaker;
use Exception;

class CustomerRepositoryInMemory implements CustomerRepositoryContract
{
    private array $customers = [];

    public function __construct()
    {
        $this->customers[] = CustomerFaker::getInstance()
            ->withIdentifier(1)
            ->withName('John Doe')
            ->withBirthDate('1990-01-01')
            ->withPhone('123456789')
            ->withRg('123456')
            ->withCpf('123456')
            ->build();
    }

    public function all(): array
    {
        return $this->customers;
    }

    public function create(Customer $entity): void
    {
        $this->existsCustomer($entity);

        $this->customers[] = $entity;
    }

    public function findById(int $id): array
    {
        return $this->customers[$id];
    }

    public function update(int $id, Customer $entity): void
    {
        $this->customers = array_filter($this->customers, function ($customer) use ($id) {
            return $customer->getId() !== $id;
        });

        $this->customers[$id] = $entity;
    }

    public function delete(int $id): void
    {
        unset($this->customers[$id]);
    }

    private function existsCustomer(Customer $entity)
    {
        $customer = array_filter($this->customers, function (Customer $customer) use ($entity) {
            return $customer->getCPF() === $entity->getCPF();
        });

        if ($customer) throw new Exception('Customer already exists');
    }
}
