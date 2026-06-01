<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Validator;
use App\Core\Session;

/**
 * Controller responsável pelo fluxo de autenticação da aplicação.
 *
 * Gerencia:
 * - Exibição da tela de login
 * - Validação dos dados submetidos pelo formulário
 * - Autenticação do usuário
 * - Encerramento da sessão (logout)
 *
 * Herda funcionalidades base da classe Controller,
 * como renderização de views e redirecionamentos.
 *
 * Namespace: App\Controllers
 *
 * @package App\Controllers
 */
class AuthController extends Controller
{
    /**
     * Exibe a página de login.
     *
     * Renderiza a view responsável pelo formulário
     * de autenticação do usuário.
     *
     * Exemplo de rota:
     * GET /login
     *
     * View carregada:
     * resources/views/login.php
     *
     * @return void
     */
    public function login()
    {
        $this->view('login');
    }

    /**
     * Processa a tentativa de autenticação.
     *
     * Recebe os dados enviados via POST,
     * executa validações e, caso existam erros:
     *
     * - Salva os erros em sessão
     * - Salva os dados antigos do formulário
     * - Define mensagem flash
     * - Redireciona para tela de login
     *
     * Validações aplicadas:
     *
     * email:
     * - obrigatório
     * - formato válido de e-mail
     *
     * password:
     * - obrigatória
     * - mínimo de 6 caracteres
     *
     * Exemplo de rota:
     * POST /login
     *
     * Estrutura esperada do $_POST:
     *
     * [
     *     'email' => 'usuario@email.com',
     *     'password' => '123456'
     * ]
     *
     * Fluxo futuro esperado:
     *
     * Após validação bem-sucedida,
     * deverá ocorrer:
     *
     * - busca do usuário no banco
     * - verificação da senha (password_verify)
     * - criação da sessão autenticada
     * - redirecionamento interno
     *
     * @return void
     */
    public function authenticate()
    {
        $validator = Validator::make($_POST)

            ->required(
                'email',
                'Informe seu e-mail.'
            )

            ->email(
                'email',
                'Digite um e-mail válido.'
            )

            ->required(
                'password',
                'Informe sua senha.'
            )

            ->min(
                'password',
                6,
                'A senha precisa ter pelo menos 6 caracteres.'
            );

        /**
         * Verifica se ocorreram erros de validação.
         */
        if ($validator->fails()) {

            /**
             * Armazena os erros encontrados
             * para exibição posterior na view.
             */
            Session::setErrors(
                $validator->errors()
            );

            /**
             * Persiste os dados submetidos
             * para repopular o formulário.
             */
            Session::setOld($_POST);

            /**
             * Define mensagem flash temporária.
             */
            Session::flash(
                'error',
                'Corrija os campos destacados.'
            );

            /**
             * Redireciona o usuário
             * de volta para tela de login.
             */
            redirect('/mvc/login');
        }

        /**
         * TODO:
         *
         * Implementar autenticação real:
         *
         * 1. Buscar usuário por e-mail.
         * 2. Verificar senha com password_verify().
         * 3. Criar sessão autenticada.
         * 4. Redirecionar para dashboard.
         */
    }

    /**
     * Finaliza a sessão do usuário.
     *
     * Remove todos os dados da sessão atual,
     * encerrando a autenticação.
     *
     * Após destruir a sessão,
     * redireciona para a tela de login.
     *
     * Exemplo de rota:
     * GET /logout
     *
     * @return void
     */
    public function logout()
    {
        session_destroy();

        $this->redirect('/login');
    }
}