<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\ControladorAutenticacion;
use MVC\Router;
use Controllers\ControladorPropiedad;
use Controllers\ControladorVendedor;
use Controllers\ControladorPaginas;

$router = new Router();

// Autenticación
$router->get('/login', [ControladorAutenticacion::class, 'login']);
$router->post('/login', [ControladorAutenticacion::class, 'login']);
$router->get('/logout', [ControladorAutenticacion::class, 'logout']);

// Acceso privado, requiere autenticación
$router->get('/admin', [ControladorPropiedad::class, 'index']);
$router->get('/propiedades/crear', [ControladorPropiedad::class, 'crear']);
$router->post('/propiedades/crear', [ControladorPropiedad::class, 'crear']);
$router->get('/propiedades/actualizar', [ControladorPropiedad::class, 'actualizar']);
$router->post('/propiedades/actualizar', [ControladorPropiedad::class, 'actualizar']);
$router->post('/propiedades/eliminar', [ControladorPropiedad::class, 'eliminar']);

$router->get('/vendedores/crear', [ControladorVendedor::class, 'crear']);
$router->post('/vendedores/crear', [ControladorVendedor::class, 'crear']);
$router->get('/vendedores/actualizar', [ControladorVendedor::class, 'actualizar']);
$router->post('/vendedores/actualizar', [ControladorVendedor::class, 'actualizar']);
$router->post('/vendedores/eliminar', [ControladorVendedor::class, 'eliminar']);

// Acceso público
$router->get('/', [ControladorPaginas::class, 'index']);
$router->get('/nosotros', [ControladorPaginas::class, 'nosotros']);
$router->get('/propiedades', [ControladorPaginas::class, 'propiedades']);
$router->get('/propiedad', [ControladorPaginas::class, 'propiedad']);
$router->get('/blog', [ControladorPaginas::class, 'blog']);
$router->get('/entrada1', [ControladorPaginas::class, 'entrada1']);
$router->get('/entrada2', [ControladorPaginas::class, 'entrada2']);
$router->get('/entrada3', [ControladorPaginas::class, 'entrada3']);
$router->get('/entrada4', [ControladorPaginas::class, 'entrada4']);
$router->get('/contacto', [ControladorPaginas::class, 'contacto']);
$router->post('/contacto', [ControladorPaginas::class, 'contacto']);

$router->comprobarRutas();