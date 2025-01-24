<?php

namespace App\Entities;

use App\DTOs\Customer\CreateCustomerPropsDTO;
use App\DTOs\Customer\RestoreCustomerPropsDTO;
use App\DTOs\User\UserCreatePropsDTO;
use App\DTOs\User\UserRestorePropsDTO;

class Customer extends Entity
{
    private string $name;
    private string $birth_date;
    private string $cpf;
    private string $rg;
    private string $phone;

    private function __construct(string $name, string $birth_date, string $cpf, string $rg, string $phone, ?int $identifier = null)
    {
        parent::__construct($identifier);
        $this->name = $name;
        $this->birth_date = $birth_date;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->phone = $phone;
    }

    public static function create(CreateCustomerPropsDTO $createCustomerPropsDTO): Customer
    {
        return new Customer(
            $createCustomerPropsDTO->name,
            $createCustomerPropsDTO->birth_date,
            $createCustomerPropsDTO->cpf,
            $createCustomerPropsDTO->rg,
            $createCustomerPropsDTO->phone
        );
    }

    public static function restore(RestoreCustomerPropsDTO $restoreCustomerPropsDTO): Customer
    {
        return new Customer(
            $restoreCustomerPropsDTO->name,
            $restoreCustomerPropsDTO->birth_date,
            $restoreCustomerPropsDTO->cpf,
            $restoreCustomerPropsDTO->rg,
            $restoreCustomerPropsDTO->phone,
            $restoreCustomerPropsDTO->identifier
        );
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBirthDate(): string
    {
        return $this->birth_date;
    }

    public function getCPF(): string
    {
        return $this->cpf;
    }

    public function getRG(): string
    {
        return $this->rg;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }
}
