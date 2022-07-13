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
                    <h1>ACCIÓN DE PUBLICAR</h1>
            </div>


            <!--BOTONES DE ACCIONES DEL SISTEMA-->
                        <div class="col-lg-2"> 

                            <div class="button btn-danger text-center trans_200" style="border-radius:5px;"><a href="cerrar" style="Color:white;">
                                SALIR</a> 
                            </div><br>
                            
                            <div class="button button_color_2 text-center trans_200" style="border-radius:5px;"><a onClick=';document.getElementById("publicar").style.display = "block";document.getElementById("lista").style.display = "none";' style="Color:white;">
                                PUBLICAR</a> 
                            </div><br>

                            <div class="button button_color_2 text-center trans_200" style="border-radius:5px;">
                                <a onClick='document.getElementById("publicar").style.display = "none";document.getElementById("lista").style.display = "block";'  style="Color:white;">LISTA</a>
                            </div><br>

                                
                        </div>
            
            
		<!--+++++++++++++++++++++++++++
                FORMULARIO DE PUBLICAR   
                ++++++++++++++++++++-->

        <div class="col-lg-6" id="publicar" style="display: none;">
            
             <form action="publicar" method="post" enctype="multipart/form-data">
                <!--UBICACIÓN-->
                        <input type="hidden" name="directory" value="secretario">
                        <input type="hidden" name="file" value="publicar">
                <!--UBICACIÓN-->
                        <input type="hidden" name="tiempo" value="<?= time();?>">
                <table class="table">
                    <thead class="titulo-tabla">
                    <tr>
                        <td colspan="9">FORMULARIO DE PUBLICACIONES</td>
                        <td align="right">
                            <a onClick='document.getElementById("publicar").style.display = "none"' style="cursor: pointer; ">
                                <span class="fas fa-times"></span>
                            </a>
                        </td>

                    </tr>
                </thead>
                <tbody>
                    <tr class="subtitulo-tabla">
                      
                        <td colspan="8">TITULO DE LA NOTICIA</td>
                        <td colspan="2">FECHA</td>
                        
                      
                    </tr>
                    
                    <tr class="text-datos">
                       
                        <td colspan="8">
                            <input type="text" name="titulo" placeholder="TITULO DE LA NOTICIA" class="form-control">
                        </td>
                        <td colspan="2">
                            <input type="date" name="fecha" placeholder="FECHA" class="form-control" >
                        </td>
                        
                        
                    </tr>
                    <tr>
                        <td colspan="10" class="subtitulo-tabla">NOTICIA</td>

                    </tr>
                    <tr>
                        <td colspan="10">
                            <textarea name="mensaje" cols="90" rows="10" class="form-control">
                                
                            </textarea>
                        </td>
                    </tr>
                        

                
                    <tr>
                        <td colspan="2" class="subtitulo-tabla">AGREGAR IMAGEN:</td>
                        <td colspan="6">
                            <input type="file" name="img" placeholder="IMAGEN" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="10" align="CENTER">
                            <button class="btn btn-lg btn-success buttom" align="center">PUBLICAR</button>
                        </td>
                    </tr>
                </tbody>
                </table>
            </form>

        </div>

      

        <!--+++++++++++++++++++++++++++++++++++
                LISTA DE PUBLICACIONES
            +++++++++++++++++++++++++++++++++++-->

        <div class="col-lg-10 table-responsive" id="lista" style="display:none;">
           
                
            
                <table class="table">
                
                    <thead class="titulo-tabla">
                        <tr>
                            <td colspan="9">LISTA DE ABOGADOS</td>
                            <td align="right">
                            <a onClick='document.getElementById("lista").style.display = "none"' style="cursor: pointer; ">
                                <span class="fas fa-times"></span>
                            </a>
                        </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="subtitulo-tabla">
                            <td colspan="2">TITULO</td>
                            <td colspan="2">FECHA</td>
                            <td colspan="2">NOTICIA</td>
                            <td colspan="2">IMAGEN</td>
                            <td colspan="2">ACCIONES</td>
                           
                           
                            
                        </tr>

                        <?php 
                            
                            if (isset($variables['noticias'])):
                               
                            $i = 0;
                            foreach ($variables['noticias'] as $variable):
                               $i++;

                        ?>
                        <tr class="text-datos">
                            <td colspan="2">
                               <?= $variable['titulo'] ?? ' ';?>
                            </td >
                            <td colspan="2">
                               <?= $variable['fecha'] ?? ' ';?>
                            </td>
                            <td colspan="2">
                               <?= $variable['mensaje'] ?? ' ';?>
                            </td>
                            <td colspan="2"  >
                               <img  src="images/noticias/<?= $variable['img']?>" style="width: 100px; height: 100px;" alt="No posee imagen">
                            </td>
                            <td>
                                <a href="eliminarPublicacion?id=<?=$variable['id']?>&base=noticias&img=images/noticias/<?= $variable['img']?>">
                                <span class="fas fa-trash-alt" style="font-size: 24px;"></span>
                                </a>
                            </td>
                            <td>
                              <a href="editarPublicacion?id=<?=$variable['id']?>&base=noticias">
                                <span class="fas fa-pencil-alt" style="font-size: 24px;"></span>
                              </a>
                            </td>
                            
                           
                        </tr>

                        <?php
                            endforeach;
                        endif;
                        ?>
                    </Tbody>
                    <tfoot>
                        <tr>
                           <td>TOTAL DE ABOGADOS:</td> 
                           <td><?= $i ?? 'NO HAY RESULTADOS' ?></td>
                        </tr>
                    </tfoot>
                </table>
            </form>    
        </div>

        <?php
            if (isset($variables['tabla'])) 
            {
               if ($variables['tabla'] == 'editar') 
               {
                    $accion1 = 'block';    
                    
                    
               }
               else
               {
                    $accion1 = 'none';
                
               } 
            } 
            else
            {
                $accion1 = 'none';
            }  
        ?>

        <!--+++++++++++++++++++++++++++++++++++++++++++++++
                FORMULARIO DE ACTUALIACION DE PUBLICACIONES   
                ++++++++++++++++++++++++++++++++++++++++++++-->

        <div class="col-lg-6"  style="display: <?=$accion1?>;" id="actualizar">
            
             <form action="editarPublicacion" method="post" enctype="multipart/form-data">
                <!--UBICACIÓN-->
                        <input type="hidden" name="directory" value="secretario">
                        <input type="hidden" name="file" value="publicar">
                <!--DATOS-->
                        <input type="hidden" name="tiempo" value="<?= time();?>">
                        <input type="hidden" name="id" value="<?= $variables['id']?>">
                <table class="table">
                    <thead class="titulo-tabla">
                    <tr>
                        <td colspan="9">EDITAR PUBLICACIÓN</td>
                        <td align="right">
                            <a onClick='document.getElementById("actualizar").style.display = "none"' style="cursor: pointer; ">
                                <span class="fas fa-times"></span>
                            </a>
                        </td>

                    </tr>
                </thead>
                <tbody>
                    <tr class="subtitulo-tabla">
                      
                        <td colspan="8">TITULO DE LA NOTICIA</td>
                        <td colspan="2">FECHA</td>
                        
                      
                    </tr>
                    
                    <tr class="text-datos">
                       
                        <td colspan="8">
                            <input type="text" name="titulo" value="<?=$variables['titulo'];?>" placeholder="TITULO DE LA NOTICIA" class="form-control">
                        </td>
                        <td colspan="2">
                            <input type="date" name="fecha" value="<?=$variables['fecha'];?>" placeholder="FECHA" class="form-control" >
                        </td>
                        
                        
                    </tr>
                    <tr>
                        <td colspan="10" class="subtitulo-tabla">NOTICIA</td>

                    </tr>
                    <tr>
                        <td colspan="10">
                            <textarea name="mensaje" value="" cols="90" rows="10" class="form-control">
                                <?=$variables['mensaje'];?>
                            </textarea>
                        </td>
                    </tr>
                        

                
                    <tr>
                        <td colspan="2" class="subtitulo-tabla">AGREGAR IMAGEN:</td>
                        <td colspan="6">
                            <input type="file" name="img" placeholder="IMAGEN" class="form-control">
                        </td>
                        <td align="center">
                            <p>Imagen actual</p>
                            <input type="hidden" name="imagenActual" value="<?=$variables['img'];?>">
                            <img style="width: 50px; height: 50px;" src="images/noticias/<?=$variables['img'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="10" align="CENTER">
                            <button class="btn btn-lg btn-warning buttom" align="center">EDITAR</button>
                        </td>
                    </tr>
                </tbody>
                </table>
            </form>

        </div>

      

          <div class="col-lg-12">
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
           
    



    
<div class="col-lg-12" style="height: 200px;">

</div>


<?php
require_once DIRECCION_APP . 'views/secretario/parcial/footer.view.php';
?>

