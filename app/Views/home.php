<main class="container">

    <section class="grid-layout">
        <div class="col-span-12 md:col-span-8">
            <span class="badge">FrameworkCSS próprio</span>
            <span class="badge">PHP MVC puro</span>

            <h1>Um mini framework feito para estudar como sistemas reais funcionam.</h1>

            <p>
                Esta landing page demonstra o uso do seu FrameworkCSS junto com um mini
                framework MVC em PHP puro. A proposta é unir estrutura backend, organização
                de rotas, controllers, models e views com uma base visual própria.
            </p>

            <a href="/mvc/login" class="btn btn-primary">Acessar Login</a>
            <a href="/mvc/componentes" class="btn btn-secondary">Ver Componentes</a>
        </div>

        <div class="card landing-hero-card col-span-12 md:col-span-4">
            <span class="badge">Status do estudo</span>
            <h3>Core em evolução</h3>

            <p>
                Router, Controller, View, Model abstrato, Database com PDO, UUID e base
                para autenticação.
            </p>

            <div class="progress-container">
                <div class="progress-bar" data-progress="72"></div>
            </div>

            <p class="mt-3">Progresso estimado: 72%</p>
        </div>
    </section>

    <section>
        <span class="badge">Fluxo MVC</span>
        <h2>Como uma requisição percorre o framework</h2>

        <p>
            O navegador acessa uma URL, o Router interpreta a rota, o Controller processa
            a ação, o Model conversa com o banco e a View exibe a interface com o FrameworkCSS.
        </p>

        <pre><code>URL → Router → Controller → Model → View → FrameworkCSS</code></pre>
    </section>

    <section class="grid-layout">
        <div class="card landing-card col-span-12 md:col-span-4">
            <span class="badge">01</span>
            <h3>Rotas</h3>
            <p>
                Centralizam os caminhos do sistema e apontam cada URL para um controller
                específico.
            </p>
        </div>

        <div class="card landing-card col-span-12 md:col-span-4">
            <span class="badge">02</span>
            <h3>Controllers</h3>
            <p>
                Organizam o fluxo da aplicação, validam ações e carregam as views corretas.
            </p>
        </div>

        <div class="card landing-card col-span-12 md:col-span-4">
            <span class="badge">03</span>
            <h3>Views</h3>
            <p>
                Mantêm o HTML separado da regra de negócio, usando o layout base do sistema.
            </p>
        </div>

        <div class="card landing-card col-span-12 md:col-span-4">
            <span class="badge">04</span>
            <h3>Model abstrato</h3>
            <p>
                Reutiliza operações como all, find, create, update, delete e buscas por UUID.
            </p>
        </div>

        <div class="card landing-card col-span-12 md:col-span-4">
            <span class="badge">05</span>
            <h3>Banco com PDO</h3>
            <p>
                Usa prepared statements, conexão centralizada e uma base mais segura para MySQL.
            </p>
        </div>

        <div class="card landing-card col-span-12 md:col-span-4">
            <span class="badge">06</span>
            <h3>FrameworkCSS</h3>
            <p>
                Fornece grid, cards, botões, badges, alerts, tabs, accordion, tabelas e feedbacks.
            </p>
        </div>
    </section>

    <section>
        <span class="badge">Tabulações</span>
        <h2>Explore os módulos do projeto</h2>

        <div class="tabs">
            <div class="tab-nav">
                <button class="tab-link active" data-tab="1">MVC</button>
                <button class="tab-link" data-tab="2">FrameworkCSS</button>
                <button class="tab-link" data-tab="3">Database</button>
                <button class="tab-link" data-tab="4">Auth</button>
            </div>

            <div class="tab-content">
                <div class="tab-pane active" data-tab="1">
                    <div class="grid-layout">
                        <div class="card landing-card col-span-12 md:col-span-4">
                            <h3>Router</h3>
                            <p>Recebe a URI e encontra a ação correta.</p>
                        </div>

                        <div class="card landing-card col-span-12 md:col-span-4">
                            <h3>Controller</h3>
                            <p>Controla a regra de fluxo da aplicação.</p>
                        </div>

                        <div class="card landing-card col-span-12 md:col-span-4">
                            <h3>View</h3>
                            <p>Renderiza a interface final do usuário.</p>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" data-tab="2">
                    <div class="grid-layout">
                        <div class="card landing-card col-span-12 md:col-span-4">
                            <h3>Grid Layout</h3>
                            <p>Sistema responsivo baseado em 12 colunas.</p>
                        </div>

                        <div class="card landing-card col-span-12 md:col-span-4">
                            <h3>Componentes</h3>
                            <p>Cards, botões, alertas, badges, tabs, tabelas e accordion.</p>
                        </div>

                        <div class="card landing-card col-span-12 md:col-span-4">
                            <h3>Design System</h3>
                            <p>Variáveis globais para cores, espaçamentos e estados.</p>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" data-tab="3">
                    <div class="grid-layout">
                        <div class="card landing-card col-span-12 md:col-span-4">
                            <h3>PDO</h3>
                            <p>Conexão segura e reutilizável com MySQL.</p>
                        </div>

                        <div class="card landing-card col-span-12 md:col-span-4">
                            <h3>Model Core</h3>
                            <p>Camada abstrata para operações comuns no banco.</p>
                        </div>

                        <div class="card landing-card col-span-12 md:col-span-4">
                            <h3>ID + UUID</h3>
                            <p>ID para uso interno e UUID para rotas públicas.</p>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" data-tab="4">
                    <div class="grid-layout">
                        <div class="card landing-card col-span-12 md:col-span-4">
                            <h3>Sessão</h3>
                            <p>Controle de usuário logado com $_SESSION.</p>
                        </div>

                        <div class="card landing-card col-span-12 md:col-span-4">
                            <h3>Níveis</h3>
                            <p>Admin, gerente e usuário com acessos diferentes.</p>
                        </div>

                        <div class="card landing-card col-span-12 md:col-span-4">
                            <h3>Permissões</h3>
                            <p>Base futura para permissões por página ou ação.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="grid-layout">
        <div class="card landing-card col-span-12 md:col-span-6">
            <span class="badge">Accordion</span>
            <h3>Perguntas sobre o projeto</h3>

            <div class="accordion">
                <details open>
                    <summary>Por que criar um MVC próprio?</summary>
                    <div class="accordion-content">
                        <p>
                            Para entender o funcionamento interno de frameworks maiores,
                            como Laravel, Slim e Symfony.
                        </p>
                    </div>
                </details>

                <details>
                    <summary>Por que separar Controller e View?</summary>
                    <div class="accordion-content">
                        <p>
                            Porque a regra de negócio fica no controller e a camada visual
                            fica limpa dentro das views.
                        </p>
                    </div>
                </details>

                <details>
                    <summary>Por que usar UUID?</summary>
                    <div class="accordion-content">
                        <p>
                            Para evitar expor IDs sequenciais em URLs públicas e deixar
                            as rotas mais profissionais.
                        </p>
                    </div>
                </details>
            </div>
        </div>

        <div class="card landing-card col-span-12 md:col-span-6">
            <span class="badge">Filosofia</span>
            <h3>Aprender construindo</h3>

            <blockquote>
                <p>
                    Um bom framework de estudo não precisa ser grande. Ele precisa ser
                    claro, organizado e mostrar o caminho certo.
                </p>
                <footer>Mini PHP MVC</footer>
            </blockquote>

            <div class="alert alert-success mt-3">
                Estrutura simples, mas preparada para evoluir.
            </div>
        </div>
    </section>

    <section>
        <span class="badge">Roadmap</span>
        <h2>Próximos passos</h2>

        <table>
            <thead>
                <tr>
                    <th>Recurso</th>
                    <th>Objetivo</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Autenticação</td>
                    <td>Login, logout e proteção de páginas</td>
                    <td><span class="badge">Em andamento</span></td>
                </tr>

                <tr>
                    <td>Permissões</td>
                    <td>Acesso por nível de usuário</td>
                    <td><span class="badge">Planejado</span></td>
                </tr>

                <tr>
                    <td>Model abstrato</td>
                    <td>Mini ORM com métodos reutilizáveis</td>
                    <td><span class="badge">Criado</span></td>
                </tr>

                <tr>
                    <td>Twig</td>
                    <td>Template engine para views</td>
                    <td><span class="badge">Futuro</span></td>
                </tr>
            </tbody>
        </table>
    </section>

    <section class="card landing-hero-card">
        <span class="badge">Conclusão</span>

        <h2>Uma base pequena, mas com mentalidade de framework real.</h2>

        <p>
            Este projeto une PHP puro, orientação a objetos, PDO, rotas, MVC e um
            FrameworkCSS próprio. A cada etapa, você entende melhor como um sistema
            profissional é organizado por dentro.
        </p>

        <a href="/mvc/login" class="btn btn-primary">Entrar no sistema</a>
        <a href="/mvc/usuarios" class="btn btn-secondary">Ver usuários</a>
    </section>

</main>