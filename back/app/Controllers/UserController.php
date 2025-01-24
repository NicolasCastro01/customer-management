<?php

namespace App\Controllers;

use App\Contracts\Services\UserServiceContract;
use App\Core\Response;
use App\Entities\User;
use App\Support\Serializers\UserSerializer;

class UserController
{
    private UserServiceContract $service;

    public function __construct(UserServiceContract $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $users = array_map(fn(User $user) => UserSerializer::parse($user), $this->service->getAllUsers());

        return Response::json($users);
    }
}
