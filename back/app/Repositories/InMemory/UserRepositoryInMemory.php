<?php

namespace App\Repositories\InMemory;

use App\Contracts\Repositories\UserRepositoryContract;
use App\Entities\User;
use App\Fakers\UserFaker;
use Exception;

class UserRepositoryInMemory implements UserRepositoryContract
{
    private array $users = [];

    public function __construct()
    {
        $this->users[] = UserFaker::getInstance()
            ->withIdentifier(1)
            ->withName('John Doe')
            ->withEmail('john.doe@gmail.com')
            ->withPassword('123456')
            ->build();
    }

    public function all(): array
    {
        return $this->users;
    }

    public function create(User $entity): void
    {
        $this->existsUser($entity);

        $this->users[] = $entity;
    }

    public function findById(int $id): array
    {
        return $this->users[$id];
    }

    public function update(int $id, User $entity): void
    {
        $this->users = array_filter($this->users, function ($user) use ($id) {
            return $user->getId() !== $id;
        });

        $this->users[$id] = $entity;
    }

    public function delete(int $id): void
    {
        unset($this->users[$id]);
    }

    private function existsUser(User $entity)
    {
        $user = array_filter($this->users, function ($user) use ($entity) {
            return $user->getEmail() === $entity->getEmail();
        });

        if ($user) throw new Exception('User already exists');
    }
}
