<?php

namespace App\Contracts\Services;

use App\DTOs\Customer\CreateCustomerDTO;

interface CustomerServiceContract
{
    public function getAll();

    public function create(CreateCustomerDTO $dto): void;
}
