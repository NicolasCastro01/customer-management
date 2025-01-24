<?php

namespace App\Providers;

use App\Repositories\InMemory\UserRepositoryInMemory;
use App\Services\UserService;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Registra o serviço no container
        $this->container['user_service'] = function () {
            $userRepository = new UserRepositoryInMemory();

            return new UserService($userRepository);
        };
    }

    public function boot()
    {
        // Aqui você pode inicializar algo adicional, se necessário
    }
}
