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

function asset(string $path): string
{
    return '/mvc/public/assets/' . ltrim($path, '/');
}

if (!function_exists('redirect')) {

    function redirect(string $url): never
    {
        header("Location: {$url}");
        exit;
    }

}

function old(string $key, mixed $default = ''): mixed
{
    global $old;

    return htmlspecialchars($old[$key] ?? $default, ENT_QUOTES, 'UTF-8');
}

function error(string $key): ?string
{
    global $errors;

    return $errors[$key] ?? null;
}

function has_error(string $key): bool
{
    return error($key) !== null;
}

function error_tooltip(string $key): string
{
    $message = error($key);

    if (!$message) {
        return '';
    }

    return 'data-tooltip="' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '" class="field-error"';
}

function dd(mixed $value): never
{
	echo '<pre>';
	var_dump($value);
	echo '</pre>';
	die();
}