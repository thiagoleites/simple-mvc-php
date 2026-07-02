<?php

/*
 * Routes - Rotas
 * 
 */

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\UserController;

use App\Controllers\LanguageController;


$router->get('/', [HomeController::class, 'index']);

$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'authenticate']);
$router->get('/logout', [AuthController::class, 'logout']);

$router->get('/usuarios', [UserController::class, 'index']);


// Language switcher route
$router->get('/lang/pt_br', [LanguageController::class, 'ptBr']);
$router->get('/lang/en', [LanguageController::class, 'en']);