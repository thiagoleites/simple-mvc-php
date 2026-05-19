<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    const DB_HOST = 'localhost';
    const DB_NAME = 'mvc_db';
    const DB_USER = 'root';
    const DB_PASS = '';

    private static ?\PDO $connection = null;

    public static function connection()
    {
        if (self::$connection) {
            return self::$connection;
        }

        try {
            self::$connection = new PDO(
                'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME . ';charset=utf8mb4',
                self::DB_USER,
                self::DB_PASS,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]
            );
            return self::$connection;

        } catch (PDOException $e) {
            die(_('database.connection_error') . ': ' . $e->getMessage());
        }
    }
}