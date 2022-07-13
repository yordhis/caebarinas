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
            <h1>ACCIÓN DE LISTA</h1>
        </div>


  					<!--BOTONES DE ACCIONES DEL SISTEMA-->
                        <div class="col-lg-2" > 
                            
                        	<div class="button btn-danger text-center trans_200" style="border-radius:5px;"><a href="cerrar" style="Color:white;">
                                SALIR</a> 
                            </div><br>

                            <div class="button button_color_2 text-center trans_200" style="border-radius:5px;"><a onClick='document.getElementById("formAbogado").style.display = "block";document.getElementById("formFamiliar").style.display = "none";document.getElementById("formCuota").style.display = "none";' style="Color:white;">
                                ABOGADOS</a> 
                            </div><br>

                        
    
                        </div>
        <!--+++++++++++++++++++++++++++++++++++
                LISTA DE ABOGADOS
            +++++++++++++++++++++++++++++++++++-->

        <div class="col-lg-10 table-responsive" id="formAbogado" style="display:none;">
           
            	
            
	            <table class="table">
	            
	                <thead class="titulo-tabla">
	                    <tr>
	                        <td colspan="8">LISTA DE ABOGADOS</td>
                            <td align="right">
                                <a onClick='document.getElementById("formAbogado").style.display = "none"' style="cursor: pointer; ">
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
                            <td colspan="2">EMAIL</td>
	                       
	                        
	                    </tr>

                        <?php 
                            
                            $i = 0;
                            foreach ($variables as $variable):
                               $i++;

                        ?>
	                    <tr class="text-datos">
	                        <td colspan="2">
	                           <?= utf8_decode($variable['nombres']);?>
	                        </td >
	                        <td colspan="2">
	                           <?= utf8_decode($variable['apellidos']);?>
	                        </td>
	                        <td colspan="2">
	                           <?= $variable['cedula'];?>
	                        </td>
	                        <td colspan="2">
	                           <?= $variable['telefono'];?>
	                        </td>
                            <td colspan="2">
                               <?= utf8_decode($variable['email']);?>
                            </td>
	                       
	                    </tr>

                        <?php
                            endforeach;
                        ?>
	                </Tbody>
	                <tfoot>
	                    <tr>
	                       <td>TOTAL DE ABOGADOS:</td> 
                           <td><?= $i ?></td>
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
require_once DIRECCION_APP . 'views/admin/parcial/footer.view.php';
?>