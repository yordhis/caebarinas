<?php

namespace App\Controllers;

use App\Views;
use App\Sql;

class AccionController
{
    public function cerrar()
        {   
            //Aqui destruimos la sesion (cerramos)
            session_start();
            if(isset($_SESSION['usuario']))
            {	
                session_destroy();
            }
            Views::render('paginas/sesion');
        }
}
