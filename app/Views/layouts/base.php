<?php
    $errors = \App\Core\Session::errors();
    $old = \App\Core\Session::old();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Crect width='64' height='64' rx='16' fill='%23111111'/%3E%3Cpath d='M18 22h28v6H18zM18 32h20v6H18zM18 42h28v6H18z' fill='white'/%3E%3C/svg%3E">
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

        .field-error {
            border-color: var(--color-error) !important;
            box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.12) !important;
        }

        .field-error-wrapper {
            position: relative;
        }

        .field-error-message {
            color: var(--color-error);
            font-size: 0.875rem;
            margin-top: 6px;
        }

        [data-tooltip].field-error::after {
            background-color: var(--color-error);
            color: var(--color-white);
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
    <?php if ($message = \App\Core\Session::getFlash('success')): ?>
        <div class="alert alert-success">
            <?= $message ?>
        </div>
    <?php endif; ?>

    <?php if ($message = \App\Core\Session::getFlash('error')): ?>
        <div class="alert alert-error">
            <?= $message ?>
        </div>
    <?php endif; ?>
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
</body>
</html>