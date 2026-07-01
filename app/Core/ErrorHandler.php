<?php

namespace App\Core;

/**
 * Responsável pelo tratamento centralizado de erros da aplicação.
 *
 * Permite interromper a execução da aplicação, definir o código
 * de resposta HTTP e exibir uma página de erro personalizada.
 */
class ErrorHandler
{
    /**
     * Interrompe a execução da aplicação exibindo uma página de erro.
     *
     * Define o código de status HTTP informado, carrega a view
     * de erro e encerra a execução do script.
     *
     * Exemplo:
     * ```php
     * ErrorHandler::abort('Página não encontrada.', 404);
     * ```
     *
     * @param string $message Mensagem de erro que será disponibilizada para a view.
     * @param int $code Código de status HTTP. O padrão é 500 (Internal Server Error).
     *
     * @return never
     */
    public static function abort(string $message, int $code = 500)
    {
        http_response_code($code);

        require __DIR__ . '/../Views/errors/error.php';

        exit;
    }
}