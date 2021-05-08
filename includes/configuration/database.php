<?php
function conexionBaseDatos() : mysqli {
    $db = new mysqli('localhost', 'root', '', 'inmobiliaria');
    $db->set_charset("utf8");

    if (!$db) {
        echo 'No se ha podido realizar la conexión a la base de datos';

        exit;
    }

    return $db;
}
