<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/../vendor/autoload.php";


loadEnv('../.env');


use App\Core\Router;

$router = new Router();

require_once __DIR__ . '/../routes/web.php';

$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);