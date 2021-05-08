<?php

require 'funciones.php';
require 'configuration/database.php';
require  __DIR__ . '/../vendor/autoload.php';

// Conectar a la base de datos
$db = conexionBaseDatos();

use Model\ActiveRecord;

ActiveRecord::setDataBase($db);

