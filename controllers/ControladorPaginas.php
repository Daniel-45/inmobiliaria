<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class ControladorPaginas
{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::get(3);

        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router)
    {
        $router->render('paginas/nosotros');
    }

    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::findAll();

        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades,
        ]);
    }

    public static function propiedad(Router $router)
    {
        $id = validarRedireccionar('/propiedades');

        // Obtener propiedad por su id
        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router)
    {
        $router->render('paginas/blog');
    }

    public static function entrada1(Router $router)
    {
        $router->render('paginas/entrada1');
    }

    public static function entrada2(Router $router)
    {
        $router->render('paginas/entrada2');
    }

    public static function entrada3(Router $router)
    {
        $router->render('paginas/entrada3');
    }

    public static function entrada4(Router $router)
    {
        $router->render('paginas/entrada4');
    }

    public static function contacto(Router $router)
    {
        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuesta = $_POST['contacto'];

            // Crear instancia PHPMailer
            $mail = new PHPMailer();

            // Configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = 'xxxxxxxxxxxxxx'; // Tus credenciales Mailtrap
            $mail->Password = 'xxxxxxxxxxxxxx'; // Tus credenciales Mailtrap
            $mail->SMTPSecure = 'tls';
            $mail->Port =  2525;

            // Configurar contenido del mail
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'bienesraices.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            // Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // Definir contenido
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuesta['nombre'] . '</p>';
            
            // Enviar de forma condicional campos de e-mail o teléfono
            if ($respuesta['contacto'] === 'telefono') {
                $contenido.= '<p>Ha seleccionado teléfono como método de contacto</p>';
                $contenido .= '<p>Teléfono: ' . $respuesta['telefono'] . '</p>';
                $contenido .= '<p>Fecha de contacto: ' . $respuesta['fecha'] . '</p>';
                $contenido .= '<p>Hora de contacto: ' . $respuesta['hora'] . '</p>';
            } else {
                $contenido.= '<p>Ha seleccionado e-mail como método de contacto</p>';
                $contenido .= '<p>Correo electrónico: ' . $respuesta['email'] . '</p>';
            }

            $contenido .= '<p>Mensaje: ' . $respuesta['mensaje'] . '</p>';
            $contenido .= '<p>Venta o compra: ' . $respuesta['tipo'] . '</p>';
            $contenido .= '<p>Precio o presupuesto: ' . $respuesta['precio'] . '€' . '</p>';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTML';

            // Enviar el email
            if ($mail->send()) {
                $mensaje = 'Mensaje enviado correctamente';
            } else {
                $mensaje = 'No se ha podido enviar el mensaje';
            }
        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}
