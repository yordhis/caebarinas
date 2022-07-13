<?php

namespace App\Controllers;

use App\Views;  
use App\Sql;   

class PaginaController
{
        public function inicio()
        {       

             $variables['noticias'] = Sql::consultarTodo('noticias');

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
                    {
                        $email = $_POST['email'];

                        if(Sql::setSuscripcion($email))
                        {
                            echo "<script>alert('Gracias por su suscripción')</script>";
                            Views::render("paginas/inicio", $variables);
                        }
                        else
                        {
                            echo "<script>alert('El correo que intento suscribir ya existe.')</script>";
                             Views::render("paginas/inicio", $variables);
                        }
                    }
                    else
                    {
                         Views::render("paginas/inicio", $variables);
                    }    
        } 
   
        public function nosotros()
        {
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
                    {
                        $email = $_POST['email'];

                        if(Sql::setSuscripcion($email))
                        {
                            echo "<script>alert('Gracias por su suscripción')</script>";
                             Views::render("paginas/nosotros");
                        }
                        else
                        {
                            echo "<script>alert('El correo que intento suscribir ya existe.')</script>";
                              Views::render("paginas/nosotros");
                        }
                    }
                    else
                    {
                         Views::render("paginas/nosotros");
                    }
           
        }  

        public function noticias()
        {   
            $variables = Sql::consultarTodo('noticias');

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
                    {
                        $email = $_POST['email'];

                        if(Sql::setSuscripcion($email))
                        {
                            echo "<script>alert('Gracias por su suscripción')</script>";
                            Views::render("paginas/noticias", $variables);
                        }
                        else
                        {
                            echo "<script>alert('El correo que intento suscribir ya existe.')</script>";
                            Views::render("paginas/noticias", $variables);
                        }
                    }
                    else
                    {
                        Views::render("paginas/noticias", $variables);
                    }
            
        }  

        public function verNoticia()
        {
            $variables = Sql::consulta('noticias', 'id', $_GET['id']);
            Views::render("paginas/verNoticia", $variables); 
        }  

        public function contactanos()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {
                $email = $_POST['email'];

                if(Sql::setSuscripcion($email))
                {
                    echo "<script>alert('Gracias por su suscripción')</script>";
                    Views::render("paginas/contactanos");
                }
                else
                {
                    echo "<script>alert('El correo que intento suscribir ya existe.')</script>";
                     Views::render("paginas/contactanos");
                }
            }
            else
            {
                Views::render("paginas/contactanos");
            }
            
        }  

        public function varificarAbogado()
        {   
            $variables = Sql::consultarNoticia('noticias');
            if (isset($_POST['email'])) {
               if(Sql::setSuscripcion($_POST['email']))
                {
                    $datos['noticias'] = $variables;
                    echo "<script>alert('Gracias por su suscripción')</script>";
                    Views::render("paginas/inicio", $datos);
                }
                else
                {
                    $datos['noticias'] = $variables;
                    echo "<script>alert('El correo que intento suscribir ya existe.')</script>";
                     Views::render("paginas/inicio", $datos);
                }
            }

            if (isset($_POST['cedula'])) 
            {
                
                $cedula = $_POST['cedula'];

                //ubicacion de Views
                $directory = $_POST['directory'];
                $file = $_POST['file'];
    
                if ($datos = Sql::consulta('usuarios', 'cedula' ,$cedula))
                {   
                    if ($datos['cedula'] == 0) 
                    {
                         echo "<script>alert('Por favor ingrese su cédula.')</script>";
                         $datos['noticias'] = $variables;
                        Views::render("paginas/inicio", $datos);
                    }
                    else
                    {
                        $datos['tabla'] = 'excisto';
                        $datos['noticias'] = $variables;
                        Views::render("paginas/inicio", $datos);
                    }
                }


            }
        }
}
