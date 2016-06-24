<?php

require_once '../aplicacion/configuracion/configuracion.php';
//require_once CLASES.'/contacto.php';
//require_once MODELOS.'/modeloContacto.php';
require_once CONTROLADORES.'/controladorRutas.php';

$controlador = new controladorRutas();
$controlador->gestionarRuta();

?>
