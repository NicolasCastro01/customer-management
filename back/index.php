<?php
require_once './vendor/autoload.php';
require_once __DIR__ . '/app/Providers/ServiceProvider.php';
require_once __DIR__ . '/app/Providers/AppServiceProvider.php';
require_once __DIR__ . '/app/Services/UserService.php';

use App\Providers\AppServiceProvider;
use App\Controllers\UserController;
use App\Core\Router;

$container = [];

$provider = new AppServiceProvider($container);
$provider->register();
$provider->boot();

$userService = $container['user_service']();

Router::get('/customers', [new UserController($userService), 'list']);
Router::post('/customers', [new UserController($userService), 'create']);

Router::dispatch();
