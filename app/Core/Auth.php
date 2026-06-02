<?php

namespace App\Core;

/**
 * Classe responsável pela autenticação e autorização da aplicação.
 *
 * Gerencia login, logout, sessão do usuário autenticado,
 * verificação de permissões e controle de acesso por roles.
 *
 * @package App\Core
 */
class Auth
{
    /**
     * Chave utilizada para armazenar o usuário na sessão.
     *
     * @var string
     */
    protected static string $sessionKey = 'user';

    /**
     * Verifica se existe um usuário autenticado.
     *
     * @return bool Retorna true se o usuário estiver logado.
     */
    public static function check(): bool
    {
        return Session::has(self::$sessionKey);
    }

    /**
     * Retorna os dados completos do usuário autenticado.
     *
     * @return array|null Dados do usuário ou null caso não exista login.
     */
    public static function user(): ?array
    {
        return Session::get(self::$sessionKey);
    }

    /**
     * Retorna o ID do usuário autenticado.
     *
     * Compatível com IDs inteiros ou UUIDs numéricos/string.
     *
     * @return int|string|null ID do usuário ou null.
     */
    public static function id(): int|string|null
    {
        return self::user()['id'] ?? null;
    }

    /**
     * Retorna o UUID do usuário autenticado.
     *
     * @return string|null UUID do usuário ou null.
     */
    public static function uuid(): ?string
    {
        return self::user()['uuid'] ?? null;
    }

    /**
     * Retorna a role (nível/permissão) do usuário autenticado.
     *
     * Exemplos:
     * - admin
     * - manager
     * - user
     *
     * @return string|null Role do usuário ou null.
     */
    public static function role(): ?string
    {
        return self::user()['role'] ?? null;
    }

    /**
     * Realiza autenticação do usuário.
     *
     * Remove o hash da senha dos dados da sessão por segurança,
     * salva o usuário autenticado na sessão e regenera o ID da sessão
     * para evitar ataques de Session Fixation.
     *
     * @param array $user Dados do usuário autenticado.
     *
     * @return void
     */
    public static function login(array $user): void
    {
        unset($user['password']);

        Session::set(self::$sessionKey, $user);

        session_regenerate_id(true);
    }

    /**
     * Realiza logout do usuário.
     *
     * Remove os dados do usuário da sessão e
     * regenera o identificador da sessão.
     *
     * @return void
     */
    public static function logout(): void
    {
        Session::remove(self::$sessionKey);

        session_regenerate_id(true);
    }

    /**
     * Exige autenticação para acessar determinada rota.
     *
     * Caso o usuário não esteja logado:
     * - adiciona mensagem flash de erro
     * - redireciona para tela de login
     *
     * @return void
     */
    public static function requireLogin(): void
    {
        if (!self::check()) {
            Session::flash(
                'error',
                'Você precisa estar logado para acessar esta página.'
            );

            redirect('/mvc/login');
        }
    }

    /**
     * Exige que o visitante NÃO esteja autenticado.
     *
     * Útil para páginas públicas como:
     * - login
     * - registro
     * - recuperação de senha
     *
     * Caso exista sessão ativa, redireciona para dashboard.
     *
     * @return void
     */
    public static function requireGuest(): void
    {
        if (self::check()) {
            redirect('/mvc/dashboard');
        }
    }

    /**
     * Exige uma ou mais roles específicas.
     *
     * Primeiro garante autenticação.
     * Depois valida se a role do usuário pertence à lista permitida.
     *
     * Em caso de acesso negado:
     * - retorna HTTP 403
     * - carrega view de erro personalizada
     * - encerra execução
     *
     * Exemplo:
     *
     * Auth::requireRole(['admin']);
     *
     * Auth::requireRole(['admin', 'manager']);
     *
     * @param array $roles Lista de roles autorizadas.
     *
     * @return void
     */
    public static function requireRole(array $roles): void
    {
        self::requireLogin();

        if (!in_array(self::role(), $roles, true)) {

            http_response_code(403);

            require __DIR__ . '/../Views/errors/403.php';

            exit;
        }
    }

    /**
     * Verifica se o usuário possui uma role específica.
     *
     * Aceita uma única role ou múltiplas roles.
     *
     * Exemplos:
     *
     * Auth::hasRole('admin');
     *
     * Auth::hasRole(['admin', 'manager']);
     *
     * @param string|array $roles Role única ou lista de roles.
     *
     * @return bool True caso o usuário possua permissão.
     */
    public static function hasRole(string|array $roles): bool
    {
        $roles = is_array($roles)
            ? $roles
            : [$roles];

        return self::check()
            && in_array(self::role(), $roles, true);
    }
}