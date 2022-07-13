<?php

namespace App;

class Sql 
{
     /**++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     * SE CONSULTA TODOS LOS DATOS DEL USUARIO QUE ENTRO AL SISTEMA+
     * +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     */
    public function sesion($usuario)
    {
        include(DIRECCION_APP . 'configuracion/database.php');

        $sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
        $sentencia = $pdo->prepare($sql);
        $sentencia->bindParam(':usuario', $usuario);
       
        $sentencia->execute();
        $resultado = $sentencia->fetch();
        return $resultado;
    }

     /**++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     * SE CONSULTA TODOS LOS DATOS DEL USUARIO QUE ENTRO AL SISTEMA+
     * +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     */
    public function sesionCedula($cedula)
    {
        include(DIRECCION_APP . 'configuracion/database.php');

        $sql = "SELECT * FROM usuarios WHERE cedula = :cedula";
        $sentencia = $pdo->prepare($sql);
        $sentencia->bindParam(':cedula', $cedula);
       
        $sentencia->execute();
        $resultado = $sentencia->fetch();
        return $resultado;
    }


     /**++++++++++++++++++++++++++++++++++++
     * SE CONSULTA UN REGISTRO DE UNA TABLA+
     * +++++++++++++++++++++++++++++++++++++
     */
    public function consulta($tabla,$campo,$parametro)
    {
        include(DIRECCION_APP . 'configuracion/database.php');

        $sql = "SELECT * FROM $tabla WHERE $campo = :parametro";
        $sentencia = $pdo->prepare($sql);
        $sentencia->bindParam(':parametro', $parametro);
       
        $sentencia->execute();
        $resultado = $sentencia->fetch();
        return $resultado;
    }
     /**++++++++++++++++++++++++++++++++++++
     * SE CONSULTAS DE TODOS REGISTRO DE UNA TABLA+
     * +++++++++++++++++++++++++++++++++++++
     */
    public function consultarTodo($tabla)
    {
        include(DIRECCION_APP . 'configuracion/database.php');

        $sql = "SELECT * FROM $tabla ";
        $sentencia = $pdo->prepare($sql);
       
       
        $sentencia->execute();
        $resultado = $sentencia->fetchAll();
        return $resultado;
    }

     /**++++++++++++++++++++++++++++++++++++
     * SE CONSULTA LAS TRES ULTIMAS NOTICIAS+
     * +++++++++++++++++++++++++++++++++++++
     */
    public function consultarNoticia($tabla)
    {
        include(DIRECCION_APP . 'configuracion/database.php');

        $sql = "SELECT * FROM $tabla ORDER BY tiempo DESC limit 3";
        $sentencia = $pdo->prepare($sql);
       
       
        $sentencia->execute();
        $resultado = $sentencia->fetchAll();
        return $resultado;
    }


     /**+++++++++++++++++++++++++++++++++++++++++
     * SE CONSULTA VARIOS REGISTROS DE UNA TABLA+
     * ++++++++++++++++++++++++++++++++++++++++++
     */
    public function consultas($tabla,$campo,$parametro)
    {
        include(DIRECCION_APP . 'configuracion/database.php');

        $sql = "SELECT * FROM $tabla WHERE $campo = :parametro";
        $sentencia = $pdo->prepare($sql);
        $sentencia->bindParam(':parametro', $parametro);
       
        $sentencia->execute();
        $resultado = $sentencia->fetchAll();
        return $resultado;
    }
    
    /**+++++++++++++++++++++++++++++++++++++++++
     * SE CONSULTA VARIOS REGISTROS DE UNA TABLA+
     * ++++++++++++++++++++++++++++++++++++++++++
     */
    public function consultas2($tabla,$campo1, $campo2,$parametro1, $parametro2)
    {
        include(DIRECCION_APP . 'configuracion/database.php');

        $sql = "SELECT * FROM $tabla WHERE $campo1 = :parametro1 and $campo2 = :parametro2";
        $sentencia = $pdo->prepare($sql);
        $sentencia->bindParam(':parametro1', $parametro1);
        $sentencia->bindParam(':parametro2', $parametro2);
       
        $sentencia->execute();
        $resultado = $sentencia->fetchAll();
        return $resultado;
    }

