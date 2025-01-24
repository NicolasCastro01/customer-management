<?php

namespace App\Contracts\Repositories;

use App\Entities\User;

interface UserRepositoryContract
{
    public function all();
    public function findById(int $id);
    public function create(User $entity);
    public function update(int $id, User $entity);
    public function delete(int $id);
}
