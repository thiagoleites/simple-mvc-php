<?php

namespace App\Controllers;

class LanguageController
{
    public function switch(mixed $lang)
    {
        $allowed = ['pt_br', 'en'];

        if (in_array($lang, $allowed)) {
            $_SESSION['lang'] = $lang;
        }

        header('Location: '. ($_SERVER['HTTP_REFERER'] ?? '/mvc/public/'));
        exit;
    }

    public function ptBr()
    {
        $this->switch('pt_br');
    }

    public function en()
    {
        $this->switch('en');
    }
}