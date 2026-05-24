<?php

namespace App\Core;

use PDO;

abstract class Model
{
    protected static string $table;
    protected static string $primaryKey = 'id';
    protected static string $publicKey = 'uuid';

    protected static function db(): PDO
    {
        return Database::connection();
    }

    public static function all(): array
    {
        $stmt = self::db()->query("SELECT * FROM " . static::$table);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find(int|string $id): ?array
    {
        return static::firstWhere(static::$primaryKey, $id);
    }

    public static function firstWhere(string $column, mixed $value): ?array
    {
        $sql = "
            SELECT *
            FROM " . static::$table . "
            WHERE {$column} = :value
            LIMIT 1
        ";

        $stmt = static::db()->prepare($sql);

        $stmt->execute([
            ':value' => $value
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ?: null;
    }
}