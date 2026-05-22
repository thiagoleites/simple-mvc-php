<?php

namespace App\Core;

use PDO;

abstract class Model
{
    protected static string $table;

    protected static function db(): PDO
    {
        return Database::connection();
    }

    public static function all(): array
    {
        $stmt = self::db()->query("SELECT * FROM " . static::$table);

        return $stmt->fetchAll();
    }
}