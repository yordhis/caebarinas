<?php
//Estableser la zona horaria
date_default_timezone_set('America/Caracas');

//definimosuna constante para la ubicacion de los archivos

define('DIRECCION_APP', __DIR__ . 'caebarinas.com/../');

//definir una constante para lacarpeta PUBLIC para evitar conflicto si
//se esta en un servicor compartido
define('DIRECCION_PUBLICA', 'caebarinas.com/../');

// Constante de navegacion RUTAS
require_once 'rutas.php';

//Configuracion de entorno
require_once  'env.php'; 

//Base de datos
include 'database.php';

// Me carga todo lo que esta en la carpeta 'cae'


require_once DIRECCION_APP . 'autoload.php';



