<?php

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\UserController;


$router->get('/', [HomeController::class, 'index']);

$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'authenticate']);
$router->get('/logout', [AuthController::class, 'logout']);

$router->get('/usuarios', [UserController::class, 'index']);