<?php

define ('HOME', 'c:/wamp64/www/agenda');
define ('APLICACION', HOME.'/aplicacion');
define ('CONFIGURACION', APLICACION.'/configuracion');
define ('VISTAS', APLICACION.'/vistas');
define ('LAYOUTS', VISTAS.'/layouts');
define ('CONTROLADORES', APLICACION.'/controladores');
define ('MODELOS', APLICACION.'/modelos');
define ('CLASES', APLICACION.'/clases');


define ('PUBLICA', HOME.'/publica');
define ('CSS', PUBLICA.'/css');
define ('IMAGENES', PUBLICA.'/imagenes');
define ('IMAGENESDATOS', IMAGENES.'/datos');
define ('JAVASCRIPT', PUBLICA.'/javascript');



define ('URLAPLICACION', 'http://'.$_SERVER['HTTP_HOST'].'/');
define ('URLCSS', URLAPLICACION.'/css');
define ('URLIMAGENES', URLAPLICACION.'/imagenes');
define ('URLIMAGENESDATOS', URLIMAGENES.'/datos');
define ('URLJAVASCRIPT', URLAPLICACION.'/javascript');

?>
