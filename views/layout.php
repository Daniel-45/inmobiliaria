<?php
if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? false;

if (!isset($inicio)) {
    $inicio = false;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raíces</title>
    <link rel="icon" type="image/x-icon" href="./src/images/favicon.ico">
    <link rel="stylesheet" href="../build/css/app.css">
</head>

<body>

    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="menu">
                <a href="/" class="logotipo">
                    <span>Bienes</span>Raíces
                </a>

                <div class="navbar-toggler-icon">
                    <img src="/build/images/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <div class="theme-switch-wrapper">
                        <em>Dark Mode</em>
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox">
                            <div class="slider round"></div>
                        </label>
                    </div>
                    <nav class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if (!$auth) : ?>
                            <a href="/login">Iniciar Sesión</a>
                        <?php endif; ?>
                        <?php if ($auth) : ?>
                            <a href="/logout">Cerrar Sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div> <!-- .menu -->

            <?php echo $inicio ? '<h1>Venta de Viviendas Exlusivas</h1>' : ''; ?>
        </div>
    </header>

    <?php echo $contenido; ?>

    <footer class="footer seccion">
        <div class="contenedor contenido-footer">
            <nav class="navegacion">
                <a href="/nosotros">Nosotros</a>
                <a href="/propiedades">Anuncios</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>
            </nav>
        </div>

        <p class="copyright">&copy; <?php echo date('Y') ?> Todos los derechos reservados</p>
    </footer>

    <script src="../build/js/bundle.min.js"></script>
</body>

</html>