<main class="container">

    <section class="grid-layout">
        <div class="col-span-12 md:col-span-8">
            <span class="badge">FrameworkCSS + Mini PHP MVC</span>

            <h1>Um mini framework criado para entender como sistemas reais funcionam.</h1>

            <p>
                Esta landing page apresenta o Mini MVC em PHP puro trabalhando junto com
                o FrameworkCSS próprio. A proposta é estudar rotas, controllers, views,
                models, autenticação, permissões e componentes visuais sem depender de
                frameworks prontos.
            </p>

            <a href="/mvc/login" class="btn btn-primary">Acessar Login</a>
            <a href="/mvc/componentes" class="btn btn-secondary">Ver Componentes</a>
        </div>

        <div class="card col-span-12 md:col-span-4">
            <span class="badge">Status</span>
            <h3>Projeto em construção</h3>
            <p>
                O core já possui Router, Controller, Model abstrato, conexão com banco,
                views e base para autenticação.
            </p>

            <div class="progress-container">
                <div class="progress-bar" style="width: 72%; opacity: 1;"></div>
            </div>

            <p class="mt-3">Evolução estimada do estudo: 72%</p>
        </div>
    </section>

    <section>
        <span class="badge">Arquitetura</span>
        <h2>Como o Mini MVC organiza uma requisição</h2>

        <p>
            Cada acesso passa por uma sequência clara. Isso ajuda a entender o caminho
            completo entre a URL digitada no navegador e a página exibida na tela.
        </p>

        <pre><code>URL → Router → Controller → Model → View → FrameworkCSS</code></pre>
    </section>

    <section class="grid-layout">
        <div class="card col-span-12 md:col-span-4">
            <span class="badge">Router</span>
            <h3>Rotas limpas</h3>
            <p>
                O Router recebe a URI, identifica a rota cadastrada e chama o controller
                correto para aquela ação.
            </p>
        </div>

        <div class="card col-span-12 md:col-span-4">
            <span class="badge">Controller</span>
            <h3>Regra de fluxo</h3>
            <p>
                O Controller decide o que deve acontecer: listar dados, validar acesso,
                carregar uma view ou redirecionar o usuário.
            </p>
        </div>

        <div class="card col-span-12 md:col-span-4">
            <span class="badge">Model</span>
            <h3>Base abstrata</h3>
            <p>
                O Model centraliza métodos reutilizáveis como all, find, create, update,
                delete, findByUuid e deleteByUuid.
            </p>
        </div>
    </section>

    <section class="grid-layout">
        <div class="col-span-12 md:col-span-6">
            <span class="badge">Componentes visuais</span>
            <h2>O FrameworkCSS dá aparência ao sistema</h2>

            <p>
                A página usa componentes nativos do seu CSS: grid, cards, badges,
                botões, alerts, tabs, accordion, progress bar, blockquote e blocos de código.
            </p>

            <div class="alert alert-info">
                Esta interface está sendo renderizada apenas com PHP puro e seu FrameworkCSS.
            </div>
        </div>

        <div class="card col-span-12 md:col-span-6">
            <h3>Componentes usados nesta página</h3>

            <ul>
                <li>Container principal</li>
                <li>Grid layout de 12 colunas</li>
                <li>Cards responsivos</li>
                <li>Badges de destaque</li>
                <li>Botões primários e secundários</li>
                <li>Alerts informativos</li>
                <li>Accordion e tabs</li>
                <li>Progress bar</li>
            </ul>
        </div>
    </section>

    <section>
        <span class="badge">Módulos</span>
        <h2>Partes principais do framework</h2>

        <div class="tabs">
            <div class="tab-nav">
                <button class="tab-link active">MVC</button>
                <button class="tab-link">CSS</button>
                <button class="tab-link">Banco</button>
                <button class="tab-link">Auth</button>
            </div>

            <div class="tab-content">
                <div class="tab-pane active">
                    <h3>Mini PHP MVC</h3>
                    <p>
                        Estrutura dividida em rotas, controllers, views, models e core.
                        O objetivo é entender a lógica interna de frameworks maiores.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="grid-layout">
        <div class="card col-span-12 md:col-span-6">
            <span class="badge">Perguntas comuns</span>
            <h3>Como isso funciona por dentro?</h3>

            <div class="accordion">
                <details open>
                    <summary>O que o Router faz?</summary>
                    <div class="accordion-content">
                        <p>
                            Ele interpreta a URL acessada e chama o controller configurado
                            no arquivo de rotas.
                        </p>
                    </div>
                </details>

                <details>
                    <summary>Por que usar Controller?</summary>
                    <div class="accordion-content">
                        <p>
                            Para separar a regra de fluxo da camada visual. Assim a view
                            fica mais limpa e o sistema mais organizado.
                        </p>
                    </div>
                </details>

                <details>
                    <summary>Por que ter id e uuid?</summary>
                    <div class="accordion-content">
                        <p>
                            O id pode ser usado internamente no banco, enquanto o uuid pode
                            ser usado nas URLs públicas com mais segurança e organização.
                        </p>
                    </div>
                </details>
            </div>
        </div>

        <div class="card col-span-12 md:col-span-6">
            <span class="badge">Boas práticas</span>
            <h3>Decisões importantes</h3>

            <blockquote>
                <p>
                    Um framework de estudo não precisa ser grande. Ele precisa ser claro,
                    organizado e ensinar o caminho correto.
                </p>
                <footer>Mini MVC com PHP puro</footer>
            </blockquote>

            <div class="alert alert-success mt-3">
                Estrutura simples, mas preparada para evoluir.
            </div>
        </div>
    </section>

    <section>
        <span class="badge">Roadmap</span>
        <h2>Próximos recursos para adicionar</h2>

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
                    <td>Login, logout e sessão de usuário</td>
                    <td><span class="badge">Em andamento</span></td>
                </tr>

                <tr>
                    <td>Permissões</td>
                    <td>Controlar páginas por nível de usuário</td>
                    <td><span class="badge">Planejado</span></td>
                </tr>

                <tr>
                    <td>Model abstrato</td>
                    <td>Reutilizar operações comuns do banco</td>
                    <td><span class="badge">Criado</span></td>
                </tr>

                <tr>
                    <td>Template Engine</td>
                    <td>Adicionar Twig ou engine própria</td>
                    <td><span class="badge">Futuro</span></td>
                </tr>
            </tbody>
        </table>
    </section>

    <section class="grid-layout">
        <div class="card col-span-12 md:col-span-4">
            <span class="badge">PHP</span>
            <h3>PHP puro</h3>
            <p>
                A base do projeto é feita sem Laravel, Symfony ou Slim, para entender
                os fundamentos.
            </p>
        </div>

        <div class="card col-span-12 md:col-span-4">
            <span class="badge">PDO</span>
            <h3>Banco seguro</h3>
            <p>
                O acesso ao banco pode ser feito com PDO, prepared statements e um
                Database centralizado.
            </p>
        </div>

        <div class="card col-span-12 md:col-span-4">
            <span class="badge">Composer</span>
            <h3>Autoload PSR-4</h3>
            <p>
                As classes podem ser carregadas automaticamente usando namespaces
                organizados.
            </p>
        </div>
    </section>

    <section class="card">
        <span class="badge">Conclusão</span>

        <h2>Uma base pequena, mas com mentalidade de framework real.</h2>

        <p>
            Este projeto une aprendizado backend com PHP puro e construção visual com
            FrameworkCSS. A cada componente criado, você entende melhor como frameworks
            profissionais estruturam sistemas completos.
        </p>

        <a href="/mvc/login" class="btn btn-primary">Entrar no sistema</a>
        <a href="/mvc/usuarios" class="btn btn-secondary">Ver usuários</a>
    </section>

</main>