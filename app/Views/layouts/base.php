<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC com PHP puro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/thiagoleites/frameworkcss/style.css">
</head>
<body>
    
    <header class="main-header">
        <div class="container">
            <a href="#" class="logo">Logo</a>
            <nav class="main-nav">
                <a href="#">Início</a>
                <a href="#">Sobre</a>
                <a href="#">Serviços</a>
                <a href="#">Contato</a>
            </nav>
        </div>
    </header>

    <?php require $pathView; ?>

</body>
</html>