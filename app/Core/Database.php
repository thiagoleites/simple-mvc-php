<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{

    private static ?PDO $connection = null;

    public static function connection()
    {
        if (self::$connection) {
            return self::$connection;
        }

        try {

            // define vars from env
            $host = getenv('DB_HOST') ?? 'localhost';
            $port = getenv('DB_PORT') ?? '3306';
            $database = getenv('DB_DATABASE') ?? 'mvc';
            $charset = 'utf8mb4';
            $username = getenv('DB_USERNAME') ?? 'root';
            $password = getenv('DB_PASSWORD') ?? 'root';

            $dsn = "mysql:host=$host;port=$port;dbname=$database;charset=$charset";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];
        
            self::$connection = new PDO($dsn, $username, $password, $options);
            
            return self::$connection;

        } catch (PDOException $e) {
            ErrorHandler::abort(
                __('database.connection_error') . ': ' . $e->getMessage()
            );
        }
    }
}