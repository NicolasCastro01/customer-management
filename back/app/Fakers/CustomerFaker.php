<?php

namespace App\Fakers;

use App\DTOs\Customer\RestoreCustomerPropsDTO;
use App\DTOs\User\UserRestorePropsDTO;
use App\Entities\Customer;
use App\Entities\User;
use Faker\Factory;

class CustomerFaker
{
    private static CustomerFaker $instance;

    private ?int $identifier;
    private ?string $name;
    private ?string $birthDate;
    private ?string $phone;
    private ?string $rg;
    private ?string $cpf;

    private function __construct()
    {
        $faker = Factory::create();
        $this->identifier = $faker->randomNumber();
        $this->name = $faker->name;
        $this->birthDate = $faker->date();
        $this->phone = $faker->phoneNumber;
        $this->rg = $faker->randomNumber();
        $this->cpf = $faker->randomNumber();
    }

    public static function getInstance(): CustomerFaker
    {
        if (!isset(static::$instance)) {
            self::$instance = new CustomerFaker();
        }

        return self::$instance;
    }

    public function withIdentifier(int $identifier): CustomerFaker
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function withName(string $string): CustomerFaker
    {
        $this->name = $string;

        return $this;
    }

    public function withBirthDate(string $string): CustomerFaker
    {
        $this->birthDate = $string;

        return $this;
    }

    public function withPhone(string $string): CustomerFaker
    {
        $this->phone = $string;

        return $this;
    }

    public function withRg(string $string): CustomerFaker
    {
        $this->rg = $string;

        return $this;
    }

    public function withCpf(string $string): CustomerFaker
    {
        $this->cpf = $string;

        return $this;
    }

    public function build(): Customer
    {
        $props = new RestoreCustomerPropsDTO(
            $this->name,
            $this->birthDate,
            $this->phone,
            $this->rg,
            $this->cpf,
            $this->identifier,
        );

        return Customer::restore($props);
    }
}
