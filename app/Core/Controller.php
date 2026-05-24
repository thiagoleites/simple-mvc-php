<?php

namespace App\Core;

class Controller
{
    protected function view(string $view, array $data = [])
    {
        $scripts    = $data['scripts'] ?? [];
        $styles     = $data['styles'] ?? [];

        extract($data);

        $pathView   = __DIR__ . '/../Views/' . $view . '.php';

        require __DIR__ . '/../Views/layouts/base.php';
    }

    protected function redirect(string $url)
    {
        header("Location: {$url}");
        exit;
    }
}