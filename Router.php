<?php

namespace MVC;

class Router
{

    public $rutas_GET = [];
    public $rutas_POST = [];

    public function get($url, $funcion)
    {
        $this->rutas_GET[$url] = $funcion;
    }

    public function post($url, $funcion)
    {
        $this->rutas_POST[$url] = $funcion;
    }

    public function comprobarRutas()
    {
        session_start();

        $auth = $_SESSION['login'] ?? null;

        // Rutas protegidas
        $rutas_protegidas = [
            '/admin',
            '/propiedades/crear',
            '/propiedades/actualizar',
            '/propiedades/eliminar',
            '/vendedores/crear',
            '/vendedores/actualizar',
            '/vendedores/eliminar',
        ];

        $url_actual = $_SERVER['PATH_INFO'] ?? '/';

        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo === 'GET') {
            $funcion = $this->rutas_GET[$url_actual] ?? null;
        } else {
            $funcion = $this->rutas_POST[$url_actual] ?? null;
        }

        // Proteger las rutas
        if (in_array($url_actual, $rutas_protegidas) && !$auth) {
            header('Location: /');
        }

        if ($funcion) {
            call_user_func($funcion, $this);
        } else {
            echo '404 Not Found';
        }
    }

    public function render($view, $data = [])
    {
        // Generar variables con el nombre de las claves del array asociativo que se pasa a la vista
        foreach ($data as $key => $value) {
            $$key = $value;
        }

        ob_start(); // Almacena en memoria

        include __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean(); // Limpia el buffer

        include __DIR__ . "/views/layout.php";
    }
}
