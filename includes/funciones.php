<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('UPLOADS', $_SERVER['DOCUMENT_ROOT'] . '/uploads/');

function template(string $nombre, bool $inicio = false)
{
    include TEMPLATES_URL . "/${nombre}.php";
}

function autenticado()
{
    session_start();

    if (!$_SESSION['login']) {
        header('Location: /');
    }
}

function debug($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';

    exit;
}

// Escapar / Sanitizar el HTML
function sanitizar($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}

// Validar tipo de contenido
function validarTipoContenido($tipo)
{
    $tipos = ['propiedad', 'vendedor'];

    return in_array($tipo, $tipos);
}

// Muestra las alertas
function mostrarAlerta($codigo)
{
    $alerta = '';

    switch ($codigo) {
        case 1:
            $alerta = 'Registro creado correctamente';
            break;
        case 2:
            $alerta = 'Registro actualizado correctamente';
            break;
        case 3:
            $alerta = 'Registro eliminado correctamente';
            break;
        default:
            $alerta = false;
            break;
    }

    return $alerta;
}

function validarRedireccionar(string $url)
{
    // Validar la URL con un id válido
    $id = $_GET['id'];
    $id  = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header("Location: ${url}");
    }

    return $id;
}
