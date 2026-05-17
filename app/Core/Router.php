<?php

namespace App\Core;

class Router
{
    private array $routes = [];

    public function get(string $uri, array $action)
    {
        $this->routes["GET"][$uri] = $action;
    }

    public function post(string $uri, array $action)
    {
         $this->routes["POST"][$uri] = $action;
    }

    public function dispatch(string $uri, string $method)
    {
        $uri = parse_url($uri, PHP_URL_PATH);

        $basePath = '/mvc';

        // Remove /mvc/public
        if (str_starts_with($uri, $basePath)) {
            $uri = substr($uri, strlen($basePath));
        }

        // Remove /index.php
        $uri = str_replace('/index.php', '', $uri);

        // Corrige vazio
        if ($uri === '' || $uri === '/') {
            $uri = '/';
        }

        if (!isset($this->routes[$method][$uri])) {
            http_response_code(404);
            echo "Rota não encontrada: " . $uri;
            return;
        }

        [$controller, $action] = $this->routes[$method][$uri];

        $controllerInstance = new $controller();
        $controllerInstance->$action();
    }
}