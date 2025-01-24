<?php
require_once './vendor/autoload.php';
require_once __DIR__ . '/app/Providers/ServiceProvider.php';
require_once __DIR__ . '/app/Providers/AppServiceProvider.php';
require_once __DIR__ . '/app/Services/UserService.php';

use App\Providers\AppServiceProvider;
use App\Controllers\UserController;
use App\Core\Router;

// Container de serviços
$container = [];

// Registrar o provedor
$provider = new AppServiceProvider($container);
$provider->register();
$provider->boot();

// Acessar o serviço através do container
$userService = $container['user_service']();

// Definição de rotas
Router::get('/users', [new UserController($userService), 'index']);

// Executar o roteador
Router::dispatch();
