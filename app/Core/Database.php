<?php

namespace App\Core;

use PDO;
use PDOException;

/**
 * Classe responsável pela conexão com o banco de dados.
 *
 * Implementa um padrão Singleton simples utilizando
 * conexão PDO compartilhada pela aplicação.
 *
 * Configura automaticamente:
 * - Host
 * - Porta
 * - Banco
 * - Charset
 * - Credenciais
 *
 * utilizando variáveis de ambiente (.env).
 *
 * @package App\Core
 */
class Database
{
    /**
     * Instância única da conexão PDO.
     *
     * Mantém apenas uma conexão ativa durante
     * o ciclo de vida da aplicação.
     *
     * @var PDO|null
     */
    private static ?PDO $connection = null;

    /**
     * Retorna uma instância ativa da conexão PDO.
     *
     * Caso a conexão já exista, reutiliza a mesma instância.
     * Caso contrário, cria uma nova conexão utilizando
     * configurações definidas nas variáveis de ambiente.
     *
     * Variáveis suportadas:
     *
     * - DB_HOST
     * - DB_PORT
     * - DB_DATABASE
     * - DB_USERNAME
     * - DB_PASSWORD
     *
     * Configurações padrão:
     *
     * - Host: localhost
     * - Porta: 3306
     * - Banco: mvc
     * - Charset: utf8mb4
     * - Usuário: root
     * - Senha: root
     *
     * Opções PDO aplicadas:
     *
     * - ERRMODE_EXCEPTION → lança exceções SQL
     * - FETCH_ASSOC → retorno em array associativo
     *
     * @return PDO Instância ativa da conexão.
     */
    public static function connection(): PDO
    {
        // reutiliza conexão existente
        if (self::$connection) {
            return self::$connection;
        }

        try {

            /*
            |--------------------------------------------------------------------------
            | Configuração do banco via ENV
            |--------------------------------------------------------------------------
            */

            $host = getenv('DB_HOST') ?: 'localhost';
            $port = getenv('DB_PORT') ?: '3306';
            $database = getenv('DB_DATABASE') ?: 'mvc';
            $charset = 'utf8mb4';

            $username = getenv('DB_USERNAME') ?: 'root';
            $password = getenv('DB_PASSWORD') ?: 'root';

            /*
            |--------------------------------------------------------------------------
            | DSN PDO
            |--------------------------------------------------------------------------
            */

            $dsn = sprintf(
                'mysql:host=%s;port=%s;dbname=%s;charset=%s',
                $host,
                $port,
                $database,
                $charset
            );

            /*
            |--------------------------------------------------------------------------
            | Configurações PDO
            |--------------------------------------------------------------------------
            */

            $options = [

                // lança exceções em erros SQL
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

                // fetch padrão como array associativo
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];

            /*
            |--------------------------------------------------------------------------
            | Criação da conexão
            |--------------------------------------------------------------------------
            */

            self::$connection = new PDO(
                $dsn,
                $username,
                $password,
                $options
            );

            return self::$connection;

        } catch (PDOException $e) {

            /*
            |--------------------------------------------------------------------------
            | Tratamento de falha de conexão
            |--------------------------------------------------------------------------
            */

            ErrorHandler::abort(
                __('database.connection_error')
                . ': '
                . $e->getMessage()
            );
        }
    }
}