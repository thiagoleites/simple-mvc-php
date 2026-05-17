<?php

namespace App\Core;

class Auth
{
    public static function check()
    {
        return isset($_SESSION['usuario']);
    }

    public static function user()
    {
        return $_SESSION['usuario'] ?? null;
    }

    public static function requireLogin()
    {
        if (!self::check()) {
            header('Location: /login');
            exit;
        }
    }

    public static function requireLevel(array $levels)
    {
        self::requireLogin();

        $nivel = $_SESSION['usuario']['nivel'] ?? null;

        if (!in_array($nivel, $levels)) {
            http_response_code(403);
            echo "Acesso negado.";
            exit;
        }
    }
}