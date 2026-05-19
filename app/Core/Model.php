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
}