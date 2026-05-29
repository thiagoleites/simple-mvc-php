<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Validator;
use App\Core\Session;

class AuthController extends Controller
{
    public function login()
    {
        $this->view('login');
    }

    public function authenticate()
    {
        $validator = Validator::make($_POST)
            ->required('email', 'Informe seu e-mail.')
            ->email('email', 'Digite um e-mail válido.')
            ->required('password', 'Informe sua senha.')
            ->min('password', 6, 'A senha precisa ter pelo menos 6 caracteres.');

        if ($validator->fails()) {
            Session::setErrors($validator->errors());
            Session::setOld($_POST);
            Session::flash('error', 'Corrija os campos destacados.');

            redirect('/mvc/login');
        }
    }

    public function logout()
    {
        session_destroy();

        $this->redirect('/login');
    }
}