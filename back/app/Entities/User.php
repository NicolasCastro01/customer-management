<?php

namespace App\Entities;

use App\DTOs\User\UserCreatePropsDTO;
use App\DTOs\User\UserRestorePropsDTO;

class User extends Entity
{
    private string $name;
    private string $email;
    private string $password;

    private function __construct($name, $email, $password, ?int $identifier = null)
    {
        parent::__construct($identifier);
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public static function create(UserCreatePropsDTO $userCreatePropsDTO): User
    {
        return new User(
            $userCreatePropsDTO->name,
            $userCreatePropsDTO->email,
            $userCreatePropsDTO->password
        );
    }

    public static function restore(UserRestorePropsDTO $userRestorePropsDTO): User
    {
        return new User(
            $userRestorePropsDTO->name,
            $userRestorePropsDTO->email,
            $userRestorePropsDTO->password,
            $userRestorePropsDTO->identifier
        );
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
