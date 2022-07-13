<?php

    namespace App\Controllers;

    use App\Views;
    use App\Sql;
    

    class AdminController 
    {

          /**++++++++++++++++++++++
         * + LOGIN DE LOS USUARIOS+
         * ++++++++++++++++++++++++
         */
        public function sesion()
        {

            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $inputs = [
                    'usuario' => $_POST['usuario'],
                    'clave' => MD5($_POST['clave']),
                ];
                //ubicacion de Views
                $directory = 'paginas';
                $file = 'sesion';
    
                if (Sql::validar($inputs) == false)
                {
                    $this->errorForm('Usuario o contraseña invalido', $inputs, $directory, $file);    
                }
                else
                {
                    if($datos = Sql::sesion($inputs['usuario']))
                    {
                        extract($datos);
                        session_start();
                        $_SESSION['id'] = $id;
                        $_SESSION['usuario'] = $usuario;
                        $_SESSION['cedula'] = $cedula;
                        $_SESSION['nombres'] = $nombres;
                        $_SESSION['nivel_usuario'] = $nivel_usuario;
                    
                        switch ($_SESSION['nivel_usuario']) 
                        {
                            case '1':
                                    
                                    $_SESSION['directory'] = 'abogado';
                                    $_SESSION['file'] = 'index';
                                    $datos = Sql::consulta('usuarios', 'cedula', $_SESSION['cedula']);
                                    $datos['familiares'] = Sql::consultas('datos_familiares','id_usuario',$datos['id']);
                                    $datos['pagos'] = Sql::consultas('pagos','cedula',$datos['cedula']);
                                Views::render('abogado/index', $datos);
                                    
                                break;
                            case '2':
                                  
                                    $_SESSION['directory'] = 'admin';
                                    $_SESSION['file'] = 'index';
                                Views::render('admin/index');
                                   
                                break;
                            case '3':

                                    $_SESSION['directory'] = 'secretario';
                                    $_SESSION['file'] = 'index';
                                Views::render('secretario/index');
                                    
                                break;                          
                            default:
                                Views::render('paginas/sesion', 'ups! nivel de usuario no identificado...' );
                                break;
                        }
                       
                        
                    }
                    else
                    {
                        $this->errorForm('Error de usuario', $inputs, $directory, $file); 
                    }
                     
                
                }
            }
            elseif (isset($_GET['formCedula'])) 
            {
                 $inputs = [
                    'cedula' => $_GET['cedula'] ?? '  '
                    
                ];
                //ubicacion de Views
                $directory = 'paginas';
                $file = 'sesion';
    
               
                    if($datos = Sql::consulta('usuarios', 'cedula', $inputs['cedula']))
                    {
                        $datos['familiares'] = Sql::consultas('datos_familiares','id_usuario',$datos['id']);
                        $datos['pagos'] = Sql::consultas('pagos','cedula',$datos['cedula']);
                        extract($datos);
                        session_start();
                        $_SESSION['id'] = $id;
                        $_SESSION['usuario'] = $usuario;
                        $_SESSION['nombres'] = $nombres;
                        $_SESSION['nivel_usuario'] = $nivel_usuario;
                    
                        switch ($_SESSION['nivel_usuario']) 
                        {
                            case '1':
                                    
                                    $_SESSION['directory'] = 'abogado';
                                    $_SESSION['file'] = 'index';
                                Views::render('abogado/index', $datos);
                                    
                                break;
                                                 
                            default:
                                $variables['messageError'] = 'ups! Usuario no identificado...';
                                Views::render('paginas/sesion', $variables );
                                break;
                        }
                       
                        
                    }
                    else
                    {
                        $this->errorForm('Error de usuario', $inputs, $directory, $file); 
                    }
            }
            else
            {
                Views::render('paginas/sesion');
            }
        } 


        /**+++++++++++++++++++++
         * + Consultar ABOGADO +
         * +++++++++++++++++++++
         */
        public function consultar()
        {
            session_start();
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $inputs = [
                    'cedula' => $_POST['cedula'],
                ];
                //ubicacion de Views
                $directory = $_POST['directory'];
                $file = $_POST['file'];
    
                if ($datos = Sql::consulta('usuarios', 'cedula' ,$inputs['cedula']))
                {   
                    if ($datos['cedula'] == 0) 
                    {
                         $this->errorForm('Por favor ingrese una cedula', $inputs, $directory, $file);
                    }
                    else
                    {
                        $familia = Sql::consultas('datos_familiares','id_usuario',$datos['id']);
                        $datos['familiares'] = $familia;
                        $datos['tabla'] = 'tablaAbogado';
                        Views::render("$directory/$file", $datos); 
                    }
                    
                }
                else
                {
                    $this->errorForm('Este numero de Cédula no esta registrado en el Gremio de Barinas', $inputs, $directory, $file);
                }
            }
            else
            {   

                $directory = $_SESSION['directory'];
                Views::render("{$directory}/index");
            }
        } 

          /**++++++++++++++++++++++++++++++++++
         * + Consultar CUOTAS DE LOS ABOGADOS +
         * ++++++++++++++++++++++++++++++++++++
         */

        public function consultarCuotas()
        {
            session_start();
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $inputs = [
                    'cedula' => $_POST['cedula'],
                    'year' => $_POST['year']
                ];
                //ubicacion de Views
                $directory = $_POST['directory'];
                $file = $_POST['file'];
    
                if ($datos = Sql::consulta('usuarios', 'cedula' ,$inputs['cedula']))
                {
                    if($cuotas = Sql::consultas2('cuotas','id_usuario','year',$datos['id'], $inputs['year']))
                    {
                        $datos['familiares'] = Sql::consultas('datos_familiares','id_usuario',$datos['id']);
                        $datos['pagos'] = Sql::consultas('pagos','cedula',$datos['cedula']);
                        $datos['cuotas'] = $cuotas;
                        $datos['tabla'] = 'tablaCuota';
                        Views::render("$directory/$file", $datos);
                    }
                    else 
                    {
                        $this->errorForm("Este abogado no posee cuotas registradas en el año {$inputs['year']}", $inputs, $directory, $file);
                    }
                    
                }
                else
                {
                    $this->errorForm('Este abogado no esta registrado en el Gremio de Barinas', $inputs, $directory, $file);
                }
            }
            else
            {
                Views::render('admin/index');
            }
        } 

        /**++++++++++++++++++++++++++++++++++++++++++++
         * + CONSULTAR DATOS DE FAMILIARES DEL ABOGADO+
         * ++++++++++++++++++++++++++++++++++++++++++++
         */

        public function consultarFamiliares()
        {
            session_start();
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $inputs = [
                    'cedula' => $_POST['cedula'],
                ];
                //ubicacion de Views
                $directory = $_POST['directory'];
                $file = $_POST['file'];
    
                if ($datos = Sql::consulta('usuarios', 'cedula' ,$inputs['cedula']))
                {
                    if($familia = Sql::consultas('datos_familiares','id_usuario',$datos['id']))
                    {
                        $datos['familiares'] = $familia;
                        $datos['tabla'] = 'tablaFamiliares';
                        Views::render("$directory/$file", $datos);
                    }
                    else {
                        $this->errorForm('Este abogado no posee carga familiar', $inputs, $directory, $file);
                    }
                    
                }
                else
                {
                    $this->errorForm('Este abogado no esta registrado en el Gremio de Barinas', $inputs, $directory, $file);
                }
            }
            else
            {
                Views::render('admin/index');
            }
        } 
          /**+++++++++++++++++++++++++++++
         * + pagar CUOTAS DE LOS ABOGADOS +
         * +++++++++++++++++++++++++++++++
         */
        public function pagarCuotas()
        {
            session_start();
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $inputs = [
                    'nombre' => $_POST['nombre'],
                    'cedula' => $_POST['cedula'],
                    'banco' => $_POST['banco'],
                    'numero_referencia' => $_POST['numero_referencia'],
                    'fecha' => $_POST['fecha'],
                    'monto' => $_POST['monto'],
                    'id_cuota' => $_POST['id_cuota']
                ];
                //ubicacion de Views
                $directory = $_POST['directory'];
                $file = $_POST['file'];
    
                if ($datos = Sql::consulta('usuarios', 'cedula' ,$inputs['cedula']))
                {
                    if(Sql::procesarPago($inputs) == true)
                    {
                        $inputs['estado_cuota'] = 2;
                        Sql::cambiarEstado($inputs);
                        $cuotas = Sql::consultas('cuotas','id_usuario',$datos['id']);
                        $datos['cuotas'] = $cuotas;
                        $datos['tabla'] = 'tablaCuota';
                        Views::render("$directory/$file", $datos);
                    }
                    else {
                        $cuotas = Sql::consultas('cuotas','id_usuario',$datos['id']);
                        $datos['cuotas'] = $cuotas;
                        $datos['inputs'] = $inputs;
                        $datos['tabla'] = 'tablaCuota';
                        $this->errorForm('Numero de referencia ya registrado!', $datos, $directory, $file);
                    }
                    
                }
                else
                {
                    $this->errorForm('Este abogado no esta registrado en el Gremio de Barinas', $inputs, $directory, $file);
                }
            }
            elseif ($_SERVER['REQUEST_METHOD'] == 'GET') 
            {
                //CONFIRMAR LA TRANSSACCIÓN
                $inputs = [
                    'id_cuota' => $_GET['id_cuota'],
                    'estado_cuota' => 1,
                    'id_usuario' => $_GET['id_usuario']
                ];
                //ubicacion de Views
                $directory = $_GET['directory'];
                $file = $_GET['file'];
    

                if (Sql::cambiarEstado($inputs) == true) {
                    //Lista de cuotas
                    $cuotas = Sql::consultas('cuotas','id_usuario',$inputs['id_usuario']);
                    //datos usuario
                    $datos = Sql::consulta('usuarios', 'id' ,$inputs['id_usuario']);

                    $datos['cuotas'] = $cuotas;
                    $datos['tabla'] = 'tablaCuota';
                    Views::render("$directory/$file", $datos);
                } else {
                    $this->errorForm('Ups hubo un error en procesar la confirmacion del pago!', $inputs, $directory, $file);
                }
                
            }
            else
            {
                Views::render('admin/index');
            }
        } 

         /**++++++++++++++++++++++++++++++++++++++++++
         * + Consultar LISTA DE PAGOS DE LOS ABOGADOS +
         * +++++++++++++++++++++++++++++++++++++++++++
         */

        public function consultarPago()
        {
            session_start();
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $inputs = [
                    'cedula' => $_POST['cedula'],
                ];
                //ubicacion de Views
                $directory = $_POST['directory'];
                $file = $_POST['file'];
    
                if ($datos = Sql::consulta('usuarios', 'cedula' ,$inputs['cedula']))
                {
                    if($pagos = Sql::consultas('pagos','cedula',$datos['cedula']))
                    {
                        $datos['pagos'] = $pagos;
                        $datos['tabla'] = 'tablaPago';
                        Views::render("$directory/$file", $datos);
                    }
                    else {
                        $this->errorForm('Este abogado no posee pagos registrados en el Gremio de Barinas', $inputs, $directory, $file);
                    }
                    
                }
                else
                {
                    $this->errorForm('Este abogado no esta registrado en el Gremio de Barinas', $inputs, $directory, $file);
                }
            }
            else
            {
                Views::render('admin/index');
            }
        } 

         /**++++++++++++++++++++++++++++++++++++++++++
         * + Consultar LISTA DE PAGOS DE LOS ABOGADOS +
         * +++++++++++++++++++++++++++++++++++++++++++
         */

        public function registrar(){
            
             session_start();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {

                $inputs = [
                    'usuario' => $_POST['usuario'],//unico
                    'clave' => md5($_POST['clave']),
                    'nombres' => $_POST['nombres'],
                    'apellidos' => $_POST['apellidos'],
                    'cedula' => $_POST['cedula'],//unico
                    'edad' => $_POST['edad'],
                    'nacionalidad' => $_POST['nacionalidad'],
                    'fecha_nacimiento' => $_POST['fecha_nacimiento'],
                    'lugar_nacimiento' => $_POST['lugar_nacimiento'],
                    'estado_civil' => $_POST['estado_civil'],
                    'telefono' => $_POST['telefono'],
                    'n_colegio' => $_POST['n_colegio'],//unico
                    'tomo' => $_POST['tomo'],//unico
                    'folio' => $_POST['folio'],//unico
                    'fecha' => $_POST['fecha'],
                    'n_impre' => $_POST['n_impre'],//unico
                    'universidad' => $_POST['universidad'],
                    'direccion' => $_POST['direccion'],
                    'direccion_laboral' => $_POST['direccion_laboral'],
                    'telefono_laboral' => $_POST['telefono_laboral'],
                  
                    //REDES SOCIALES
                    'redes_sociales' => $_POST['instagram'].'/'.$_POST['facebook'].'/'.$_POST['twitter'],
                   
                    'email' => $_POST['email'],//unico
                    'info_adicional' => $_POST['info_adicional']  
                ];
                 //ubicacion de Views
                $directory = $_POST['directory'];
                $file = $_POST['file'];

          
                // SE EJECUTA LA INSERCION DEL NUEVO ABOGADO
                if (Sql::setUsuario($inputs) == true) {
                   
                    $inputs['messageError'] = 'Registro excitoso';
                    
                   Views::render("$directory/$file", $inputs);

                } 
                else 
                {
                    $this->errorForm('Ups ocurrio un error en el registro', $inputs, $directory, $file); 
                }  
 
            }
            else 
            {
              
                $directory = $_SESSION['directory'];
                Views::render("{$directory}/registro");
            }
            
        }

        public function setFamiliares()
        {
            session_start();

            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {
                $inputs = [ 
                    'cedula' => $_POST['cedula'],

                    'familiar1' => [
                                    'nombre' => trim($_POST['nombre_fam1']),
                                    'apellido' => trim($_POST['apellido_fam1']),
                                    'parentesco' => trim($_POST['parentesco_fam1']),
                                    'telefono' => trim($_POST['telefono_fam1']),
                                    ],
                    'familiar2' => [
                                    'nombre' => trim($_POST['nombre_fam2']),
                                    'apellido' => trim($_POST['apellido_fam2']),
                                    'parentesco' => trim($_POST['parentesco_fam2']),
                                    'telefono' => trim($_POST['telefono_fam2']),
                                    ],
                    'familiar3' => [
                                    'nombre' => trim($_POST['nombre_fam3']),
                                    'apellido' => trim($_POST['apellido_fam3']),
                                    'parentesco' => trim($_POST['parentesco_fam3']),
                                    'telefono' => trim($_POST['telefono_fam3']),
                                    ],
                    'familiar4' => [
                                    'nombre' => trim($_POST['nombre_fam4']),
                                    'apellido' => trim($_POST['apellido_fam4']),
                                    'parentesco' => trim($_POST['parentesco_fam4']),
                                    'telefono' => trim($_POST['telefono_fam4']),
                                    ],
                    'familiar5' => [
                                    'nombre' => trim($_POST['nombre_fam5']),
                                    'apellido' => trim($_POST['apellido_fam5']),
                                    'parentesco' => trim($_POST['parentesco_fam5']),
                                    'telefono' => trim($_POST['telefono_fam5']),
                                    ]

                ];


                //ubicacion de Views
                $directory = $_POST['directory'];
                $file = $_POST['file'];

                if ($datos = Sql::consulta('usuarios', 'cedula' ,$inputs['cedula']))
                {
                    $i = 1;
                    while ($inputs["familiar{$i}"]['nombre'] != null) {
                        
                        $inputs["familiar{$i}"]['id_usuario'] = $datos['id'];

                        if (Sql::setFamiliares($inputs["familiar{$i}"])) {
                                
                             $inputs['messageError'] = 'Registro excitoso';   
                             Views::render("$directory/$file", $inputs);

                        } 
                        else
                        {
                             $this->errorForm('Ups error al agragar la carga familiar.', $inputs, $directory, $file);
                        }
                        
                        $i++;
                    }

                }
                else
                {
                        $this->errorForm('Este abogado no esta registrado en el Gremio de Barinas', $inputs, $directory, $file);
                }
            } 
            else
            {
                $directory = $_SESSION['directory'];
                Views::render("{$directory}/registro");
            } 
        }

        /**
        +++++++++++++++++++++
        REGISTRAR CUOTAS
        ++++++++++++++++++++
        */

        public function setCuotas()
        {
            session_start();

            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {
                $inputs = [ 
                    'cedula' => $_POST['cedula'],

                    'cuota1' => [
                                    'year' => $_POST['year1'],
                                    'mes' => $_POST['mes1'],
                                    'cuota' => $_POST['cuota1'],
                                    'tipo_cuota' => $_POST['tipo_cuota1'],
                                    ],
                    'cuota2' => [
                                    'year' => $_POST['year2'],
                                    'mes' => $_POST['mes2'],
                                    'cuota' => $_POST['cuota2'],
                                    'tipo_cuota' => $_POST['tipo_cuota2'],
                                    ],
                    'cuota3' => [
                                    'year' => $_POST['year3'],
                                    'mes' => $_POST['mes3'],
                                    'cuota' => $_POST['cuota3'],
                                    'tipo_cuota' => $_POST['tipo_cuota3'],
                                    ],
                    'cuota4' => [
                                    'year' => $_POST['year4'],
                                    'mes' => $_POST['mes4'],
                                    'cuota' => $_POST['cuota4'],
                                    'tipo_cuota' => $_POST['tipo_cuota4'],
                                    ],
                    'cuota5' => [
                                    'year' => $_POST['year5'],
                                    'mes' => $_POST['mes5'],
                                    'cuota' => $_POST['cuota5'],
                                    'tipo_cuota' => $_POST['tipo_cuota5'],
                                    ]

                ];

                //ubicacion de Views
                $directory = $_POST['directory'];
                $file = $_POST['file'];

                if ($datos = Sql::consulta('usuarios', 'cedula' ,$inputs['cedula']))
                {
                    $i = 1;
                    while ($inputs["cuota{$i}"]['year'] != null) {
                        
                        $inputs["cuota{$i}"]['id_usuario'] = $datos['id'];

                        if (Sql::setCuotas($inputs["cuota{$i}"])) {
                                
                             $inputs['messageError'] = 'Registro de cuota excitoso';   
                             Views::render("$directory/$file", $inputs);

                        } 
                        else
                        {
                             $this->errorForm('Ups error al agragar cuota.', $inputs, $directory, $file);
                        }
                        
                        $i++;
                    }

                }
                else
                {
                        $this->errorForm('Este abogado no esta registrado en el Gremio de Barinas', $inputs, $directory, $file);
                }
            } 
            else
            {
                $directory = $_SESSION['directory'];
                Views::render("{$directory}/registro");
            } 
        }
       

        public function actualizar()
        {
            session_start();

            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {
                
                $inputs = [
                    'id' => $_POST['id'],
                    'usuario' => utf8_encode($_POST['usuario']),//unico
                    'clave' => md5($_POST['clave']),
                    'nombres' => utf8_encode($_POST['nombres']),
                    'apellidos' => utf8_encode($_POST['apellidos']),
                    'cedula' => $_POST['cedula'],//unico
                    'edad' => $_POST['edad'],
                    'nacionalidad' => utf8_encode($_POST['nacionalidad']),
                    'fecha_nacimiento' => $_POST['fecha_nacimiento'],
                    'lugar_nacimiento' => utf8_decode($_POST['lugar_nacimiento']),
                    'estado_civil' => $_POST['estado_civil'],
                    'telefono' => $_POST['telefono'],
                    'n_colegio' => $_POST['n_colegio'],//unico
                    'tomo' => $_POST['tomo'],//unico
                    'folio' => $_POST['folio'],//unico
                    'fecha' => $_POST['fecha'],
                    'n_impre' => $_POST['n_impre'],//unico
                    'universidad' => utf8_encode($_POST['universidad']),
                    'direccion' => utf8_encode($_POST['direccion']),
                    'direccion_laboral' => utf8_encode($_POST['direccion_laboral']),
                    'telefono_laboral' => $_POST['telefono_laboral'],
                  
                    //REDES SOCIALES
                    'redes_sociales' => utf8_encode($_POST['instagram'].'/'.$_POST['facebook'].'/'.$_POST['twitter']),
                   
                    'email' => utf8_encode($_POST['email']),//unico
                    'info_adicional' => utf8_encode($_POST['info_adicional'])  
                ];
                //ubicacion de Views
                $directory = $_POST['directory'];
                $file = $_POST['file'];

                if (Sql::actualizarAbogado($inputs) == true) {
                    
                    $inputs['messageError'] = 'Operación exitosa';
                    Views::render("$directory/$file", $inputs);
                }
                else
                {
                    $this->errorForm('Ups error al actualizar datos del abogado.', $inputs, $directory, $file);
                }
                

                
            } 
            else 
            {
                $directory = $_SESSION['directory'];
                Views::render("{$directory}/actualizar");
            }
        }

        public function actualizarFamiliares()
        {
            session_start();
             if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {
                $inputs = [ 
                    

                    'familiar1' => [
                                    'id' => $_POST['id_fam1'] ?? ' ',
                                    'nombre' => $_POST['nombre_fam1'] ?? ' ',
                                    'apellido' => $_POST['apellido_fam1'] ?? ' ',
                                    'parentesco' => $_POST['parentesco_fam1'] ?? ' ',
                                    'telefono' => $_POST['telefono_fam1'] ?? ' ',
                                    ],
                    'familiar2' => [
                                    'id' => $_POST['id_fam2'] ?? ' ',
                                    'nombre' => $_POST['nombre_fam2'] ?? ' ',
                                    'apellido' => $_POST['apellido_fam2']  ?? ' ',
                                    'parentesco' => $_POST['parentesco_fam2']  ?? ' ',
                                    'telefono' => $_POST['telefono_fam2']  ?? ' ',
                                    ],
                    'familiar3' => [
                                    'id' => $_POST['id_fam3'] ?? ' ',
                                    'nombre' => $_POST['nombre_fam3'] ?? ' ',
                                    'apellido' => $_POST['apellido_fam3'] ?? ' ',
                                    'parentesco' => $_POST['parentesco_fam3'] ?? ' ',
                                    'telefono' => $_POST['telefono_fam3'] ?? ' ',
                                    ],
                    'familiar4' => [
                                    'id' => $_POST['id_fam4'] ?? ' ',
                                    'nombre' => $_POST['nombre_fam4'] ?? ' ',
                                    'apellido' => $_POST['apellido_fam4'] ?? ' ',
                                    'parentesco' => $_POST['parentesco_fam4'] ?? ' ',
                                    'telefono' => $_POST['telefono_fam4'] ?? ' ',
                                    ],
                    'familiar5' => [
                                    'id' => $_POST['id_fam5'] ?? ' ',
                                    'nombre' => $_POST['nombre_fam5'] ?? ' ',
                                    'apellido' => $_POST['apellido_fam5'] ?? ' ',
                                    'parentesco' => $_POST['parentesco_fam5'] ?? ' ',
                                    'telefono' => $_POST['telefono_fam5'] ?? ' ',
                                    ]

                ];

                //ubicacion de Views
                $directory = $_POST['directory'];
                $file = $_POST['file'];

            
                    $i = 1;
                    while ($inputs["familiar{$i}"]['nombre'] != null) {
                        
                        if (Sql::actualizarFamiliares($inputs["familiar{$i}"])) {
                                
                             $inputs['messageError'] = 'Carga familiar actulizada con exito';   
                             Views::render("$directory/$file", $inputs);

                        } 
                        else
                        {
                             $this->errorForm('Ups error al actualizar la carga familiar.', $inputs, $directory, $file);
                        }
                        
                        $i++;
                    }

              
            } 
            else
            {
                $directory = $_SESSION['directory'];
                Views::render("{$directory}/actualizar");
            } 
        }

        public function actualizarCuota()
        {   
            session_start();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {
                $inputs = [ 
                        
                    // SE RECIBEN TODOS LOS MESE Y SI ESTAN VACIOS SE SALTAN
                    'cuota1' => [
                                    'id'  => $_POST['id1'] ?? ' ',
                                    'year' => $_POST['year1'] ?? ' ',
                                    'mes' => $_POST['mes1'] ?? ' ',
                                    'cuota' => $_POST['cuota1'] ?? ' ',
                                    'tipo_cuota' => $_POST['tipo_cuota1'] ?? ' ',
                                    ],
                    'cuota2' => [
                                    'id'  => $_POST['id2'] ?? ' ',
                                    'year' => $_POST['year2'] ?? ' ',
                                    'mes' => $_POST['mes2'] ?? ' ',
                                    'cuota' => $_POST['cuota2'] ?? ' ',
                                    'tipo_cuota' => $_POST['tipo_cuota2'] ?? ' ',
                                    ],
                    'cuota3' => [   
                                    'id'  => $_POST['id3'] ?? ' ',
                                    'year' => $_POST['year3'] ?? ' ',
                                    'mes' => $_POST['mes3'] ?? ' ',
                                    'cuota' => $_POST['cuota3'] ?? ' ',
                                    'tipo_cuota' => $_POST['tipo_cuota3'] ?? ' ',
                                    ],
                    'cuota4' => [
                                    'id'  => $_POST['id4']?? ' ',
                                    'year' => $_POST['year4']?? ' ',
                                    'mes' => $_POST['mes4']?? ' ',
                                    'cuota' => $_POST['cuota4']?? ' ',
                                    'tipo_cuota' => $_POST['tipo_cuota4']?? ' ',
                                    ],
                    'cuota5' => [   
                                    'id'  => $_POST['id5'] ?? ' ',
                                    'year' => $_POST['year5'] ?? ' ',
                                    'mes' => $_POST['mes5'] ?? ' ',
                                    'cuota' => $_POST['cuota5'] ?? ' ',
                                    'tipo_cuota' => $_POST['tipo_cuota5'] ?? ' ',
                                    ],
                    'cuota6' => [   
                                    'id'  => $_POST['id6'] ?? ' ',
                                    'year' => $_POST['year6'] ?? ' ',
                                    'mes' => $_POST['mes6'] ?? ' ',
                                    'cuota' => $_POST['cuota6'] ?? ' ',
                                    'tipo_cuota' => $_POST['tipo_cuota6'] ?? ' ',
                                    ],
                    'cuota7' => [   
                                    'id'  => $_POST['id7'] ?? ' ',
                                    'year' => $_POST['year7'] ?? ' ',
                                    'mes' => $_POST['mes7'] ?? ' ',
                                    'cuota' => $_POST['cuota7'] ?? ' ',
                                    'tipo_cuota' => $_POST['tipo_cuota7'] ?? ' ',
                                    ],
                    'cuota8' => [   
                                    'id'  => $_POST['id8'] ?? ' ',
                                    'year' => $_POST['year8'] ?? ' ',
                                    'mes' => $_POST['mes8'] ?? ' ',
                                    'cuota' => $_POST['cuota8'] ?? ' ',
                                    'tipo_cuota' => $_POST['tipo_cuota8'] ?? ' ',
                                    ],
                    'cuota9' => [   
                                    'id'  => $_POST['id9'] ?? ' ',
                                    'year' => $_POST['year9'] ?? ' ',
                                    'mes' => $_POST['mes9'] ?? ' ',
                                    'cuota' => $_POST['cuota9'] ?? ' ',
                                    'tipo_cuota' => $_POST['tipo_cuota9'] ?? ' ',
                                    ],
                    'cuota10' => [   
                                    'id'  => $_POST['id10'] ?? ' ',
                                    'year' => $_POST['year10'] ?? ' ',
                                    'mes' => $_POST['mes10'] ?? ' ',
                                    'cuota' => $_POST['cuota10'] ?? ' ',
                                    'tipo_cuota' => $_POST['tipo_cuota10'] ?? ' ',
                                    ],
                    'cuota11' => [   
                                    'id'  => $_POST['id11'] ?? ' ',
                                    'year' => $_POST['year11'] ?? ' ',
                                    'mes' => $_POST['mes11'] ?? ' ',
                                    'cuota' => $_POST['cuota11'] ?? ' ',
                                    'tipo_cuota' => $_POST['tipo_cuota11'] ?? ' ',
                                    ],
                    'cuota12' => [   
                                    'id'  => $_POST['id12'] ?? ' ',
                                    'year' => $_POST['year12'] ?? ' ',
                                    'mes' => $_POST['mes12'] ?? ' ',
                                    'cuota' => $_POST['cuota12'] ?? ' ',
                                    'tipo_cuota' => $_POST['tipo_cuota12'] ?? ' ',
                                    ]

                ];

                //ubicacion de Views
                $directory = $_POST['directory'];
                $file = $_POST['file'];

                
                    $i = 1;
                    while ($inputs["cuota{$i}"]['year'] != null) 
                    {
                        

                        if (Sql::actualizarCuotas($inputs["cuota{$i}"])) {
                                
                             $inputs['messageError'] = 'Actualización de las cuotas excitosa';   
                             Views::render("$directory/$file", $inputs);

                        } 
                        else
                        {
                             $this->errorForm('Ups error al actualizar cuota.', $inputs, $directory, $file);
                        }
                        
                        $i++;
                    }
            } 
            else 
            {
                $directory = $_SESSION['directory'];
                Views::render("{$directory}/actualizar");
            }
            
        }


          /**+++++++++++++++++++++
         * + ELIMINAR ABOGADO +
         * +++++++++++++++++++++
         */
        public function eliminar()
        {
            session_start();
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $inputs = [
                    'id' => $_POST['id'],
                ];
                //ubicacion de Views
                $directory = 'admin';
                $file = 'eliminar';
                $base = $_POST['base']; //tabla que se va a consultar en la bbase de datos

    
                if ($datos = Sql::eliminar($base, $inputs))
                {
                    $variables['messageError'] = 'Registro Eliminado excitosamente.';

                    Views::render("admin/eliminar", $variables); 
                }
                else
                {
                    $this->errorForm('No se pudo eliminar el registros solicitado', $inputs, $directory, $file);
                }
            }
            else
            {
                Views::render('admin/eliminar');
            }
        } 
         /**+++++++++++++++++++++
         * + ELIMINAR PUBLICACION +
         * +++++++++++++++++++++
         */
        public function eliminarPublicacion()
        {
            session_start();
            if($_SERVER['REQUEST_METHOD'] == 'GET')
            {
                $inputs = [
                    'id' => $_GET['id'],
                    'img' => $_GET['img']
                ];
                //ubicacion de Views
                $directory = 'secretario';
                $file = 'publicar';
                $base = $_GET['base']; //tabla que se va a consultar en la bbase de datos

    
                if ($datos = Sql::eliminar($base, $inputs))
                {
                    if ($inputs['img'] == 'images/noticias/') 
                    {
                        $variables['noticias'] = Sql::consultarTodo('noticias');
                        $variables['messageError'] = 'Registro Eliminado excitosamente.';

                        Views::render("secretario/publicar", $variables);

                    }
                    else
                    {
                        unlink($inputs['img']);
                        $variables['noticias'] = Sql::consultarTodo('noticias');
                        $variables['messageError'] = 'Registro Eliminado excitosamente.';
                        Views::render("secretario/publicar", $variables);
                    }
                     
                }
                else
                {
                    $this->errorForm('No se pudo eliminar el registros solicitado', $inputs, $directory, $file);
                }
            }
            else
            {
                 $variables['noticias'] = Sql::consultarTodo('noticias');
                $directory = $_SESSION['directory'];
                Views::render("{$directory}/publicar", $variables);
            }
        } 

         /**+++++++++++++++++++++
         * + ELIMINAR PUBLICACION +
         * +++++++++++++++++++++
         */
        public function editarPublicacion()
        {
            session_start();
            if($_SERVER['REQUEST_METHOD'] == 'GET')
            {
                $inputs = [
                    'id' => $_GET['id']
                ];
                //ubicacion de Views
                $directory = 'secretario';
                $file = 'publicar';
                $base = $_GET['base']; //tabla que se va a consultar en la bbase de datos

    
                if ($variables = Sql::consulta('noticias', 'id', $inputs['id']))
                {
                        $variables['noticias'] = Sql::consultarTodo('noticias');
                        $variables['tabla'] = 'editar';
                        Views::render("secretario/publicar", $variables);     
                }
                else
                {
                    $this->errorForm('No se pudo obtener los datos de la noticia solicitada.', $inputs, $directory, $file);
                }
            }
            elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                //acomodamos el archivo imagen
                    $url ='images/noticias/';
                    $archivo = $_FILES['img']['tmp_name'];
                    $nombre = $_FILES['img']['name'];
                   

                if ($_FILES['img']['error'] == 4) {
                            $inputs = [
                            'id' => $_POST['id'],
                            'titulo' => $_POST['titulo'],
                            'fecha' => $_POST['fecha'],
                            'mensaje' => $_POST['mensaje'],
                            'tiempo' => $_POST['tiempo'],
                            'img' => $_POST['imagenActual']
                            ];
                }
                else
                {
                            $inputs = [
                            'id' => $_POST['id'],
                            'titulo' => $_POST['titulo'],
                            'fecha' => $_POST['fecha'],
                            'mensaje' => $_POST['mensaje'],
                            'tiempo' => $_POST['tiempo'],
                            'img' => $nombre
                            ]; 
                }
                

                

                //ubicacion de Views
                $directory = $_POST['directory'];
                $file = $_POST['file'];

                if (Sql::editarPublicacion($inputs) == true) 
                {
                    $variables['noticias'] = Sql::consultarTodo('noticias');
                   move_uploaded_file($archivo, $url.$nombre);
                   $variables['messageError'] = 'Su edición fue subida correctamente.';                   
                   Views::render("$directory/$file", $variables);
                }
                else
                {
                    $variables['noticias'] = Sql::consultarTodo('noticias');
                    $this->errorForm('Ups ocurrio un error al actualizar la publicación vuelve lo a intentar.', $variables, $directory, $file);
                }
                
            } 
            else
            {
                 $variables['noticias'] = Sql::consultarTodo('noticias');
                $directory = $_SESSION['directory'];
                Views::render("{$directory}/publicar", $variables);
            }
        } 
        

        /**++++++++++++++++++++++
        CONTROLADOR DE PUBLICACIONES
        ++++++++++++++++++++++++++++++++*/

        public function publicar()
        {   
            session_start();

          

            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {
                
                //acomodamos el archivo imagen
                    $url ='images/noticias/';
                    $archivo = $_FILES['img']['tmp_name'];
                    $nombre = $_FILES['img']['name'];

                $inputs = [

                    'titulo' => $_POST['titulo'],
                    'fecha' => $_POST['fecha'],
                    'mensaje' => $_POST['mensaje'],
                    'tiempo' => $_POST['tiempo'],
                    'img' => $nombre
                ];

                //ubicacion de Views
                $directory = $_POST['directory'];
                $file = $_POST['file'];

                if (Sql::setPublicar($inputs) == true) 
                {
                    $variables['noticias'] = Sql::consultarTodo('noticias');
                   move_uploaded_file($archivo, $url.$nombre);
                   $variables['messageError'] = 'Se publicado correctamente su Noticia.';                   
                   Views::render("$directory/$file", $variables);
                }
                else
                {
                    $this->errorForm('Ups ocurrio un error al publicar vuelve lo a intentar.', $inputs, $directory, $file);
                }
                
            }
            else
            {
                $variables['noticias'] = Sql::consultarTodo('noticias');
                $directory = $_SESSION['directory'];
                Views::render("{$directory}/publicar", $variables);
            }

            
        }
        /*+++++++++++++++++++++++++++++++++++++
            LISTA DE LOS ABOGADOS INSCRIPTOS 
            ++++++++++++++++++++++++++++++++++++
        */
        public function listas()
        {   
            session_start();
            $variables = Sql::consultas('usuarios', 'nivel_usuario', '1');
            Views::render('admin/listas', $variables);
        }

        public function errorForm($messageError, array $variables = [], $directory, $file)
        {
            


            $variables['messageError'] = $messageError;

            Views::render("$directory/$file", $variables);
        }

    }