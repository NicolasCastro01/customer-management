<?php

namespace App\Contracts\Services;

use App\DTOs\Customer\CreateCustomerDTO;

interface UserServiceContract
{
    public function getAllUsers();
}
