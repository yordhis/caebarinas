<?php
    require_once DIRECCION_APP . 'views/secretario/parcial/head.view.php';
?>
<?php
    require_once DIRECCION_APP . 'views/secretario/parcial/menu.view.php';
?>

<div class="register">

<div class="container-fluid">

<div class="row row-eq-height">

    <div class="col-lg-12" style="height: 200px;">
       <!--Hacer espacio del menu--> 
    </div>
           <div class="col-lg-12 col-xs-12" align="center">
                    <h1>ACCIÓN DE REGISTRAR</h1>
            </div>
                        <!--BOTONES DE ACCIONES DEL SISTEMA-->
                        <div class="col-lg-2" >

                            <div class="button btn-danger text-center trans_200 " style="border-radius:5px;"><a href="cerrar" style="Color:white;">
                                SALIR</a> 
                            </div><br> 
                            
                            <div class="button button_color_2 text-center trans_200" style="border-radius:5px;"><a onClick='document.getElementById("registrar").style.display = "block";document.getElementById("formCuota").style.display = "none";
                                document.getElementById("formFamiliar").style.display = "none";' style="Color:white;">
                                ABOGADOS</a> 
                            </div><br>

                            <div class="button button_color_2 text-center trans_200" style="border-radius:5px;"><a onClick='document.getElementById("registrar").style.display = "none";
                                document.getElementById("formCuota").style.display = "none";
                                document.getElementById("formFamiliar").style.display = "block";' style="Color:white;">
                                FAMILIARES</a> 
                            </div><br>

                            <div class="button button_color_2 text-center trans_200" style="border-radius:5px;">
                                <a onClick='document.getElementById("registrar").style.display = "none";document.getElementById("formCuota").style.display = "block";
                                document.getElementById("formFamiliar").style.display = "none";'  style="Color:white;">CUOTAS</a>
                            </div><br>

                               
                        </div>


        <!--+++++++++++++++++++++++++++++++++++++++++ 
                FORMULARIO DE REGISTRO DE CUOTAS
            ++++++++++++++++++++++++++++++++++++++++++-->
        <div class="col-lg-8" id="formCuota" style="display: none;">

            <form action="setCuotas" method="post">
                    <!--UBICACIÓN-->
                        <input type="hidden" name="directory" value="secretario">
                        <input type="hidden" name="file" value="registro">
                <table class="table">
                    <thead class="titulo-tabla">
                    <tr>
                        <td colspan="7">REGISTRO DE CUOTAS</td>
                        <td align="right">
                            <a onClick='document.getElementById("formCuota").style.display = "none"' style="cursor: pointer; ">
                                <span class="fas fa-times"></span>
                            </a>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="subtitulo-tabla">
                        <td>N°</td>
                        <td colspan="2">AÑO</td>
                        <td colspan="2">MES</td>
                        <td colspan="2">CUOTA</td>
                        <td colspan="2">TIPO</td>
                    </tr>
                        <?php
                        

                            for ($i=0; $i < 5; $i++):
                                
                        ?>
                    <tr class="text-datos">
                        <td><?= $i+1; ?></td>
                        <td colspan="2">
                            <input type="number" name="year<?=$i+1?>" placeholder="AÑO" class="form-control">
                        </td>
                        <td colspan="2">
                            <select name="mes<?=$i+1?>" class="form-control">
                                <option value="ENERO">ENERO</option>
                                <option value="FEBRERO">FEBRERO</option>
                                <option value="MARZO">MARZO</option>
                                <option value="ABRIL">ABRIL</option>
                                <option value="MAYO">MAYO</option>
                                <option value="JUNIO">JUNIO</option>
                                <option value="JULIO">JULIO</option>
                                <option value="AGOSTO">AGOSTO</option>
                                <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                                <option value="OCTUBRE">OCTUBRE</option>
                                <option value="NOVIEMBRE">NOVIEMBRE</option>
                                <option value="DICIEMBRE">DICIEMBRE</option>
                            </select>

                        </td>
                        <td colspan="2">
                            <input type="text" name="cuota<?=$i+1?>" placeholder="CUOTA" class="form-control">
                        </td>
                        <td colspan="2">
                            <select name="tipo_cuota<?=$i+1?>" class="form-control">
                                <option value="1">ORDINARIA</option>
                                <option value="2">EXTRAORDINARIA</option>
                            </select>
                        </td>
                    </tr>
                        <?php
                            endfor;
                        ?>

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="subtitulo-tabla">ASIGNAR CUOTA A:</td>
                        <td colspan="4">
                            <input type="text" name="cedula" class="form-control" placeholder="CEDULA DEL ABOGADO">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="8">
                            <button class="btn btn-lg btn-success buttom" align="center">REGISTRAR</button>
                        </td>
                    </tr>
                </tfoot>
                </table>
            </form>
        </div>                

       

        <!--+++++++++++++++++++++++++++++++++++
            FORMULARIOA DE REGISTRO DE ABOGADO
            +++++++++++++++++++++++++++++++++++-->

        <div class="col-lg-10 table-responsive" id="registrar" style="display:none;">
            <form action="registrar" method="post">
                 <!--UBICACIÓN-->
                        <input type="hidden" name="directory" value="secretario">
                        <input type="hidden" name="file" value="registro">
            <table class="table">
            <thead class="titulo-tabla">
                    <tr>
                        <td colspan="7">CREAR USUARIO Y CONTRASEÑA</td>
                        <td align="right">
                            <a onClick='document.getElementById("registrar").style.display = "none"' style="cursor: pointer; ">
                                <span class="fas fa-times"></span>
                            </a>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="subtitulo-tabla">
                        <td colspan="4">USUARIO</td>
                        <td colspan="4">CONTRASEÑA</td>
                    </tr>
                    <tr class="text-datos">
                        <td colspan="4">
                            <input type="text" name="usuario" placeholder="USUARIO" class="form-control" autocomplete="off">
                        </td >
                        <td colspan="4">
                            <input type="password" name="clave" placeholder="CONTRASEÑA" class="form-control">    
                        </td>
                    </tr>
                </tbody>
                <thead class="titulo-tabla">
                    <tr>
                        <td colspan="12">DATOS PERSONALES</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="subtitulo-tabla">
                        <td colspan="2">NOMBRES</td>
                        <td colspan="2">APELLIDOS</td>
                        <td colspan="2">CÉDULA</td>
                        <td>EDAD</td>
                        <td colspan="2">NACIONALIDAD</td>
                        
                    </tr>
                    <tr class="text-datos">
                        <td colspan="2">
                            <input type="text" name="nombres" placeholder="NOMBRES" class="form-control">
                        </td >
                        <td colspan="2">
                            <input type="text" name="apellidos" placeholder="APELLIDOS" class="form-control">    
                        </td>
                        <td colspan="2">
                            <input type="text" name="cedula" placeholder="CEDULA" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="edad" placeholder="EDAD" class="form-control">
                        </td>
                        <td colspan="2">
                            <input type="text" name="nacionalidad" placeholder="NACIONALIDAD" class="form-control">
                        </td>
                    </tr>
                    <tr class="subtitulo-tabla">
                        <td colspan="2">FECHA DE NACIMIENTO</td>
                        <td colspan="2">LUGAR DE NACIMIENTO</td>
                        <td colspan="2">ESTADO CIVIL</td>
                        <td colspan="2">TELEFONO</td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="date" name="fecha_nacimiento" placeholder="FECHA NACIMIENTO" class="form-control">
                        </td>
                        <td colspan="2">
                            <input type="text" name="lugar_nacimiento" placeholder="NACIÓ" class="form-control">
                        </td>
                        <td colspan="2">
                            <input type="text" name="estado_civil" placeholder="ESTADO CIVIL" class="form-control">
                        </td>
                        <td colspan="2">
                            <input type="text" name="telefono" placeholder="TELEFONO" class="form-control">
                        </td>
                    </tr>
                </tbody>

                <thead class="titulo-tabla">
                    <tr>
                        <td colspan="8">DATOS GREMIALES</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="subtitulo-tabla">
                        <td>N° COLEGIO</td>
                        <td>TOMO</td>
                        <td>FOLIO</td>
                        <td>FECHA</td>
                        <td>N° IMPRE</td>
                        <td colspan="3">UNIVERSIDAD</td>
                    </tr>
                    <tr class="text-datos">
                        <td>
                            <input type="text" name="n_colegio" placeholder="NUMERO" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="tomo" placeholder="TOMO" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="folio" placeholder="FOLIO" class="form-control">
                        </td>
                        <td>
                            <input type="date" name="fecha" placeholder="FECHA" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="n_impre" placeholder="Impre" class="form-control">
                        </td>
                        <td colspan="3">
                            <input type="text" name="universidad" placeholder="UNIVERSIDAD" class="form-control">
                        </td>
                    </tr>
                </tbody>

                 <thead class="titulo-tabla">
                    <tr>
                        <td colspan="8">DIRECCION DE DOMICILIO</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-datos">
                        <td colspan="8">
                            <input type="text" name="direccion" placeholder="DIRECCIÓN" class="form-control">
                        </td>
                    </tr>
                </tbody>

                 <thead class="titulo-tabla">
                    <tr>
                        <td colspan="8">DATOS LABORALES</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="subtitulo-tabla">
                        <td colspan="6">DIRECCIÓN OFICINA / EMPRESA O INSTITUTO</td>
                        <td colspan="2">TELEFONO</td>
                    </tr>
                    <tr class="text-datos">
                        <td colspan="6">
                            <input type="text" name="direccion_laboral" placeholder="DIRECCIÓN" class="form-control">
                        </td>
                        <td colspan="2">
                            <input type="text" name="telefono_laboral" placeholder="TELEFONO" class="form-control">
                        </td>
                    </tr>
                </tbody>

                 <thead class="titulo-tabla">
                    <tr>
                        <td colspan="8">REDES SOCIALES</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="subtitulo-tabla">
                        <td colspan="2">FACEBOOK</td>
                        <td colspan="2">INSTAGRAM</td>
                        <td colspan="2">TWITTER</td>
                        <td colspan="2">E-MAIL</td>
                    </tr>
                    <tr class="text-datos">
                        
                        <td colspan="2">
                            <input type="text" name="facebook" placeholder="FACEBOOK" class="form-control">
                        </td>
                        <td colspan="2">
                            <input type="text" name="instagram" placeholder="INSTAGRAM" class="form-control">
                        </td>
                        <td colspan="2">
                            <input type="text" name="twitter" placeholder="TWITTER" class="form-control">
                        </td>
                        <td colspan="2">
                            <input type="email" name="email" placeholder="E-MAIL" class="form-control">
                        </td>
                    </tr>
                </tbody>

                 <thead class="titulo-tabla">
                    <tr>
                        <td colspan="8">INFORMACIÓN ADICIONAL</td>
                    </tr>
                </thead>
                <Tbody>
                    <tr class="text-datos">
                        <td colspan="8">
                            <input type="text" name="info_adicional" placeholder="COMPLEMENTA TU INFORMACIÓN" class="form-control">
                        </td>
                    </tr>
                </Tbody>
                <tfoot>
                    <tr>
                        <td colspan="8">
                            <button class="btn btn-lg btn-success buttom" align="center">REGISTRAR</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
            </form>    
        </div>

        <div class="col-lg-8 table-responsive" style="display: none;" id="formFamiliar">
              <!--++++++++++++++++++++++++++++++++++++
                FORMULARIO DE REGISTRO DE FAMILIARES
                ++++++++++++++++++++++++++++++++++++-->


            <form action="setFamiliares" method="post">
                <!--UBICACIÓN-->
                        <input type="hidden" name="directory" value="secretario">
                        <input type="hidden" name="file" value="registro">
                <table class="table">
                    <thead class="titulo-tabla">
                    <tr>
                        <td colspan="7">DATOS FAMILIARES</td>
                         <td align="right">
                            <a onClick='document.getElementById("formFamiliar").style.display = "none"' style="cursor: pointer; ">
                                <span class="fas fa-times"></span>
                            </a>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="subtitulo-tabla">
                        <td>N°</td>
                        <td colspan="2">NOMBRES</td>
                        <td colspan="2">APELLIDOS</td>
                        <td colspan="2">PARENTESCO</td>
                        <td colspan="2">TELEFONO</td>
                    </tr>
                        <?php
                        

                            for ($i=0; $i < 5; $i++):
                                
                        ?>
                    <tr class="text-datos">
                        <td><?= $i+1; ?></td>
                        <td colspan="2">
                            <input type="text" name="nombre_fam<?=$i+1?>" placeholder="NOMBRES" class="form-control">
                        </td>
                        <td colspan="2">
                            <input type="text" name="apellido_fam<?=$i+1?>" placeholder="APELLIDOS" class="form-control">
                        </td>
                        <td colspan="2">
                            <input type="text" name="parentesco_fam<?=$i+1?>" placeholder="PARENTESCO" class="form-control">
                        </td>
                        <td colspan="2">
                            <input type="phone" name="telefono_fam<?=$i+1?>" placeholder="TELEFONO" class="form-control">
                        </td>
                    </tr>
                        <?php
                            endfor;
                     
                        ?>

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="subtitulo-tabla">ASIGNAR CARGA A:</td>
                        <td colspan="4">
                            <input type="text" name="cedula" class="form-control" placeholder="CEDULA DEL ABOGADO">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="8">
                            <button class="btn btn-lg btn-success buttom" align="center">REGISTRAR</button>
                        </td>
                    </tr>
                </tfoot>
                </table>
            </form>
        </div>







<div class="col-lg-12" style="height: 200px;">

            <!--++++++++++++++++++++
                MENSAJE DE ERROR   
                ++++++++++++++++++++-->
                <?php 
                    if (isset($variables['messageError'])):
                ?>
                    <div class="col-lg-12" align="center" id="messageError">
                        <h2 class="text-alerta">
                            <?= $variables['messageError'] ?? ''; ?>
                        </h2>
                    
                        <br>
                            <a onClick='document.getElementById("messageError").style.display = "none";' style="cursor:pointer;">Salir</a>
                    </div>
                <?php
                   endif; 

                ?>   



</div>


<?php
require_once DIRECCION_APP . 'views/secretario/parcial/footer.view.php';
?>