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