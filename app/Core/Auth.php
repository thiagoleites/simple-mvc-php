<?php

namespace App\Core;

class Auth
{
    protected static string $sessionKey = 'user';

    public static function check(): bool
    {
        return Session::has(self::$sessionKey);
    }

    public static function user(): ?array
    {
        return Session::get(self::$sessionKey);
    }

    public static function id(): int|string|null
    {
        return self::user()['id'] ?? null;
    }

    public static function uuid(): ?string
    {
        return self::user()['uuid'] ?? null;
    }

    public static function role(): ?string
    {
        return self::user()['role'] ?? null;
    }

    public static function login(array $user): void
    {
        unset($user['password']);

        Session::set(self::$sessionKey, $user);

        session_regenerate_id(true);
    }

    public static function logout(): void
    {
        Session::remove(self::$sessionKey);

        session_regenerate_id(true);
    }

    public static function requireLogin(): void
    {
        if (!self::check()) {
            Session::flash('error', 'Você precisa estar logado para acessar esta página.');
            redirect('/mvc/login');
        }
    }

    public static function requireGuest(): void
    {
        if (self::check()) {
            redirect('/mvc/dashboard');
        }
    }

    public static function requireRole(array $roles): void
    {
        self::requireLogin();

        if (!in_array(self::role(), $roles, true)) {
            http_response_code(403);

            require __DIR__ . '/../Views/errors/403.php';

            exit;
        }
    }

    public static function hasRole(string|array $roles): bool
    {
        $roles = is_array($roles) ? $roles : [$roles];

        return self::check() && in_array(self::role(), $roles, true);
    }
}