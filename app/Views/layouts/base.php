<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC com PHP puro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/thiagoleites/frameworkcss/style.css">
    <style>
        body {
            margin: 0;
        }

        .main-header .container {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .language-switcher {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            margin-left: auto;
        }

        .language-switcher label {
            margin: 0;
            font-weight: 600;
            color: var(--color-graphite);
        }

        .language-switcher select {
            width: auto;
            min-width: 170px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea,
        select {
            width: 100%;
            padding: 14px;
            border: 1px solid var(--color-border-gray);
            border-radius: 6px;
            font-size: 1rem;
            font-family: 'Inter', sans-serif;
            color: var(--color-graphite);
            background-color: var(--color-white);
            transition: border-color 0.2s ease;
        }

        .landing-card {
            max-width: none;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .landing-card p:last-child {
            margin-bottom: 0;
        }

        .landing-hero-card {
            max-width: none;
        }

        .accordion details {
            overflow: hidden;
        }

        .accordion-content {
            animation: accordionSmooth 0.28s ease;
        }

        @keyframes accordionSmooth {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <header class="main-header">
        <div class="container">
            <a href="/mvc" class="logo">Mini MVC</a>

            <nav class="main-nav">
                <a href="/mvc/">Home</a>
                <a href="/mvc/login">Login</a>
            </nav>

            <div class="language-switcher">
                <label for="language-select"><?= __('system.language') ?></label>
                <select class="form-control" id="language-select">
                    <option value="pt_br" <?= ($_SESSION['lang'] ?? 'pt_br') === 'pt_br' ? 'selected' : '' ?>>🇧🇷 Português</option>
                    <option value="en" <?= ($_SESSION['lang'] ?? 'pt_br') === 'en' ? 'selected' : '' ?>>🇺🇸 English</option>
                </select>
            </div>
        </div>
    </header>

    <?php require $pathView; ?>
    <script src="https://code.jquery.com/jquery-4.0.0.min.js"></script>

    <?php if (!empty($scripts)): ?>
        <?php foreach ($scripts as $script): ?>
            <script src="<?= $script ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>


    <script>
        document
            .getElementById('language-select')
            .addEventListener('change', function () {

                window.location.href =
                    '/mvc/lang/' + this.value;

            });
    </script>
<script>
        // Este evento garante que o script só será executado depois que todo o HTML for carregado.
document.addEventListener('DOMContentLoaded', () => {

    // Lógica para os Tabs
    const tabsContainer = document.querySelector('.tabs');

    // Só executa o código se houver um container de tabs na página
    if (tabsContainer) {
        const tabNav = tabsContainer.querySelector('.tab-nav');
        const tabPanes = tabsContainer.querySelectorAll('.tab-pane');

        // Adiciona um "ouvinte" de cliques na área de navegação das abas
        tabNav.addEventListener('click', (event) => {
            const clickedTab = event.target.closest('.tab-link');

            // Se o que foi clicado não for um botão de aba, não faz nada
            if (!clickedTab) return;

            // 1. Desativa todas as abas e painéis
            tabNav.querySelectorAll('.tab-link').forEach(tab => {
                tab.classList.remove('active');
            });
            tabPanes.forEach(pane => {
                pane.classList.remove('active');
            });

            // 2. Ativa a aba clicada
            clickedTab.classList.add('active');

            // 3. Ativa o painel correspondente
            const tabNumber = clickedTab.dataset.tab; // Pega o valor de data-tab (ex: "1", "2")
            const correspondingPane = tabsContainer.querySelector(`.tab-pane[data-tab="${tabNumber}"]`);
            if (correspondingPane) {
                correspondingPane.classList.add('active');
            }
        });
    }

    // --- NOVA LÓGICA PARA O BOTÃO DE CURTIR ---
    const commentList = document.querySelector('.comment-list');

    // Usamos delegação de eventos para eficiência.
    // O "ouvinte" fica na lista, não em cada botão individual.
    if (commentList) {
        commentList.addEventListener('click', (event) => {
            const likeButton = event.target.closest('.like-button');

            // Se o clique não foi em um botão de curtir, não faz nada.
            if (!likeButton) return;

            const likeCountSpan = likeButton.querySelector('.like-count');
            let currentLikes = parseInt(likeCountSpan.textContent, 10);

            // Alterna a classe 'liked'
            likeButton.classList.toggle('liked');

            // Verifica se o botão ESTÁ curtido AGORA para decidir se incrementa ou decrementa.
            if (likeButton.classList.contains('liked')) {
                // Se foi curtido, incrementa
                currentLikes++;
            } else {
                // Se foi descurtido, decrementa
                currentLikes--;
            }

            // Atualiza o texto do contador na tela.
            likeCountSpan.textContent = currentLikes;
        });
    }

    const progressBar = document.querySelector('.progress-bar');

    if (progressBar) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                // Se a barra de progresso entrou na tela...
                if (entry.isIntersecting) {
                    const bar = entry.target;
                    const progressValue = bar.dataset.progress; // Pega o valor (ex: "75")
                    
                    // Aplica a largura e a opacidade para iniciar a animação do CSS
                    bar.style.width = progressValue + '%';
                    bar.style.opacity = 1;

                    // Para de observar depois que a animação foi acionada
                    observer.unobserve(bar);
                }
            });
        }, {
            // O threshold 0.5 significa que a animação começa quando 50% do elemento estiver visível
            threshold: 0.5 
        });

        // Começa a observar a barra de progresso
        observer.observe(progressBar);
    }
    // Logica para spinner

    const meuFormulario = document.getElementById('meuFormulario');
    const btnEnviar = document.getElementById('btnEnviar');
    const spinnerForm = document.getElementById('spinnerForm');

    if (meuFormulario) {
        meuFormulario.addEventListener('submit', (event) => {
            event.preventDefault();

            btnEnviar.disabled = true;
            spinnerForm.classList.remove('hidden');

            setTimeout(() => {
                btnEnviar.disabled = false;
                spinnerForm.classList.add('hidden');

                alert('Formulário enviado com sucesso!');
                meuFormulario.reset();
            }, 2000);
        })
    }

    /**
     * Versão jQuery para envio do formulário com spinner no botão
     * 
    $(document).ready(function() {
        $('#meuFormulario').on('submit', function(event) {
            event.preventDefault();

            // 1. Ativa o modo de carregamento
            const $btn = $('#btnEnviar');
            const $spinner = $('#spinnerForm');
            $btn.prop('disabled', true);
            $spinner.removeClass('hidden');

            // 2. Simula uma operação de 2 segundos
            setTimeout(() => {
                // 3. Desativa o modo de carregamento
                $btn.prop('disabled', false);
                $spinner.addClass('hidden');

                alert('Formulário enviado com sucesso!');
                $('#meuFormulario')[0].reset();
            }, 2000);
        });
    }); *******/

// Você pode adicionar a lógica para outros componentes aqui (ex: Modal)

    /* Lógica para o overlay de spinner na página! */
    // window.addEventListener('load', () => {
    //     const loader = document.getElementById('pageLoader');
    //     const content = document.getElementById('mainContent');

    //     // Simula um tempo de carregamento de 1.5 segundos
    //     setTimeout(() => {
    //         loader.style.opacity = '1';
    //         // Remove o overlay depois da transição
    //         setTimeout(() => loader.classList.add('hidden'), 300);

    //         content.classList.remove('hidden');
    //     }, 5500);
    // });

});
</script>
</body>
</html>