     /**++++++++++++++++++++
     * SE VALIDAD LA SESION+
     * +++++++++++++++++++++
     */
    public function validar($inputs)
    {
        include(DIRECCION_APP . 'configuracion/database.php');

        $sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
        $sentencia = $pdo->prepare($sql);
        $sentencia->bindParam(':usuario', $inputs['usuario']);
       
        $sentencia->execute();
        $resultado = $sentencia->fetch();
        if ($resultado['usuario'] == $inputs['usuario'] && $resultado['clave'] ==  $inputs['clave'] ) {
            return true;
        }
        else
        {
            return false;
        }
        
    }
     /**+++++++++++++++++++++++++++++++
     * REGISTRAR PAGOS DE LOS ABOGADOS+
     * ++++++++++++++++++++++++++++++++
     */
    public function procesarPago($variables)
    {
        //incluimos la conexion
        include(DIRECCION_APP . 'configuracion/database.php');

        $sql =  'INSERT INTO pagos (nombre, cedula, banco, numero_referencia, fecha, monto) VALUES(:nombre, :cedula, :banco, :numero_referencia, :fecha, :monto)';

        $sentencia = $pdo->prepare($sql);

        $sentencia->bindParam(':nombre', $variables['nombre']);
        $sentencia->bindParam(':cedula', $variables['cedula']);
        $sentencia->bindParam(':banco', $variables['banco']);
        $sentencia->bindParam(':numero_referencia', $variables['numero_referencia']);
        $sentencia->bindParam(':fecha', $variables['fecha']);
        $sentencia->bindParam(':monto', $variables['monto']);
        
        if($sentencia->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

     /**+++++++++++++++++++++++++++++++
     * CAMBIAR LOS ESTADO DE LOS PAGOS+
     * ++++++++++++++++++++++++++++++++
     */
    public function cambiarEstado($inputs)
        {
            include(DIRECCION_APP . 'configuracion/database.php');

            $sql = "UPDATE cuotas SET estado_cuota = :estado_cuota WHERE id = :id";
            $sentencia = $pdo->prepare($sql);
            $sentencia->bindParam(':id', $inputs['id_cuota']);
            $sentencia->bindParam(':estado_cuota', $inputs['estado_cuota']);
            if($sentencia->execute())
            {
                return true;
            }
            else
            {
                return false;
            }
        }

    /**+++++++++++++++++++++++++++++
     * REGISTRO DE USUARIOS ABOGADO+
     * +++++++++++++++++++++++++++++
     */
    public function setUsuario($variables)
    {
        //incluimos la conexion
        include(DIRECCION_APP . 'configuracion/database.php');

        $sql =  'INSERT INTO usuarios (usuario, clave, nombres, apellidos, cedula, edad, nacionalidad, fecha_nacimiento, lugar_nacimiento, estado_civil, telefono, n_colegio, tomo, folio, fecha, n_impre, universidad, direccion, direccion_laboral, telefono_laboral, redes_sociales, email, info_adicional) 

        VALUES(:usuario, :clave, :nombres, :apellidos, :cedula, :edad, :nacionalidad, :fecha_nacimiento, :lugar_nacimiento, :estado_civil, :telefono, :n_colegio, :tomo, :folio, :fecha, :n_impre, :universidad, :direccion, :direccion_laboral, :telefono_laboral, :redes_sociales, :email, :info_adicional)';

        $sentencia = $pdo->prepare($sql);

        $sentencia->bindParam(':usuario', $variables['usuario']);//1
        $sentencia->bindParam(':clave', $variables['clave']);//2
        $sentencia->bindParam(':nombres', $variables['nombres']);//3
        $sentencia->bindParam(':apellidos', $variables['apellidos']);//4
        $sentencia->bindParam(':cedula', $variables['cedula']);//5
        $sentencia->bindParam(':edad', $variables['edad']);//6
        $sentencia->bindParam(':nacionalidad', $variables['nacionalidad']);//7
        $sentencia->bindParam(':fecha_nacimiento', $variables['fecha_nacimiento']);//8
        $sentencia->bindParam(':lugar_nacimiento', $variables['lugar_nacimiento']);//9
        $sentencia->bindParam(':estado_civil', $variables['estado_civil']);//10
        $sentencia->bindParam(':telefono', $variables['telefono']);//11
        $sentencia->bindParam(':n_colegio', $variables['n_colegio']);//12
        $sentencia->bindParam(':tomo', $variables['tomo']);//13
        $sentencia->bindParam(':folio', $variables['folio']);//14
        $sentencia->bindParam(':fecha', $variables['fecha']);//15
        $sentencia->bindParam(':n_impre', $variables['n_impre']);//16
        $sentencia->bindParam(':universidad', $variables['universidad']);//17
        $sentencia->bindParam(':direccion', $variables['direccion']);//18
        $sentencia->bindParam(':direccion_laboral', $variables['direccion_laboral']);//19
        $sentencia->bindParam(':telefono_laboral', $variables['telefono_laboral']);//20
        $sentencia->bindParam(':redes_sociales', $variables['redes_sociales']);//21
        $sentencia->bindParam(':email', $variables['email']);//22
        $sentencia->bindParam(':info_adicional', $variables['info_adicional']);//23
        
        
        if($sentencia->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**+++++++++++++++++++++++++++++
     * REGISTRO DE CARGA FAMILIAR  +
     * +++++++++++++++++++++++++++++
     */

    public function setFamiliares($variables)
    {
        //incluimos la conexion
        include(DIRECCION_APP . 'configuracion/database.php');

        $sql = "INSERT INTO datos_familiares (id_usuario, nombre, apellido, parentesco, telefono) 
        VALUES(:id_usuario, :nombre, :apellido, :parentesco, :telefono)";

        $sentencia = $pdo->prepare($sql);

        $sentencia->bindParam(':id_usuario', $variables['id_usuario']);
        $sentencia->bindParam(':nombre', $variables['nombre']);
        $sentencia->bindParam(':apellido', $variables['apellido']);
        $sentencia->bindParam(':parentesco', $variables['parentesco']);
        $sentencia->bindParam(':telefono', $variables['telefono']);

        if ($sentencia->execute()) {
            return true;
        } else {
            return false;
        }
    }
    /**++++++++++++++++++++++
     *  PUBLICAR NOTICIA  +
     * ++++++++++++++++++++++
     */

    public function setPublicar($variables)
    {
        //incluimos la conexion
        include(DIRECCION_APP . 'configuracion/database.php');

        $sql = "INSERT INTO noticias ( titulo, fecha, mensaje, img, tiempo) 
        VALUES(:titulo, :fecha, :mensaje, :img, :tiempo)";

        $sentencia = $pdo->prepare($sql);

        $sentencia->bindParam(':titulo', $variables['titulo']);
        $sentencia->bindParam(':fecha', $variables['fecha']);
        $sentencia->bindParam(':mensaje', $variables['mensaje']);
        $sentencia->bindParam(':img', $variables['img']);
        $sentencia->bindParam(':tiempo', $variables['tiempo']);

        if ($sentencia->execute()) {
            return true;
        } else {
            return false;
        }
    }
    /**++++++++++++++++++++++
     *  REALIZAR SUSCRIPCION +
     * ++++++++++++++++++++++
     */
    public function setSuscripcion($email)
    {
        //incluimos la conexion
        include(DIRECCION_APP . 'configuracion/database.php');

        $sql = "INSERT INTO suscriptores (email) 
        VALUES(:email)";

        $sentencia = $pdo->prepare($sql);

        $sentencia->bindParam(':email', $email);

        if($sentencia->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }   

    /**++++++++++++++++++++++
     *  PUBLICAR NOTICIA  +
     * ++++++++++++++++++++++
     */

    public function editarPublicacion($variables)
    {
        //incluimos la conexion
        include(DIRECCION_APP . 'configuracion/database.php');

        $sql = "UPDATE noticias SET  titulo = :titulo, fecha = :fecha, mensaje = :mensaje, img = :img, tiempo = :tiempo 
         WHERE id = :id";


        $sentencia = $pdo->prepare($sql);

        $sentencia->bindParam(':id', $variables['id']);
        $sentencia->bindParam(':titulo', $variables['titulo']);
        $sentencia->bindParam(':fecha', $variables['fecha']);
        $sentencia->bindParam(':mensaje', $variables['mensaje']);
        $sentencia->bindParam(':img', $variables['img']);
        $sentencia->bindParam(':tiempo', $variables['tiempo']);

        if ($sentencia->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**++++++++++++++++++++++
     *  REGISTRO DE CUOTAS  +
     * ++++++++++++++++++++++
     */

    public function setCuotas($variables)
    {
        //incluimos la conexion
        include(DIRECCION_APP . 'configuracion/database.php');

        $sql = "INSERT INTO cuotas (id_usuario, year, mes, cuota, tipo_cuota) 
        VALUES(:id_usuario, :year, :mes, :cuota, :tipo_cuota)";

        $sentencia = $pdo->prepare($sql);

        $sentencia->bindParam(':id_usuario', $variables['id_usuario']);
        $sentencia->bindParam(':year', $variables['year']);
        $sentencia->bindParam(':mes', $variables['mes']);
        $sentencia->bindParam(':cuota', $variables['cuota']);
        $sentencia->bindParam(':tipo_cuota', $variables['tipo_cuota']);

        if ($sentencia->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**+++++++++++++++++++++++++++++
     * ACTILIZAR DATOS DE ABOGADO  +
     * +++++++++++++++++++++++++++++
     */

    public function actualizarAbogado($variables)
    {
        //incluimos la conexion
        include(DIRECCION_APP . 'configuracion/database.php');

         $sql = "UPDATE usuarios SET usuario = :usuario, clave = :clave, nombres = :nombres, apellidos = :apellidos, cedula = :cedula, edad = :edad, nacionalidad = :nacionalidad, fecha_nacimiento = :fecha_nacimiento, lugar_nacimiento = :lugar_nacimiento, estado_civil = :estado_civil, telefono = :telefono, n_colegio = :n_colegio, tomo = :tomo, folio = :folio, fecha = :fecha, n_impre = :n_impre, universidad = :universidad, direccion = :direccion, direccion_laboral = :direccion_laboral, telefono_laboral = :telefono_laboral, redes_sociales = :redes_sociales, email = :email, info_adicional = :info_adicional WHERE id = :id";

            $sentencia = $pdo->prepare($sql);
             $sentencia->bindParam(':id', $variables['id']);//24
            
            $sentencia->bindParam(':usuario', $variables['usuario']);//1
            $sentencia->bindParam(':clave', $variables['clave']);//2
            $sentencia->bindParam(':nombres', $variables['nombres']);//3
            $sentencia->bindParam(':apellidos', $variables['apellidos']);//4
            $sentencia->bindParam(':cedula', $variables['cedula']);//5
            $sentencia->bindParam(':edad', $variables['edad']);//6
            $sentencia->bindParam(':nacionalidad', $variables['nacionalidad']);//7
            $sentencia->bindParam(':fecha_nacimiento', $variables['fecha_nacimiento']);//8
            $sentencia->bindParam(':lugar_nacimiento', $variables['lugar_nacimiento']);//9
            $sentencia->bindParam(':estado_civil', $variables['estado_civil']);//10
            $sentencia->bindParam(':telefono', $variables['telefono']);//11
            $sentencia->bindParam(':n_colegio', $variables['n_colegio']);//12
            $sentencia->bindParam(':tomo', $variables['tomo']);//13
            $sentencia->bindParam(':folio', $variables['folio']);//14
            $sentencia->bindParam(':fecha', $variables['fecha']);//15
            $sentencia->bindParam(':n_impre', $variables['n_impre']);//16
            $sentencia->bindParam(':universidad', $variables['universidad']);//17
            $sentencia->bindParam(':direccion', $variables['direccion']);//18
            $sentencia->bindParam(':direccion_laboral', $variables['direccion_laboral']);//19
            $sentencia->bindParam(':telefono_laboral', $variables['telefono_laboral']);//20
            $sentencia->bindParam(':redes_sociales', $variables['redes_sociales']);//21
            $sentencia->bindParam(':email', $variables['email']);//22
            $sentencia->bindParam(':info_adicional', $variables['info_adicional']);//23

           

            if($sentencia->execute())
            {
                return true;
            }
            else
            {
                return false;
            }
    }

    public function actualizarFamiliares($variables)
    {
        //incluimos la conexion
        include(DIRECCION_APP . 'configuracion/database.php');

         $sql = "UPDATE datos_familiares SET nombre = :nombre, apellido = :apellido, parentesco = :parentesco, telefono = :telefono WHERE id = :id";
            $sentencia = $pdo->prepare($sql);
            $sentencia->bindParam(':id', $variables['id']);
            $sentencia->bindParam(':nombre', $variables['nombre']);
            $sentencia->bindParam(':apellido', $variables['apellido']);
            $sentencia->bindParam(':parentesco', $variables['parentesco']);
            $sentencia->bindParam(':telefono', $variables['telefono']);

            if($sentencia->execute())
            {
                return true;
            }
            else
            {
                return false;
            }
    }

    public function actualizarCuotas($variables)
    {
         //incluimos la conexion
        include(DIRECCION_APP . 'configuracion/database.php');

         $sql = "UPDATE cuotas SET year = :year, mes = :mes, cuota = :cuota, tipo_cuota = :tipo_cuota WHERE id = :id";
            $sentencia = $pdo->prepare($sql);
            $sentencia->bindParam(':id', $variables['id']);
            $sentencia->bindParam(':year', $variables['year']);
            $sentencia->bindParam(':mes', $variables['mes']);
            $sentencia->bindParam(':cuota', $variables['cuota']);
            $sentencia->bindParam(':tipo_cuota', $variables['tipo_cuota']);

            if($sentencia->execute())
            {
                return true;
            }
            else
            {
                return false;
            }
    }

     /**+++++++++++++++++++++++++++++++++++++++++
     * SE ELIMINA EL REGISTROS DE UN ABOGADO    +
     * ++++++++++++++++++++++++++++++++++++++++++
     */
    public function eliminar($tabla, $variables)
    {
        include(DIRECCION_APP . 'configuracion/database.php');

        $sql = "DELETE FROM $tabla WHERE id = :id";
        $sentencia = $pdo->prepare($sql);
        $sentencia->bindParam(':id', $variables['id']);
       
        if ($sentencia->execute()) {
            return true;
        } else {
            return false;
        }
        
        
    }
}