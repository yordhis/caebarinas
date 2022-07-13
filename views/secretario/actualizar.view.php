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
                    <h1>ACCIÓN DE ACTUALIZAR</h1>
            </div>


  					<!--BOTONES DE ACCIONES DEL SISTEMA-->
                        <div class="col-lg-2" > 
                            
                        	<div class="button btn-danger text-center trans_200" style="border-radius:5px;"><a href="cerrar" style="Color:white;">
                                SALIR</a> 
                            </div><br>

                            <div class="button button_color_2 text-center trans_200" style="border-radius:5px;"><a onClick='document.getElementById("formAbogado").style.display = "block";document.getElementById("formFamiliar").style.display = "none";document.getElementById("formCuota").style.display = "none";' style="Color:white;">
                                ABOGADOS</a> 
                            </div><br>

                            <div class="button button_color_2 text-center trans_200" style="border-radius:5px;">
                                <a onClick='document.getElementById("formAbogado").style.display = "none";document.getElementById("formFamiliar").style.display = "block";document.getElementById("formCuota").style.display = "none";'  style="Color:white;">FAMILIARES</a>
                            </div><br>

                            <div class="button button_color_2 text-center trans_200" style="border-radius:5px;">
                                <a onClick='document.getElementById("formAbogado").style.display = "none";document.getElementById("formFamiliar").style.display = "none";document.getElementById("formCuota").style.display = "block";'  style="Color:white;">CUOTAS</a>
                            </div>          
                        </div>
                  

         <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++ 
         	FORMULARIO DE CONSULTA DE DATOS DE ABOGADO PARA ACTUALIZAR
         	++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <div class="col-lg-6" id="formAbogado" style="display: none;">
            
            <div class="search_section d-flex flex-column align-items-center justify-content-center">
                <div class="search_background" style="background-image:url(images/search_background.jpg);"></div>
                <div class="search_content text-center">
                    <h1 class="titulo-tabla">ACTUALIZAR ABOGADO</h1>

                    <form id="search_form" class="search_form"  action="consultar" method="post">

                        <input id="search_form_name" class="input_field search_form_name" type="text" name="cedula" placeholder="Ingrese Cedula de Identidad" required="required" data-error="Este campo es obligatorio.">

                        <input type="hidden" name="directory" value="secretario">
                        <input type="hidden" name="file" value="actualizar">
                       
                        <!--<input id="search_form_category" class="input_field search_form_category" type="text" placeholder="Category">
                        <input id="search_form_degree" class="input_field search_form_degree" type="text" placeholder="Degree">-->
                        

                        <button id="search_submit_button" type="submit" class="search_submit_button trans_200" value="Submit">BUSCAR</button>
                        <br>

                        <a onClick="document.getElementById('formAbogado').style.display = 'none';" style="Color:red; cursor:pointer;">Cerrar Formulario</a>
                    </form>
                </div> 
            </div>

        </div>

        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
         	FORMULARIO DE CONSULTA LOS DATOS DE FAMILIARES DEL ABOGADO +         	++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <div class="col-lg-6" id="formFamiliar" style="display: none;">
            
            <div class="search_section d-flex flex-column align-items-center justify-content-center">
                <div class="search_background" style="background-image:url(images/search_background.jpg);"></div>
                <div class="search_content text-center">
                    <h1 class="titulo-tabla">ACTUALIZAR CARGA FAMILIAR</h1>

                    <form id="search_form" class="search_form"  action="consultarFamiliares" method="post">

                        <input id="search_form_name" class="input_field search_form_name" type="text" name="cedula" placeholder="Ingrese Cedula de Identidad" required="required" data-error="Course name is required.">

                       
                       <input type="hidden" name="directory" value="secretario">
                        <input type="hidden" name="file" value="actualizar">
                       
                        <!--<input id="search_form_category" class="input_field search_form_category" type="text" placeholder="Category">
                        <input id="search_form_degree" class="input_field search_form_degree" type="text" placeholder="Degree">-->
                        

                        <button id="search_submit_button" type="submit" class="search_submit_button trans_200" value="Submit">BUSCAR</button>
                        <br>

                        <a onClick="document.getElementById('formFamiliar').style.display = 'none';" style="Color:red; cursor:pointer;">Cerrar Formulario</a>
                    </form>
                </div> 
            </div>

        </div>

        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++ 
         	FORMULARIO DE CONSULTA DE CUOTAS PARA ACTUALIZAR
         	++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <div class="col-lg-6" id="formCuota" style="display: none;">
            
            <div class="search_section d-flex flex-column align-items-center justify-content-center">
                <div class="search_background" style="background-image:url(images/search_background.jpg);"></div>
                <div class="search_content text-center">
                    <h1 class="titulo-tabla">ACTUALIZAR CUOTA DEL ABOGADO</h1>

                    <form id="search_form" class="search_form"  action="cuotas" method="post">

                        <input id="search_form_name" class="input_field search_form_name" type="text" name="cedula" placeholder="Ingrese Cedula de Identidad" required="required" data-error="Course name is required.">

                        <input type="hidden" name="directory" value="secretario">
                        <input type="hidden" name="file" value="actualizar">
                       
                        <select class="form-control" name="year">
                        	<option value="2019">2019</option>
                        	<option value="2020">2020</option>
                        	<option value="2021">2021</option>
                        	<option value="2022">2022</option>
                        	<option value="2023">2023</option>
                        	<option value="2024">2024</option>
                        	<option value="2025">2025</option>
                        </select>
                        <!--<input id="search_form_degree" class="input_field search_form_degree" type="text" placeholder="Degree">-->
                        

                        <button id="search_submit_button" type="submit" class="search_submit_button trans_200" value="Submit">BUSCAR</button>
                        <br>

                        <a onClick="document.getElementById('formCuota').style.display = 'none';" style="Color:red; cursor:pointer;">Cerrar Formulario</a>
                    </form>
                </div> 
            </div>

        </div>

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
               elseif($variables['tabla'] == 'tablaFamiliares') 
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


        <!--+++++++++++++++++++++++++++++++++++
            FORMULARIOA DE ACTUALIZACIÓN DE DATOS DE ABOGADO
            +++++++++++++++++++++++++++++++++++-->

        <div class="col-lg-10 table-responsive" id="actualizar" style="display:<?= $accion1;?>;">
            <form action="actualizar" method="post">
                <!--ubicación-->
                        <input type="hidden" name="directory" value="secretario">
                        <input type="hidden" name="file" value="actualizar">

            <table class="table">
            <thead class="titulo-tabla">
                    <tr>
                        <td colspan="7">ACTUALIZACIÓN DE DATOS</td>
                        <td align="right">
                            <a onClick='document.getElementById("actualizar").style.display = "none"' style="cursor: pointer; ">
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
                            <input type="text" name="usuario" value="<?= utf8_decode($variables['usuario']);?>" placeholder="USUARIO" class="form-control">
                        </td >
                        <td colspan="4">
                            <input type="password" name="clave" value="<?= $variables['clave'];?>" placeholder="CONTRASEÑA" class="form-control">    
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
                            <input type="text" name="nombres" value="<?= utf8_decode($variables['nombres']);?>" placeholder="NOMBRES" class="form-control">
                        </td >
                        <td colspan="2">
                            <input type="text" name="apellidos" value="<?= utf8_decode($variables['apellidos']);?>" placeholder="APELLIDOS" class="form-control">    
                        </td>
                        <td colspan="2">
                            <input type="text" name="cedula" value="<?= $variables['cedula'];?>" placeholder="CEDULA" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="edad" value="<?= $variables['edad'];?>" placeholder="EDAD" class="form-control">
                        </td>
                        <td colspan="2">
                            <input type="text" name="nacionalidad" value="<?= $variables['nacionalidad'];?>" placeholder="NACIONALIDAD" class="form-control">
                        </td>
                    </tr>
                    <tr class="subtitulo-tabla">
                        <td colspan="2">FECHA DE NACIMIENTO</td>
                        <td colspan="2">LUGAR DE NACIMIENTO</td>
                        <td colspan="2">ESTADO CIVIL</td>
                        <td colspan="2">TELEFONO</td>
                    </tr>

                    <tr>
                    	<?php
                    		// ACOMODANDO FECHA DE NACIMIENTO
                    		$fecha_n = explode('-', $variables['fecha_nacimiento'])

                    	?>
                        <td colspan="2">
                            <input type="date" name="fecha_nacimiento" value="<?= $fecha_n[0] .'-'. $fecha_n[1] .'-' . $fecha_n[2] ;?>" placeholder="FECHA NACIMIENTO" class="form-control">
                        </td>
                        <td colspan="2">
                            <input type="text" name="lugar_nacimiento" value="<?= utf8_decode($variables['lugar_nacimiento']);?>" placeholder="NACIÓ" class="form-control">
                        </td>
                        <td colspan="2">

                        	<select name="estado_civil" class="form-control">
                        		<option value="<?= $variables['estado_civil'];?>"><?= $variables['estado_civil'];?></option>
                        		<option value="SOLTERO">SOLTERO</option>
                        		<option value="CASADO">CASADO</option>
                        	</select>
                           
                        </td>
                        <td colspan="2">
                            <input type="text" name="telefono" value="<?= $variables['telefono'];?>" placeholder="TELEFONO" class="form-control">
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
                            <input type="text" name="n_colegio" value="<?= $variables['n_colegio'];?>" placeholder="NUMERO" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="tomo" value="<?= $variables['tomo'];?>" placeholder="TOMO" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="folio" value="<?= $variables['folio'];?>" placeholder="FOLIO" class="form-control">
                        </td>
                        <td>
                        	<?php
                    		// ACOMODANDO FECHA DE NACIMIENTO
                    		$fecha_g = explode('-', $variables['fecha'])

                    	?>
                            <input type="date" name="fecha" value="<?= $fecha_g[0] .'-'. $fecha_g[1] .'-' . $fecha_g[2] ;?>" placeholder="FECHA" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="n_impre" value="<?= $variables['n_impre'];?>" placeholder="Impre" class="form-control">
                        </td>
                        <td colspan="3">
                            <input type="text" name="universidad" value="<?= utf8_decode($variables['universidad']);?>" placeholder="UNIVERSIDAD" class="form-control">
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
                            <input type="text" name="direccion" value="<?= utf8_decode($variables['direccion']);?>" placeholder="DIRECCIÓN" class="form-control">
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
                            <input type="text" name="direccion_laboral" value="<?= utf8_decode($variables['direccion_laboral']);?>" placeholder="DIRECCIÓN" class="form-control">
                        </td>
                        <td colspan="2">
                            <input type="text" name="telefono_laboral" value="<?= $variables['telefono_laboral'];?>" placeholder="TELEFONO" class="form-control">
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

                    	<?php
                    		$redes = explode('/', $variables['redes_sociales']);
                    	?>
                        
                        <td colspan="2">
                            <input type="text" name="facebook" value="<?= utf8_decode($redes[0]);?>" placeholder="FACEBOOK" class="form-control">
                        </td>
                        <td colspan="2">
                            <input type="text" name="instagram" value="<?= utf8_decode($redes[1]);?>" placeholder="INSTAGRAM" class="form-control">
                        </td>
                        <td colspan="2">
                            <input type="text" name="twitter" value="<?= utf8_decode($redes[2]);?>" placeholder="TWITTER" class="form-control">
                        </td>
                        <td colspan="2">
                            <input type="email" name="email" value="<?= utf8_decode($variables['email']);?>" placeholder="E-MAIL" class="form-control">
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
                            <input type="text" name="info_adicional" value="<?= utf8_decode($variables['info_adicional']);?>" placeholder="COMPLEMENTA TU INFORMACIÓN" class="form-control">

                            <input type="hidden" name="id" value="<?=$variables['id'];?>">
                        </td>
                    </tr>
                </Tbody>
                <tfoot>
                    <tr>
                        <td colspan="8">
                            <button class="btn btn-lg btn-success buttom" align="center">ACTUALIZAR</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
            </form>    
        </div>

        <!--++++++++++++++++++++++++++++++++++++++++++++
                FORMULARIO DE ACTUALIACION DE FAMILIARES
                ++++++++++++++++++++++++++++++++++´++++++-->


         <div class="col-lg-9 table-responsive" style="display:<?= $accion3;?>;" id="familia">
              

            <form action="actualizarFamiliares" method="post">
                        <input type="hidden" name="directory" value="secretario">
                        <input type="hidden" name="file" value="actualizar">

                <table class="table">
                    <thead class="titulo-tabla">
                    <tr>
                        <td colspan="6">CARGA FAMILIAR DE <?= utf8_decode($variables['nombres']).' '. utf8_decode($variables['apellidos'])?></td>
                        <td align="right">
                            <a onClick='document.getElementById("familia").style.display = "none"' style="cursor: pointer; ">
                                <span class="fas fa-times"></span>
                            </a>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="subtitulo-tabla">
                        <td colspan="2">NOMBRES</td>
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
                        <td colspan="2">
                        	<!--ID DEL FAMILIAR-->
                        	<input type="hidden" name="id_fam<?=$i+1?>" value="<?= $familia['id'];?>" >

                        	<input type="text" class="form-control" name="nombre_fam<?=$i+1?>" value="<?= utf8_decode($familia['nombre']);?>">
                        		
                        </td>
                        <td colspan="2">
                        	<input type="text" class="form-control" name="apellido_fam<?=$i+1?>" value="<?= utf8_decode($familia['apellido']);?>">
                        </td>
                        <td colspan="2">
                        	<input type="text" class="form-control" name="parentesco_fam<?=$i+1?>" value="<?= utf8_decode($familia['parentesco']);?>">
                        </td>
                        <td colspan="2">
                        	<input type="text" class="form-control" name="telefono_fam<?=$i+1?>" value="<?= utf8_decode($familia['telefono']);?>">
                        </td>
                    </tr>
                        <?php      
                            endfor;
                        ?>
                </tbody>

               <tfoot>
                    <tr>
                        <td colspan="8">
                            <button class="btn btn-lg btn-success buttom" align="center">ACTUALIZAR</button>
                        </td>
                    </tr>
                </tfoot>
                </table>
            </form>
        </div>


        <!--++++++++++++++++++++++++++
            TABLA DE CUOTAS DEL ABOGADO
            +++++++++++++++++++++++++++-->

        <div class="col-lg-8 table-responsive" id="tablaCuota" style="display:<?= $accion2 ?>;">
            <table class="table">
            	<form action="actualizarCuota" method="post">
                    <!--ubicacion-->
                        <input type="hidden" name="directory" value="secretario">
                        <input type="hidden" name="file" value="actualizar">
	                <thead>
	                    <tr class="titulo-tabla">
	                        <td colspan="10">ACTULIZAR CUOTAS - <?= utf8_decode($variables['nombres'].' '. $variables['apellidos'])?></td>
                            <td align="right">
                            <a onClick='document.getElementById("tablaCuota").style.display = "none"' style="cursor: pointer; ">
                                <span class="fas fa-times"></span>
                            </a>
                        </td>

	                    </tr>
	                </thead>
	                <tbody>
	                    <tr class="subtitulo-tabla">
	                    	<td>N°</td>
	                        <td colspan=2>AÑO</td>
	                        <td colspan="2">MES</td><td></td><td></td>
	                        <td colspan="3">CUOTA</td>
	                        <td colspan="2">TIPO</td>
	                        
	                        
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

	                    	<!--ID DE LA CUOTA-->
                        	<input type="hidden" name="id<?=$i+1?>" value="<?= $cuota['id'];?>" >

	                    	 <td class="h3"><?=$i+1?></td>
	                         <td colspan="2">
	                         	<input type="text" class="form-control" name="year<?= $i+1?>" value="<?=$cuota['year']?>" >
	                         </td>
	                        <td colspan="4">
	                        	<select class="form-control" name="mes<?=$i+1?>" >
		                        	<option value="<?=$cuota['mes']?>"><?=$cuota['mes']?></option>
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
	                        <td colspan="3">
	                        	<input type="text" class="form-control" name="cuota<?= $i+1?>" value="<?=$cuota['cuota']?>" >
	                        </td>
	                        <td colspan="4">
	                        	<?php
	                        		if ($cuota['tipo_cuota'] == 1) 
	                        		{
	                        			$tipo = "ORDINARIA";
	                        		} 
	                        		elseif($cuota['tipo_cuota'] == 2) 
	                        		{
	                        			$tipo = "EXTRAORDINARIA";
	                        		}
	                        		else
	                        		{
	                        			$tipo = ' ';
	                        		}

	                        		
	                        	?>
	                            <select class="form-control" name="tipo_cuota<?=$i+1?>" >
	                            		<option value="<?=$cuota['tipo_cuota']?>" selected="true"><?=$tipo?></option>
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
	                		<td colspan="10">
	                			<button class="btn btn-success buttom">Guardar</button>  
	                		</td>
	                	</tr>
	                	        
	                </tfoot>
	            </form>
            </table>
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