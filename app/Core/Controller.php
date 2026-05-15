<?php

namespace App\Core;

class Controller
{
    protected function view(string $view, array $data = [])
    {
        extract($data);

        $pathView = __DIR__ . '/../Views/' . $view . '.php';

        require __DIR__ . '/../Views/layouts/base.php';
    }

    protected function redirect(string $url)
    {
        header("Location: {$url}");
        exit;
    }
}