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

function loadEnv(mixed $path)
{
    if (!file_exists($path)) {
        throw new Exception(".env não encontrado");
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        // Ignora comentários
        if (str_starts_with(trim($line), '#')) {
            continue;
        }

        // Ignora linhas inválidas
        if (!str_contains($line, '=')) {
            continue;
        }

        [$key, $value] = explode('=', $line, 2);

        $key = trim($key);
        $value = trim($value);

        // remove aspas
        $value = trim($value, '"');

        $_ENV[$key] = $value;

        putenv("$key=$value");
    }
}

function env(mixed $key, mixed $default = null)
{
    return $_ENV[$key] ?? getenv($key) ?? $default;
}