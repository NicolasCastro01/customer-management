<?php

namespace App\Contracts\Repositories;

use App\Entities\Customer;

interface CustomerRepositoryContract
{
    public function all(): array;

    public function create(Customer $entity): void;

    public function findById(int $id): array;

    public function update(int $id, Customer $entity): void;

    public function delete(int $id): void;
}
