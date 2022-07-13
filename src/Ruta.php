<?php 
//Este archivo o clase se encarga de manejar las rutas
namespace App;

use App\controllers\PaginaController;


class Ruta {

    public static function any($controller = null, $action = 'inicio') {
        // Si el controlador existe me instancias el controlador
        if($controller) {
            $controller = "\\App\\controllers\\{$controller}Controller";
            $controller = new $controller;
        } else {
        // instancia controller por defecto
            $controller = new PaginaControlador;
        }

        if (method_exists($controller, $action)) {
            return $controller->$action();
        }
    }

}