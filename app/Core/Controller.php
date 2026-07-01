<?php

namespace App\Core;

/**
 * Classe base para todos os controllers da aplicação.
 *
 * Fornece métodos auxiliares para renderização de views
 * e redirecionamento de requisições HTTP.
 */
class Controller
{
    /**
     * Renderiza uma view utilizando o layout base da aplicação.
     *
     * Os dados informados são extraídos em variáveis para serem
     * utilizados diretamente na view. Também permite informar
     * arquivos CSS e JavaScript específicos da página através
     * das chaves `styles` e `scripts`.
     *
     * Exemplo:
     * ```php
     * $this->view('home/index', [
     *     'title' => 'Página Inicial',
     *     'user' => $user,
     *     'styles' => [
     *         '/assets/css/home.css'
     *     ],
     *     'scripts' => [
     *         '/assets/js/home.js'
     *     ]
     * ]);
     * ```
     *
     * @param string $view Caminho da view relativo ao diretório `Views`, sem a extensão `.php`.
     * @param array<string, mixed> $data Dados disponibilizados para a view.
     *
     * @return void
     */
    protected function view(string $view, array $data = [])
    {
        $scripts = $data['scripts'] ?? [];
        $styles = $data['styles'] ?? [];

        extract($data);

        $pathView = __DIR__ . '/../Views/' . $view . '.php';

        require __DIR__ . '/../Views/layouts/base.php';
    }

    /**
     * Redireciona o navegador para uma nova URL.
     *
     * Envia o cabeçalho HTTP `Location` e encerra a execução
     * do script imediatamente.
     *
     * Exemplo:
     * ```php
     * $this->redirect('/login');
     * ```
     *
     * @param string $url URL de destino.
     *
     * @return never
     */
    protected function redirect(string $url)
    {
        header("Location: {$url}");
        exit;
    }
}