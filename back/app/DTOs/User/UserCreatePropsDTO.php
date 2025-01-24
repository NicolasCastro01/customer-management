<?php

namespace App\DTOs\User;

class UserCreatePropsDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password
    ) {}
}
