<?php

namespace App\Controllers;


use App\Core\Controller;


class HomeController extends Controller
{
    public function index()
    {
        $this->view('home', [
            'titulo'    => 'Página Home',
            'scripts'   => [
                asset('js/components/tabs.js'),
                asset('js/components/progress.js'),
                asset('js/pages/home.js')
            ]
        ]);
    }
}