<?php

namespace App\Core;

class ErrorHandler
{

    public static function abort(string $message, int $code = 500)
    {
        http_response_code($code);

        require __DIR__ . '/../Views/errors/error.php';

        exit;
    }
}