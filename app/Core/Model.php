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

    public static function findByUuid(string $uuid): ?array
    {
        return static::firstWhere(static::$publicKey, $uuid);
    }

    public static function where(string $column, mixed $value): array
    {
        $sql = "
            SELECT *
            FROM " . static::$table . "
            WHERE {$column} = :value
        ";

        $stmt = static::db()->prepare($sql);

        $stmt->execute([
            ':value' => $value
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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


    public static function create(array $data): bool
    {
        if (!isset($data[static::$publicKey])) {
            $data[static::$publicKey] = static::generateUuid();
        }

        $columns = implode(', ', array_keys($data));

        $placeholders = ':' . implode(', :', array_keys($data));

        $sql = "
            INSERT INTO " . static::$table . "
            ({$columns})
            VALUES ({$placeholders})
        ";

        $stmt = static::db()->prepare($sql);

        return $stmt->execute($data);
    }

    protected static function generateUuid(): string
    {
        $data = random_bytes(16);

        $data[6] = chr(
            ord($data[6]) & 0x0f | 0x40
        );

        $data[8] = chr(
            ord($data[8]) & 0x3f | 0x80
        );

        return vsprintf(
            '%s%s-%s-%s-%s-%s%s%s',
            str_split(bin2hex($data), 4)
        );
    }
}