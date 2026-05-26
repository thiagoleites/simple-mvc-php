<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Auth::requireLevel(['admin']);

        $users = User::all();

        $this->view('users/index', [
            'title' => 'Listagem de usuarios',
            'users' => $users
        ]);

    }
}