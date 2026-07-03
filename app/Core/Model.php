<?php

namespace App\Core;

use PDO;

/**
 * Classe base absatrata para Models.
 * 
 * Fornece métodos genéricos para operações CRUD:
 * - Listar todos os registros
 * - Buscar por ID
 * - Buscar por UUID
 * - Criar registros
 * - Atualizar registros
 * - Remover registros
 * - Contatar registros
 * 
 * Cada Model que herdar esta classe deve definir pelo menos:
 * 
 * protected static string $table = 'nome_da_tabela';
 */

abstract class Model
{   
    /**
     * Nome da tabela no banco
     */
    protected static string $table;

    /**
     * Chave primária da tabela.
     */
    protected static string $primaryKey = 'id';
    
    /**
     * Chave pública da tabela.
     */
    protected static string $publicKey = 'uuid';


    /**
     * Retorna a conexão PDO com o banco de dados.
     */

    protected static function db(): PDO
    {
        return Database::connection();
    }

    /**
     * Retorna todos os registros da tabela.
     */

    public static function all(): array
    {
        $stmt = self::db()->query("SELECT * FROM " . static::$table);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Busca registro pela chave primária
     */

    public static function find(int|string $id): ?array
    {
        return static::firstWhere(static::$primaryKey, $id);
    }

    /**
     * Busca registro pelo UUID.
     */

    public static function findByUuid(string $uuid): ?array
    {
        return static::firstWhere(static::$publicKey, $uuid);
    }

    /**
     * Retorna todos os registro onde uma coluna possui determinado valor.
     */

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

    /**
     * Retorna o primeiro registro encontrado onde uma coluna possui determinado valor. 
     */

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

    /**
     * Cria um novo registro na tabela.
     * 
     * Caso o UUID não seja informado, ele será gerado automaticamente.
     */

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

    /**
     * Atualiza um registro pela chave primária.
     */

    public static function update(int|string $id, array $data): bool
    {
        $fields = [];

        foreach ($data as $column => $value) {
            $fields[] = "{$column} = :{$column}";
        }

        $fields = implode(', ', $fields);

        $sql = "
            UPDATE " . static::$table . "
            SET {$fields}
            WHERE " . static::$primaryKey . " = :id
        ";

        $data['id'] = $id;

        $stmt = static::db()->prepare($sql);

        return $stmt->execute($data);
    }

    /**
     * Remove um regsitro pela chave primária.
     */

    public static function delete(int|string $id): bool
    {
        $sql = "
            DELETE FROM " . static::$table . "
            WHERE " . static::$primaryKey . " = :id
        ";

        $stmt = static::db()->prepare($sql);

        return $stmt->execute([
            ':id' => $id
        ]);
    }
    /**
     * Atualiza um resgistro pelo UUID.
     */

    public static function updateByUuid(string $uuid, array $data): bool
    {
        $fields = [];

        foreach ($data as $column => $value) {
            $fields[] = "{$column} = :{$column}";
        }

        $fields = implode(', ', $fields);

        $sql = "
            UPDATE " . static::$table . "
            SET {$fields}
            WHERE " . static::$publicKey . " = :uuid
        ";

        $data['uuid'] = $uuid;

        $stmt = static::db()->prepare($sql);

        return $stmt->execute($data);
    }

    public static function deleteByUuid(string $uuid): bool
    {
        $sql = "
            DELETE FROM " . static::$table . "
            WHERE " . static::$publicKey . " = :uuid
        ";

        $stmt = static::db()->prepare($sql);

        return $stmt->execute([
            ':uuid' => $uuid
        ]);
    }

    public static function count(): int
    {
        $stmt = static::db()->query(
            "SELECT COUNT(*) FROM " . static::$table
        );

        return (int) $stmt->fetchColumn();
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