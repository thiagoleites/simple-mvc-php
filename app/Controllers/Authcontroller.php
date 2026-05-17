<?php

namespace App\Controllers;

use App\Core\Controller;

class AuthController extends Controller
{
    public function login()
    {
        $this->view('login');
    }

    public function authenticate()
    {
        $email = $_POST['email'] ?? '';
        $senha = $_POST['password'] ?? '';

        if ($email === 'admin@email.com' && $senha === '123456') {
            $_SESSION['usuario'] = [
                'id' => 1,
                'nome' => 'Admin',
                'email' => $email,
                'nivel' => 'admin'
            ];

            $this->redirect('/');
        }

        echo "Login inválido";
    }

    public function logout()
    {
        session_destroy();

        $this->redirect('/login');
    }
}