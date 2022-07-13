<?php require_once DIRECCION_APP . 'views/complementos/head2.view.php'; ?>

<?php require_once DIRECCION_APP . 'views/complementos/menu.view.php'; ?>



<div class="news">
		<div class="container">
			<div class="row">
				<div class="col-lg-12" style="height: 100px;"></div>
				<!-- Historia -->

				<div class="col-lg-6" id="historia">
					<div class="news_post_top d-flex flex-column flex-sm-row">
								<div class="news_post_title_container">
									<div class="news_post_title">
										<h1 style="color: black;"><?= $variables['titulo'] ?></h1>
									</div>
									<div class="news_post_meta">
										<span class="news_post_author"><a href="#">Publicado: <?= $variables['fecha'] ?> </a></span>
									</div>
								</div>
							</div>
					
					<div class="news_posts">
						<!-- Post Historia -->
						<div class="news_post">
							<div class="news_post_image" >
								<img src="images/noticias/<?= $variables['img']; ?>" alt="historia" style="height:;"	>
							</div>
						</div>	   
                    </div>				
				</div>

				<div class="col-lg-6">
							
							<div class="news_post_text">
								<p style="color: black; font-size:22px;">
                                    <?= $variables['mensaje']; ?>
                                    
                                </p>

                                <a href="<?= DIRECCION_PUBLICA?>noticias"><div class="button button_line_1 text-center trans_200">Volver</div></a>
							</div>
				</div>
            </div>
        </div>
    </div>

<?php require_once DIRECCION_APP . 'views/complementos/footer2.view.php'; ?>