<?php

namespace App\Core;

class Router {
    private static $routes = [];

    public static function get($route, $callback) {
        self::$routes['GET'][$route] = $callback;
    }

    public static function post($route, $callback) {
        self::$routes['POST'][$route] = $callback;
    }

    public static function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (isset(self::$routes[$method][$path])) {
            call_user_func(self::$routes[$method][$path]);
        } else {
            http_response_code(404);
            echo "❌ 404 - Rota não encontrada!";
        }
    }
}