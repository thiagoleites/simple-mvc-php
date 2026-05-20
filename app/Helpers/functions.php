<?php

function __(mixed $key)
{
    $lang = $_SESSION['lang'] ?? 'pt_br';

    $file = __DIR__ . '/../Lang/' . $lang . '.php';

    if (!file_exists($file)) {
        return $key;
    }

    $langArray = require $file;
    return $langArray[$key] ?? $key;
    
}