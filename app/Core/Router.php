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

        // remover /public/indesx se estiver acessando

        $uri = str_replace('public/index.php', '', $uri);

        if ($uri === '') {
            $uri = '/';
        }

        if (!isset($this->routes[$method][$uri])) {
            http_response_code(404);
            echo "Rota não encontrada: " . $uri;
            return;
        }
        
        [$controller, $action] = $this->routes[$method][$uri];
        
        if (!class_exists($controller)) {
            echo "Controller não encontrado: " . $controller;
            return;
        }
            
        $controllerInstance = new $controller();

        if (!method_exists($controllerInstance, $action)) {
            echo "Método não encontrado: " . $action;
        }
            
        $controllerInstance->$action();
    }
}