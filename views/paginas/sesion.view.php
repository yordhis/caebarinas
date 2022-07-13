<?php

    require_once DIRECCION_APP . 'views/complementos/head.view.php';
?>
    <div class="register">

		<div class="container-fluid">
			
			<div class="row row-eq-height">
                
				<div class="col-lg-6 nopadding">
					
					<!-- Register -->

					<div class="register_section d-flex flex-column align-items-center justify-content-center">
						<div class="register_content text-center">
							<h1 class="register_title">Bienvenidos al sistema del Colegio de Abogado de Barinas</h1>
							<div class="button button_line_1 text-center trans_200"><a href="<?= DIRECCION_PUBLICA?>" style="color: #121212;">Volver al inicio</a></div>
						</div>
					</div>

				</div>

				<div class="col-lg-6 nopadding" >
					
					<!-- Search -->

					<div class="search_section d-flex flex-column align-items-center justify-content-center">
						<div class="search_background" style="background-image:url(images/course_1.jpg);"></div>
						<div class="search_content text-center">
							
							<form id="sesion1" style="display: block;" class="search_form" action="login" method="post">
								<input id="search_form_name" class="input_field search_form_name" type="text" name="usuario" placeholder="Ingrese usuario" required="required" data-error="Course name is required.">
								
								<input id="search_form_category" class="input_field search_form_category" type="password" name="clave" placeholder="Ingrese contrseña">
                                <!--
                                <input id="search_form_degree" class="input_field search_form_degree" type="text" placeholder="Degree">
								-->

								<button id="search_submit_button" type="submit" class="search_submit_button trans_200" value="Submit">Entrar</button>
							</form>

							<a style="display: block; font-size: 24px; cursor: pointer; color: #955555;" id="a1" onClick='document.getElementById("a1").style.display = "none"; document.getElementById("a2").style.display = "block";
							document.getElementById("sesion2").style.display = "block"; document.getElementById("sesion1").style.display = "none";'><strong>Entrar con mi cedula</a>

							


							<form id="sesion2" style="display: none;" class="search_form" action="login" method="get">
								<input id="search_form_name" class="input_field search_form_name" type="text" name="cedula" placeholder="Ingrese su cedula" required="required" data-error="Course name is required." >

								<input type="hidden" name="formCedula" value="activo">
								
								
                                <!--
                                <input id="search_form_degree" class="input_field search_form_degree" type="text" placeholder="Degree">
								-->

								<button id="search_submit_button" type="submit" class="search_submit_button trans_200" value="Submit">Entrar</button>
							</form>

							<a style="display: none; font-size: 24px; cursor: pointer; color: #955555;" id="a2" onClick='
							document.getElementById("a1").style.display = "block"; document.getElementById("a2").style.display = "none";
							document.getElementById("sesion2").style.display = "none"; document.getElementById("sesion1").style.display = "block";'>Entrar con mi usuario</a>

							<p class="footer_about_text" style="color: red;">
								<?= $variables['messageError'] ?? ''; ?>
							</p>
						</div> 
					</div>

					

				</div>
			</div>
		</div>
	</div>


<footer class="footer">
		<div class="container">

<!-- Footer Content -->

			<div class="footer_content">
				<div class="row">

					<!-- Footer Column - About -->
					<div class="col-lg-3 footer_col">

						<!-- Logo -->
						<div class="logo_container">
							<div class="logo">
								<img src="images/escudo3.png" alt="escudo de Cae">
								<span>CAE</span>
							</div>
						</div>

						<p class="footer_about_text">La Federación de Colegios de Abogados es la entidad máxima de representación de los abogados venezolanos, tiene una gran influencia en el escenario político nacional y económico. En Venezuela, sólo los colegios de abogados tienen el poder de autorizar el ejercicio de la profesión de abogado.</p>

					</div>

					<!-- Footer Column - Menu -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Menu</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_list_item"><a href="<?= DIRECCION_PUBLICA ?>">Inicio</a></li>
								<li class="footer_list_item"><a href="<?= DIRECCION_PUBLICA ?>nosotros">Nosotros</a></li>
								<li class="footer_list_item"><a href="<?= DIRECCION_PUBLICA ?>noticias">Noticias</a></li>
								<li class="footer_list_item"><a href="<?= DIRECCION_PUBLICA ?>contactanos">Contáctanos</a></li>
							</ul>
						</div>
					</div>

					<!-- Footer Column - Usefull Links -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Acciones inicio</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_list_item"><a href="#requisitos">Requisitos</a></li>
								<li class="footer_list_item"><a href="#buscar">Verificar abogado</a></li>
								<li class="footer_list_item"><a href="#noticias">Noticias y eventos</a></li>
							</ul>
						</div>
					</div>

					<!-- Footer Column - Contact -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Contact</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="<?= DIRECCION_PUBLICA ?>images/envelope.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>ceaBarinas@gmail.com
								</li>
							</ul>
						</div>
					</div>

				</div>
			</div>

			<!-- Footer Copyright -->

			<div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
				<div class="footer_copyright">
					<span>
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Este sitio web fue desarrollado   por el <a href="https://www.facebook.com/YORDHIS" target="_blank">Ing. Yordhis Osuna</a>
					</span>
				</div>
				
				<div class="footer_social ml-sm-auto">
					<ul class="menu_social">
						
						
						<li class="menu_social_item"><a href="https://www.instagram.com/caebarinasv/"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item"><a href="https://www.facebook.com/pages/Colegio-De-Abogados-Del-Estado-Barinas/1002499179774619"><i class="fab fa-facebook-f"></i></a></li>
						
					</ul>
				</div>
			</div>

        </div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="css/bootstrap4/popper.js"></script>
<script src="css/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>
</body>
</html>