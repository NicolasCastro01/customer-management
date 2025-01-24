<?php

namespace App\Controllers;

use App\Core\Response;

class AuthController
{
    public static function index()
    {
        return Response::json([
            'message' => 'Hello, World!'
        ]);
    }
}
