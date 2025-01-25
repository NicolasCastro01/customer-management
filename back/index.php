<?php
require_once './vendor/autoload.php';
require_once __DIR__ . '/app/Providers/ServiceProvider.php';
require_once __DIR__ . '/app/Providers/AppServiceProvider.php';
require_once __DIR__ . '/app/Services/UserService.php';
require_once __DIR__ . '/app/Services/CustomerService.php';

use App\Controllers\CustomerController;
use App\Providers\AppServiceProvider;
use App\Core\Router;

$container = [];

$provider = new AppServiceProvider($container);
$provider->register();
$provider->boot();

$userService = $container['user_service']();
$customerService = $container['customer_service']();

Router::get('/customers', [new CustomerController($customerService), 'list']);
Router::post('/customers', [new CustomerController($customerService), 'create']);

Router::dispatch();
