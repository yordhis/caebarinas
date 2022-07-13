<div class="register">

		<div class="container-fluid">
			
			<div class="row row-eq-height">
				<div class="col-lg-6 nopadding">
					
					<!-- Register -->

					<div class="register_section d-flex flex-column align-items-center justify-content-center">
						<div class="register_content text-center">
							<h1 class="register_title">Verifica que tu  <span>Abogado</span> este en el gremio de CAE</h1>
							<p class="register_text">Sí, el abogado que te está atendiendo no aparece en nuestro sistema CAE, te debes dirigir a nuestras oficinas para atender el caso y evitar fraude.</p>
							<div class="button button_1 register_button mx-auto trans_200"><a href="<?= DIRECCION_PUBLICA?>contactanos">Contactar</a></div>
						</div>
					</div>

				</div>

				<div class="col-lg-6 nopadding" id="buscar">

					<?php

						if (isset($variables['tabla'])) {
							$action1 = 'block';
							
						} else {
							$action1= 'none';
						
						}
						
					?>
					
					<!-- Search -->

					<div class="search_section d-flex flex-column align-items-center justify-content-center">
						<div class="search_background" style="background-image:url(images/search_background.jpg);"></div>
						<div class="search_content text-center">
							<h1 class="search_title">Gremio CAE</h1>
							<form id="search_form" class="search_form" action="varificarAbogado#buscar" id="formBuscar" method="post" style="" >
								<input id="search_form_name" class="input_field search_form_name" type="text" name="cedula" placeholder="Ingrese Cedula de Identidad" required="required" data-error="Course name is required.">

								<input type="hidden" name="directory" value="paginas">
								<input type="hidden" name="file" value="inicio">
								<!--
								<input id="search_form_category" class="input_field search_form_category" type="text" placeholder="Category">
								<input id="search_form_degree" class="input_field search_form_degree" type="text" placeholder="Degree">
								-->

								<button id="search_submit_button" type="submit" class="search_submit_button trans_200" value="Submit">Verificar</button>
							</form><br>

							<div class="button btn-success text-center trans_200" id="verificar" style="border-radius:5px; display: <?= $action1?>">

								<p><h3>ABOGADO ENCONTRADO:</h3>
                                	Nombres: <?= utf8_decode($variables['nombres'] ?? ' ')?><br>
                                	Apellidos: <?= utf8_decode($variables['apellidos'] ?? ' ')?><br>
                                	Universidad: <?= utf8_decode($variables['universidad'] ?? ' ')?></p>
                                <a onClick='document.getElementById("verificar").style.display = "none"; document.getElementById("formBuscar").style.display = "block";'  style="color:#E8144E;"><span class="fas fa-external-link-alt"></span>
                                </a>
                            </div>
						</div> 
					</div>

				</div>
			</div>
		</div>
	</div>