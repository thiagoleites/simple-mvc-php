<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Auth;

class UserController extends Controller
{
    public function index()
    {
        Auth::requireLevel(['admin']);

        $usuarios = [
            ['nome' => 'Thiago', 'nivel' => 'admin'],
            ['nome' => 'João', 'nivel' => 'usuario'],
        ];

        $this->view('users/index', [
            'titulo' => 'Listagem de usuários',
            'usuarios' => $usuarios
        ]);


    }
}