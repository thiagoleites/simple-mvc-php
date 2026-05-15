<?php

namespace App\Core;

class Router
{
    private array $routes = [];

    public function get(string $uri, array $action)
    {
        $this->routes["GET"][$uri] = $actions;
    }

    public function post(string $uri, array $actions)
    {
         $this->routes["POST"][$uri] = $actions;
    }

    public function dispatch(string $uri, string $method)
    {
        $uri = parse_url($uri, PHP_URL_PATH);

        if (!isset($this->routes[$method][$uri])) {
            http_response_code(404);
            echo "Página não encontrada";
            return;
        }

        [$controller, $methodName] = $this->routes[$method][$uri];
        $controllerInstance = new $controller();

        $controllerInstance->$methodName;
    }
}