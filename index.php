<?php

require_once 'configuracion/app.php';

use App\Ruta;



// Recibimos los datos de la url

$url = $_GET['url'] ?? '';



// Usamos la constante de ROUTES (rutas) para mi navegacion

$ruta = ROUTES[$url] ?? false;




if ($ruta) {

    $controller = $ruta['controller'];
    
    $action = $ruta['action'];

    Ruta::any($controller, $action);

} else {

    header('HTTP/1.0 404 Not Found');

    die('Pagina no encontrada');

}



