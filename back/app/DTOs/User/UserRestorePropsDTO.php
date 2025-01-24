<?php

namespace App\DTOs\User;

class UserRestorePropsDTO
{
    public function __construct(
        public int $identifier,
        public string $name,
        public string $email,
        public string $password
    ) {}
}
