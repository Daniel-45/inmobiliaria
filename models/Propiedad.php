<?php

namespace Model;

class Propiedad extends ActiveRecord
{
    protected static $tabla = 'propiedades';
    protected static $columnas_base_datos = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'dormitorios', 'wc', 'estacionamiento', 'creado', 'id_vendedor'];

    public $id;
    public $titulo;
    public $imagen;
    public $precio;
    public $descripcion;
    public $dormitorios;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $id_vendedor;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->dormitorios = $args['dormitorios'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y-m-d');
        $this->id_vendedor = $args['id_vendedor'] ?? '';
    }

    public function validar()
    {
        if (!$this->titulo) {
            self::$errores[] = 'El título es obligatorio';
        }

        if (!$this->precio) {
            self::$errores[] = 'El precio es obligatorio';
        }

        if (strlen($this->descripcion) < 50) {
            self::$errores[] = 'La descripción es obligatoria y debe tener al menos 50 caracteres';
        }

        if (!$this->dormitorios) {
            self::$errores[] = 'El número de dormitorios es obligatorio';
        }

        if (!$this->wc) {
            self::$errores[] = 'El número de baños es obligatorio';
        }

        if (!$this->estacionamiento) {
            self::$errores[] = 'El número de plazas de aparcamiento es obligatorio';
        }

        if (!$this->id_vendedor) {
            $errores[] = 'Debe seleccionar un vendedor';
        }

        if (!$this->imagen) {
            self::$errores[] = 'La imagen es obligatoria';
        }

        return self::$errores;
    }
}
