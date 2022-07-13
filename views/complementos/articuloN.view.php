

<!-- Noticias -->

	<div class="popular page_section">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Noticias y Eventos</h1>
					</div>
				</div>
			</div>

		<div class="row course_boxes" >
                
            <?php 
             foreach ($variables as $variable):
            
            
               
            ?>

				<!-- Articulo informativo -->
				<div class="col-lg-6 course_box" >
					<div class="card">
						<img class="card-img-top" src="<?= DIRECCION_PUBLICA?>images/noticias/<?=$variable['img']?>" alt="articulo">
						<div class="card-body text-center">
							<div class="card-title"><a href="<?= DIRECCION_PUBLICA?>verNoticia?id=<?=$variable['id']?>"><?= $variable['titulo']?></a></div>
							<div class="card-text">
                                Fecha de publicación: <?=$variable['fecha']?>
                            </div>
                        </div>

                        <!-- Info Acordeon -->
						<div class="elements_accordions">
							<div class="accordion_container">
								<div class="accordion d-flex flex-row align-items-center"> Leer</div>
								<div class="accordion_panel">
									<p>
										<?php 
											$text = explode('.', $variable['mensaje']);
											echo $text[0];
										?> 
									<a href="<?= DIRECCION_PUBLICA?>verNoticia?id=<?=$variable['id']?>">Ver mas!</a> </p>
								</div>
                            </div>
                        </div>
					</div>
                </div>
                
            <?php
                endforeach;
            ?>

        </div>
	</div>		
</div>