<?php

namespace App\Fakers;

use App\DTOs\User\UserRestorePropsDTO;
use App\Entities\User;
use Faker\Factory;

class UserFaker
{
    private static UserFaker $instance;

    private ?int $identifier;
    private ?string $name;
    private ?string $email;
    private ?string $password;

    private function __construct()
    {
        $faker = Factory::create();
        $this->identifier = $faker->randomNumber();
        $this->name = $faker->name;
        $this->email = $faker->email();
        $this->password = $faker->password();
    }

    public static function getInstance(): UserFaker
    {
        if (!isset(static::$instance)) {
            self::$instance = new UserFaker();
        }

        return self::$instance;
    }

    public function withIdentifier(int $identifier): UserFaker
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function withName(string $string): UserFaker
    {
        $this->name = $string;

        return $this;
    }

    public function withEmail(string $string): UserFaker
    {
        $this->email = $string;

        return $this;
    }

    public function withPassword(string $string): UserFaker
    {
        $this->password = $string;

        return $this;
    }

    public function build(): User
    {
        $props = new UserRestorePropsDTO(
            $this->identifier,
            $this->name,
            $this->email,
            $this->password
        );

        return User::restore($props);
    }
}
