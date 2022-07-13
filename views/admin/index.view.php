<?php
    require_once DIRECCION_APP . 'views/admin/parcial/head.view.php';
?>
<?php
    require_once DIRECCION_APP . 'views/admin/parcial/menu.view.php';
?>



<div class="register">

    <div class="container-fluid">
    
    <div class="row row-eq-height">

        <div class="col-lg-12" style="height: 200px;">
           <!--Hacer espacio del menu--> 
        </div>
        <div class="col-lg-12 col-xs-12" align="center">
            <h1>ACCIÓN DE CONSULTAS</h1>
        </div>

            <!--BOTONES DE ACCIONES DEL SISTEMA-->
                        <div class="col-lg-2"> 

                            <div class="button btn-danger text-center trans_200" style="border-radius:5px;"><a href="cerrar" style="Color:white;">
                                SALIR</a> 
                            </div><br>
                            
                            <div class="button button_color_2 text-center trans_200" style="border-radius:5px;"><a onClick='document.getElementById("pago").style.display = "none";document.getElementById("buscar").style.display = "block";document.getElementById("cuota").style.display = "none";' style="Color:white;">
                                ABOGADOS</a> 
                            </div><br>

                            <div class="button button_color_2 text-center trans_200" style="border-radius:5px;">
                                <a onClick='document.getElementById("pago").style.display = "none";document.getElementById("buscar").style.display = "none";document.getElementById("cuota").style.display = "block";'  style="Color:white;">CUOTAS</a>
                            </div><br>

                            <div class="button button_color_2 text-center trans_200" style="border-radius:5px;">
                                <a onClick='document.getElementById("pago").style.display = "block";document.getElementById("buscar").style.display = "none";document.getElementById("cuota").style.display = "none";'  style="Color:white;">PAGOS</a>
                            </div>          
                        </div>
            
            
		

        <div class="col-lg-6" id="buscar" style="display: none;">
            
            <!-- Formulario de consultar datos de abogados -->

            <div class="search_section d-flex flex-column align-items-center justify-content-center">
                <div class="search_background" style="background-image:url(images/search_background.jpg);"></div>
                <div class="search_content text-center">
                    <h1 class="titulo-tabla">ABOGADO</h1>

                    <form id="search_form" class="search_form"  action="consultar" method="post">

                        <input id="search_form_name" class="input_field search_form_name" type="text" name="cedula" placeholder="Ingrese Cedula de Identidad" required="required" data-error="Course name is required.">

                        <input type="hidden" name="directory" value="admin">
                        <input type="hidden" name="file" value="index">
                       
                        <!--<input id="search_form_category" class="input_field search_form_category" type="text" placeholder="Category">
                        <input id="search_form_degree" class="input_field search_form_degree" type="text" placeholder="Degree">-->
                        

                        <button id="search_submit_button" type="submit" class="search_submit_button trans_200" value="Submit">BUSCAR</button>
                        <br>

                        <a onClick="document.getElementById('buscar').style.display = 'none';" style="Color:red; cursor:pointer;">Cerrar Formulario</a>
                    </form>
                </div> 
            </div>

        </div>

        <div class="col-lg-6" id="cuota" style="display: none;">
            
            <!-- Formulario de CUOTAS datos de abogados -->

            <div class="search_section d-flex flex-column align-items-center justify-content-center">
                <div class="search_background" style="background-image:url(images/search_background.jpg);"></div>
                <div class="search_content text-center">
                    <h1 class="titulo-tabla">CONSULTA LAS CUOTAS</h1>

                    <form id="search_form" class="search_form"  action="cuotas" method="post">

                        <input id="search_form_name" class="input_field search_form_name" type="text" name="cedula" placeholder="Ingrese Cedula de Identidad" required="required" data-error="Course name is required.">

                         <select class="form-control" name="year">
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                        </select>

                        <input type="hidden" name="directory" value="admin">
                        <input type="hidden" name="file" value="index">
                       
                        <!--<input id="search_form_category" class="input_field search_form_category" type="text" placeholder="Category">
                        <input id="search_form_degree" class="input_field search_form_degree" type="text" placeholder="Degree">-->
                        

                        <button id="search_submit_button" type="submit" class="search_submit_button trans_200" value="Submit">CONSULTAR</button>
                        <br>

                        <a onClick="document.getElementById('cuota').style.display = 'none';" style="Color:red; cursor:pointer;">Cerrar Formulario</a>
                    </form>
                </div> 
            </div>
        </div>

        <div class="col-lg-6" id="pago" style="display: none;">
            
            <!-- Formulario de COLSULTA DE PAGO DEL ABOGADO -->

            <div class="search_section d-flex flex-column align-items-center justify-content-center">
                <div class="search_background" style="background-image:url(images/search_background.jpg);"></div>
                <div class="search_content text-center">
                    <h1 class="titulo-tabla">CONSULTAR PAGOS</h1>

                    <form id="search_form" class="search_form"  action="pagos" method="post">

                        <input id="search_form_name" class="input_field search_form_name" type="text" name="cedula" placeholder="Ingrese Cedula de Identidad" required="required" data-error="Course name is required.">

                       
                       
                                    <!--UBICACIÓN-->
                                    <input type="hidden" name="directory" value="admin">
                                    <input type="hidden" name="file" value="index">
                        

                        <button id="search_submit_button" type="submit" class="search_submit_button trans_200" value="Submit">CONSULTAR</button>
                        <br>

                        <a onClick="document.getElementById('pago').style.display = 'none';" style="Color:red; cursor:pointer;">Cerrar Formulario</a>
                    </form>
                </div> 
            </div>
        </div>

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
    
    <?php       
        //accion de ocultar/mostrar tabla de datos
            if (isset($variables['tabla'])) {
               if ($variables['tabla'] == 'tablaCuota') {
                    $accion1 = 'none';    
                    $accion2 = 'block';
                    $accion3 = 'none';
                    
               }
               elseif($variables['tabla'] == 'tablaAbogado') 
               {
                    $accion1 = 'block';
                    $accion2 = 'none';
                    $accion3 = 'none';
               } 
               elseif($variables['tabla'] == 'tablaPago') 
               {
                    $accion1 = 'none';
                    $accion2 = 'none';
                    $accion3 = 'block';
               }
               else
               {
                    $accion1 = 'none';
                    $accion2 = 'none';
                    $accion3 = 'none'; 
               } 
            }
            else {
                $accion1 = 'none';
                $accion2 = 'none';
                $accion3 = 'none';
            }
            
        ?>
        <!--++++++++++++++++++++++++++
            TABLA DE DATOS DEL ABOGADO
            +++++++++++++++++++++++++++-->

        <div class="col-lg-10 table-responsive" id="buscar1" style="display:<?= $accion1;?>;">
            <table class="table">
                <thead class="titulo-tabla">
                    <tr>
                        <td colspan="8">DATOS PERSONALES</td>
                        <td align="right">
                            <a onClick='document.getElementById("buscar1").style.display = "none"' style="cursor: pointer; ">
                                <span class="fas fa-times"></span>
                            </a>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="subtitulo-tabla">
                        <td>NOMBRES</td>
                        <td>APELLIDOS</td>
                        <td>CÉDULA</td>
                        <td>EDAD</td>
                        <td>NACIONALIDAD</td>
                        <td>FECHA DE NACIMIENTO</td>
                        <td>LUGAR DE NACIMIENTO</td>
                        <td>ESTADO CIVIL</td>
                        <td>TELEFONO</td>
                    </tr>
                    <tr class="text-datos">
                        <td><?= utf8_decode($variables['nombres']);?></td>
                        <td><?= utf8_decode($variables['apellidos']);?></td>
                        <td><?= $variables['cedula'];?></td>
                        <td><?= $variables['edad'];?></td>
                        <td><?= $variables['nacionalidad'];?></td>
                        <td><?= $variables['fecha_nacimiento'];?></td>
                        <td><?= utf8_decode($variables['lugar_nacimiento']);?></td>
                        <td><?= $variables['estado_civil'];?></td>
                        <td><?= $variables['telefono'];?></td>
                    </tr>
                </tbody>

                <thead class="titulo-tabla">
                    <tr>
                        <td colspan="9">DATOS GREMIALES</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="subtitulo-tabla">
                        <td>N° COLEGIO</td>
                        <td>TOMO</td>
                        <td>FOLIO</td>
                        <td>FECHA</td>
                        <td>N° IMPRE</td>
                        <td colspan="4">UNIVERSIDAD</td>
                    </tr>
                    <tr class="text-datos">
                        <td><?= $variables['n_colegio'];?></td>
                        <td><?= $variables['tomo'];?></td>
                        <td><?= $variables['folio'];?></td>
                        <td><?= $variables['fecha'];?></td>
                        <td><?= $variables['n_impre'];?></td>
                        <td colspan="3"><?= utf8_encode($variables['universidad']);?></td>
                    </tr>
                </tbody>

                 <thead class="titulo-tabla">
                    <tr>
                        <td colspan="9">DIRECCION DE DOMICILIO</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-datos">
                        <td colspan="9"><?= utf8_decode($variables['direccion']);?></td>
                    </tr>
                </tbody>

                 <thead class="titulo-tabla">
                    <tr>
                        <td colspan="9">DATOS LABORALES</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="subtitulo-tabla">
                        <td colspan="6">DIRECCIÓN OFICINA / EMPRESA O INSTITUTO</td>
                        <td colspan="3">TELEFONO</td>
                    </tr>
                    <tr class="text-datos">
                        <td colspan="6"><?= utf8_decode($variables['direccion_laboral']);?></td>
                        <td colspan="3"><?= $variables['telefono_laboral'];?></td>
                    </tr>
                </tbody>

                 <thead class="titulo-tabla">
                    <tr>
                        <td colspan="9">REDES SOCIALES</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="subtitulo-tabla">
                        <td colspan="2">FACEBOOK</td>
                        <td colspan="2">INSTAGRAM</td>
                        <td colspan="2">TWITTER</td>
                        <td colspan="3">CORREO</td>
                    </tr>
                    <tr class="text-datos">
                        <?php
                            $redes = explode("/", $variables['redes_sociales']);
                         // si no posee imprimirá NO APLICA POR DEFECTO  
                        ?>
                        
                        <td colspan="2"><?= utf8_decode($redes[0]);?></td>
                        <td colspan="2"><?= utf8_decode($redes[1]);?></td>
                        <td colspan="2"><?= utf8_decode($redes[2]);?></td>
                        <td colspan="3"><?= utf8_decode($variables['email']);?></td>
                    </tr>
                </tbody>

                <thead class="titulo-tabla">
                    <tr>
                        <td colspan="9">DATOS FAMILIARES</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="subtitulo-tabla">
                        <td colspan="3">NOMBRES</td>
                        <td colspan="2">APELLIDOS</td>
                        <td colspan="2">PARENTESCO</td>
                        <td colspan="2">TELEFONO</td>
                    </tr>
                        <?php
                            $f = count($variables['familiares']);
                            if ($f == '') {
                                echo "<tr align='center' class='text-alerta'><td colspan='8'>NO TIENE CARGA FAMILIAR</td></tr>";
                             }
                            for ($i=0; $i < $f ; $i++):
                                $familia = $variables['familiares'][$i];
                        ?>
                    <tr class="text-datos">
                        <td colspan="3"><?= utf8_decode($familia['nombre']);?></td>
                        <td colspan="2"><?= utf8_decode($familia['apellido']);?></td>
                        <td colspan="2"><?= utf8_decode($familia['parentesco']);?></td>
                        <td colspan="2"><?= utf8_decode($familia['telefono']);?></td>
                    </tr>
                        <?php      
                            endfor;
                        ?>
                </tbody>

                 <thead class="titulo-tabla">
                    <tr>
                        <td colspan="9">INFORMACIÓN ADICIONAL</td>
                    </tr>
                </thead>
                <Tbody>
                    <tr class="text-datos">
                    <td colspan="9"><?= utf8_decode($variables['info_adicional']);?></td>
                    </tr>
                </Tbody>
            </table>    
        </div>

        <!--++++++++++++++++++++++++++
            TABLA DE CUOTAS DEL ABOGADO
            +++++++++++++++++++++++++++-->

        <div class="col-lg-6 table-responsive" id="tablaCuota" style="display:<?= $accion2;?>;">
            <table class="table">
                <thead>
                    <tr class="titulo-tabla">
                        <td colspan="5">ESTADOS DE CUOTAS - <?= utf8_decode($variables['nombres'].' '. $variables['apellidos'])?></td>
                            <td align="right">
                                <a onClick='document.getElementById("tablaCuota").style.display = "none"' style="cursor: pointer; ">
                                <span class="fas fa-times"></span>
                                </a>
                            </td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="subtitulo-tabla">
                        <td>AÑO</td>
                        <td>MES</td>
                        <td>CUOTA</td>
                        <td>TIPO</td>
                        <td>ESTADO</td>
                        <td></td>
                    </tr>
                    <?php
                            $f = count($variables['cuotas']);
                            if ($f == '') {
                                echo "<tr align='center' class='text-alerta'><td colspan='8'>NO TIENE CUOTAS CARGA AL SISTEMA</td></tr>";
                             }
                            for ($i=0; $i < $f ; $i++):
                                $cuota = $variables['cuotas'][$i];
                        ?>
                    <tr class="text-datos">
                         <td><?= utf8_decode($cuota['year']);?></td>
                        <td><?= utf8_decode($cuota['mes']);?></td>
                        <td><?= utf8_decode($cuota['cuota']);?></td>
                        <td>
                            <?php
                                if ($cuota['tipo_cuota'] == 1) {
                                    echo 'ORDINARIA';
                                }else {
                                    echo 'EXTRAORDINARIA';
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                if ($cuota['estado_cuota'] == 1) {
                                    echo 'SOLVENTE';
                                }elseif($cuota['estado_cuota'] == 2) {
                                    echo 'POR CONFIRMAR';
                                }else{
                                    echo 'PENDIENTE';
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                if ($cuota['estado_cuota'] == 0):
                            ?>
                                 <a  class="btn btn-danger buttom" onClick='document.getElementById("procesar").style.display = "block"; document.getElementById("input").value = "<?= $cuota['id'];?>";' style="cursor:pointer; color:#fff;">PROCESAR</a>
                            <?php
                                endif;
                            ?>
                            <?php
                                if ($cuota['estado_cuota'] == 2):
                            ?>
                                <form action="pagar" method="get">
                                    <input type="hidden" name="id_cuota" value="<?= $cuota['id']; ?>">
                                    <input type="hidden" name="id_usuario" value="<?= $variables['id']; ?>">

                                    <!--UBICACIÓN-->
                                    <input type="hidden" name="directory" value="admin">
                                    <input type="hidden" name="file" value="index">

                                    <button class="btn btn-warning buttom">CONFIRMAR</button>
                                </form>
                            <?php
                                endif;
                            ?>
                            
                        </td>
                    </tr>
                        <?php      
                            endfor;
                        ?>
                </tbody>
            </table>
        </div>
                 
        <!--++++++++++++++++++++++++++
            TABLA DE PAGOS DEL ABOGADO
            +++++++++++++++++++++++++++-->
        <div class="col-lg-8 table-responsive" id="pagoT" style="display:<?= $accion3?>;">
            <table class="table">
            <thead class="titulo-tabla">
                    <tr>
                        <td colspan="7">PAGOS DE <?= $variables['nombres']?> <span id="mes"></span></td>
                            <td align="right">
                                <a onClick='document.getElementById("pagoT").style.display = "none"' style="cursor: pointer; ">
                                <span class="fas fa-times"></span>
                                </a>
                            </td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="subtitulo-tabla">
                        <td colspan="2">BANCO DESTINO</td>
                        <td colspan="2">N° REFERENCIA</td>
                        <td colspan="2">FECHA</td>
                        <td colspan="2">MONTO</td>
                    </tr>
                        <?php
                            $f = count($variables['pagos']);
                            if ($f == '') {
                                echo "<tr align='center' class='text-alerta'><td colspan='8'>NO TIENE CARGA FAMILIAR</td></tr>";
                             }
                            for ($i=0; $i < $f ; $i++):
                                $pago = $variables['pagos'][$i];
                        ?>
                    <tr class="text-datos">
                        <td colspan="2"><?= utf8_encode($pago['banco']);?></td>
                        <td colspan="2"><?= utf8_encode($pago['numero_referencia']);?></td>
                        <td colspan="2"><?= utf8_encode($pago['fecha']);?></td>
                        <td colspan="2"><?= utf8_encode($pago['monto']);?></td>
                    </tr>
                        <?php      
                            endfor;
                        ?>
                </tbody>
            </table>
        </div>
          <!--++++++++++++++++++++++++++++++++++++
            FORMULARIO DE PROCESAMIENTO DE PAGOS
            +++++++++++++++++++++++++++++++++++++-->
        <div class="col-lg-3" style="display:none;" id="procesar" align="center">
                        
                        
            <form action="pagar" method="post" class="form-control">
                        <div align="right">    
                            <a onClick='document.getElementById("procesar").style.display = "none"' style="cursor: pointer; ">
                                <span class="fas fa-times"></span>
                            </a>
                        </div>
                <input type="hidden" name="directory" value="admin">
                <input type="hidden" name="file" value="index">

                <label for="procesarPago" >INFORME PAGO</label>
                <input class="form-control" type="text" name="nombre" value="<?= $variables['nombres']?>"><br>
                <input type="hidden" name="cedula" value="<?= $variables['cedula']?>">
                <input class="form-control" type="text" name="banco" placeholder="BANCO DESTINO"><br>
                <input class="form-control" type="number" name="numero_referencia" placeholder="NUMERO DE REFERENCIA"><br>
                <input class="form-control" type="date" name="fecha" placeholder="FECHA"><br>
                <input class="form-control" type="number" name="monto" placeholder="MONTO DEPOSITADO"><br>
                <input type="hidden" name="id_cuota" value="" id="input">
                <button class="btn btn-danger button">PROCESAR PAGO</button>
            </form>
        </div>
    </div>
</div>
</div>

    
<div class="col-lg-12" style="height: 200px;">

</div>


<?php
require_once DIRECCION_APP . 'views/admin/parcial/footer.view.php';
?>

