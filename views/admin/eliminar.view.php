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
        <!--Avisa donde estan en la navegación-->
        <div class="col-lg-12 col-xs-12" align="center">
            <h1>ACCIÓN DE ELIMINAR</h1>
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
                    <h1 class="titulo-tabla">ELIMINAR ABOGADO</h1>

                    <form id="search_form" class="search_form"  action="consultar" method="post">

                        <input id="search_form_name" class="input_field search_form_name" type="text" name="cedula" placeholder="Ingrese Cedula de Identidad" required="required" data-error="Este campo es obligatorio.">

                        <input type="hidden" name="directory" value="admin">
                        <input type="hidden" name="file" value="eliminar">
                       
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
                    <h1 class="titulo-tabla">ELIMINAR CARGA FAMILIAR</h1>

                    <form id="search_form" class="search_form"  action="consultarFamiliares" method="post">

                        <input id="search_form_name" class="input_field search_form_name" type="text" name="cedula" placeholder="Ingrese Cedula de Identidad" required="required" data-error="Course name is required.">

                       <input type="hidden" name="directory" value="admin">
                        <input type="hidden" name="file" value="eliminar">
                       
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
                    <h1 class="titulo-tabla">ELIMINAR CUOTA DEL ABOGADO</h1>

                    <form id="search_form" class="search_form"  action="cuotas" method="post">

                        <input id="search_form_name" class="input_field search_form_name" type="text" name="cedula" placeholder="Ingrese Cedula de Identidad" required="required" data-error="Course name is required.">

                        <input type="hidden" name="directory" value="admin">
                        <input type="hidden" name="file" value="eliminar">
                       
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
            ACCION DE ELIMINAR ABOGADO
            +++++++++++++++++++++++++++++++++++-->

        <div class="col-lg-10 table-responsive" id="eliminar" style="display:<?= $accion1;?>;">
            <form action="eliminar" method="post">
            	<!--ID DEL USUARIO A ELIMINAR-->
            	<input type="hidden" name="id" value="<?=$variables['id'];?>">
            	<input type="hidden" name="base" value="usuarios">
            
	            <table class="table">
	            
	                <thead class="titulo-tabla">
	                    <tr>
	                        <td colspan="6">DATOS A ELIMINAR</td>
                            <td align="right">
                                <a onClick='document.getElementById("eliminar").style.display = "none"' style="cursor: pointer; ">
                                <span class="fas fa-times"></span>
                                </a>
                            </td>
	                    </tr>
	                </thead>
	                <tbody>
	                    <tr class="subtitulo-tabla">
	                        <td colspan="2">NOMBRES</td>
	                        <td colspan="2">APELLIDOS</td>
	                        <td colspan="2">CÉDULA</td>
	                        <td colspan="2">TELEFONO</td>
	                       
	                        
	                    </tr>
	                    <tr class="text-datos">
	                        <td colspan="2">
	                           <?= utf8_decode($variables['nombres']);?>
	                        </td >
	                        <td colspan="2">
	                           <?= utf8_decode($variables['apellidos']);?>
	                        </td>
	                        <td colspan="2">
	                           <?= $variables['cedula'];?>
	                        </td>
	                        <td colspan="2">
	                           <?= $variables['telefono'];?>
	                        </td>
	                       
	                    </tr>
	                </Tbody>
	                <tfoot>
	                    <tr>
	                        <td colspan="8">
	                            <button class="btn btn-lg btn-success buttom" align="center">ELIMINAR</button>
	                        </td>
	                    </tr>
	                </tfoot>
	            </table>
            </form>    
        </div>

        <!--++++++++++++++++++++++++++++++++++++++++++++
                FORMULARIO DE ACTUALIACION DE FAMILIARES
                ++++++++++++++++++++++++++++++++++´++++++-->


         <div class="col-lg-9 table-responsive" style="display:<?= $accion3;?>;" id="elifami">
              

           
                <table class="table">
                    <thead class="titulo-tabla">
                    <tr>
                        <td colspan="8">CARGA FAMILIAR DE <?= utf8_decode($variables['nombres']).' '. utf8_decode($variables['apellidos'])?>
                            
                        </td>
                        <td align="right">
                            <a onClick='document.getElementById("elifami").style.display = "none"' style="cursor: pointer; ">
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
                        <td>ACCIÓN</td>
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
                        	

                        	<?= utf8_decode($familia['nombre']);?>
                        		
                        </td>
                        <td colspan="2">
                        	<?= utf8_decode($familia['apellido']);?>
                        </td>
                        <td colspan="2">
                        	<?= utf8_decode($familia['parentesco']);?>
                        </td>
                        <td colspan="2">
                        	<?= utf8_decode($familia['telefono']);?>
                        </td>
                        <td colspan="">
                        	 <form action="eliminar" method="post">
                        	 	<!--ID DEL FAMILIAR-->
                        		<input type="hidden" name="id" value="<?= $familia['id'];?>" >
                        		<input type="hidden" name="base" value="datos_familiares">
                        		
                            	<button class="btn  btn-danger buttom" align="center">
                            		ELIMINAR
                            	</button>
                             </form>
                        </td>
                    </tr>
                        <?php      
                            endfor;
                        ?>
                </tbody>

              
                </table>
           
        </div>


        <!--++++++++++++++++++++++++++
            TABLA DE CUOTAS DEL ABOGADO
            +++++++++++++++++++++++++++-->

        <div class="col-lg-8 table-responsive" id="tablaCuota" style="display:<?= $accion2 ?>;">
            <table class="table">
            	
	                <thead>
	                    <tr class="titulo-tabla">
	                        <td colspan="11">ELIMINAR CUOTAS - <?= utf8_decode($variables['nombres'].' '. $variables['apellidos'])?>  
                            </td>
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

	                    	

	                    	 <td class="h6"><?=$i+1?></td>
	                         <td colspan="2">
	                         	<?=$cuota['year']?>
	                         </td>
	                        <td colspan="4">
	                        	<?= $cuota['mes'];?>
	                        </td>
	                        <td colspan="3">
	                        	<?=$cuota['cuota']?>
	                        </td>
	                        <td colspan="">
	                        	<?php
	                        		if ($cuota['tipo_cuota'] == 1) 
	                        		{
	                        			echo $tipo = "ORDINARIA";
	                        		} 
	                        		elseif($cuota['tipo_cuota'] == 2) 
	                        		{
	                        			echo $tipo = "EXTRAORDINARIA";
	                        		}
	                        		else
	                        		{
	                        			$tipo = ' ';
	                        		}                		
	                        	?>	                            
	                        </td>
	                        <td colspan="">
	                        	<form action="eliminar" method="post">
		                        	<!--ID DE LA CUOTA-->
		                        	<input type="hidden" name="id" value="<?= $cuota['id'];?>" >
		                        	<!--TABLA DONDE SE VA A ELIMINAR-->
		                        	<input type="hidden" name="base" value="cuotas" >

		                            <button class="btn  btn-danger buttom" align="center">
		                            	ELIMINAR
		                            </button>
	                             </form>
                        	</td>    
	                    </tr>
	                        <?php      
	                            endfor;
	                        ?>
	                </tbody>
	                
	           
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
require_once DIRECCION_APP . 'views/admin/parcial/footer.view.php';
?>