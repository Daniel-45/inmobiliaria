<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class ControladorPropiedad
{

    public static function index(Router $router)
    {
        $propiedades = Propiedad::findAll();

        $vendedores = Vendedor::findAll();

        // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);
    }

    public static function crear(Router $router)
    {
        $propiedad = new Propiedad;

        // Consulta para obtener los vendedores
        $vendedores = Vendedor::findAll();

        // Array con mensajes de errores
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Crear nueva instancia
            $propiedad = new Propiedad($_POST['propiedad']);

            /* Subida de archivos */

            // Generar nombre único para la imagen
            $nombre_imagen = md5(uniqid(rand(), true)) . '.jpg';

            // Setear la imagen
            // Resize a la imagen con Intervention
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $imagen = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen($nombre_imagen);
            }

            /* Fin subida de archivos */

            // Validar
            $errores = $propiedad->validar();

            // Comprobar que el array de errores esté vacío
            // Sin no ha errores se inserta en la base de datos
            if (empty($errores)) {

                // Crear directorio para subir imágenes
                if (!is_dir(UPLOADS)) {
                    mkdir(UPLOADS);
                }

                // Guardar imagen en el servidor
                $imagen->save(UPLOADS . $nombre_imagen);

                // Insertar en base de datos
                $resultado = $propiedad->guardar();
            }
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores,
        ]);
    }

    public static function actualizar(Router $router)
    {
        $id = validarRedireccionar('/admin');

        // Consulta para obtener los datos de la propiedad
        $propiedad = Propiedad::find($id);

        // Consulta para obtener los vendedores
        $vendedores = Vendedor::findAll();

        // Array con mensajes de errores
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Asignar los atributos
            $args = $_POST['propiedad'];

            $propiedad->sincronizar($args);

            // Validación
            $errores = $propiedad->validar();

            /* Subida de archivos */

            // Generar nombre único para la imagen
            $nombre_imagen = md5(uniqid(rand(), true)) . '.jpg';

            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $imagen = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen($nombre_imagen);
            }

            /* Fin subida de archivos */

            // Comprobar que el array de errores esté vacío
            // Sin no ha errores se inserta en la base de datos
            if (empty($errores)) {
                // Almacenar la imagen
                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                    $imagen->save(UPLOADS . $nombre_imagen);
                }

                $propiedad->guardar();
            }
        }

        $router->render('/propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores,
        ]);
    }

    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if ($id) {
                $tipo = $_POST['tipo'];
    
                if (validarTipoContenido($tipo)) {
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
        }
    }

}
