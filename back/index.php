<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Router;
use App\Controllers\UserController;

// Definição de rotas
Router::get('/users', [UserController::class, 'index']);

// Executar o roteador
Router::dispatch();