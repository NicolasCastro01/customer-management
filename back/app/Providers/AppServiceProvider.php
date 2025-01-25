<?php

namespace App\Providers;

use App\Repositories\InMemory\CustomerRepositoryInMemory;
use App\Repositories\InMemory\UserRepositoryInMemory;
use App\Services\CustomerService;
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

        $this->container['customer_service'] = function () {
            $customerRepository = new CustomerRepositoryInMemory();

            return new CustomerService($customerRepository);
        };
    }

    public function boot()
    {
        // Aqui você pode inicializar algo adicional, se necessário
    }
}
