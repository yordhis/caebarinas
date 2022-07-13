	<div class="events page_section" id="noticias">
		<div class="container">
			
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Noticias y Eventos</h1>
					</div>
				</div>
			</div>
			
			<div class="event_items">

				<?php
					foreach ($variables['noticias'] as $variable):
					 	
					 
				?>

				<!-- Event Item -->
				<div class="row event_item">
					<div class="col">
						<div class="row d-flex flex-row align-items-end">

							<div class="col-lg-2 order-lg-1 order-2">
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<?php
										$fecha = explode('-',$variable['fecha']);
										 switch ($fecha[1]) {
										 	case  '1':
										 		$mes = 'Enero';
										 		break;
										 	case  '2':
										 		$mes = 'Febrero';
										 		break;
										 	case  '3':
										 		$mes = 'Marzo';
										 		break;
										 	case  '4':
										 		$mes = 'Abril';
										 		break;
										 	case  '5':
										 		$mes = 'Mayo';
										 		break;
										 	case  '6':
										 		$mes = 'Junio';
										 		break;
										    case  '7':
										 		$mes = 'Julio';
										 		break;
										 	case  '8':
										 		$mes = 'Agosto';
										 		break;
										 	case  '9':
										 		$mes = 'Septiembre';
										 		break;
										 	case  '10':
										 		$mes = 'Octubre';
										 		break;
										 	case  '11':
										 		$mes = 'Noviembre';
										 		break;
										 	case  '12':
										 		$mes = 'Diciembre';
										 		break;
										 	default:
										 		$mes = 'No definido';
										 		break;
										 }
									?>
									<div class="event_day"><?=$fecha[2]?></div>
									<div class="event_month"><?=$mes?></div>
								</div>
							</div>

							<div class="col-lg-6 order-lg-2 order-3">
								<div class="event_content">
									<div class="event_name"><a class="trans_200" href="<?= DIRECCION_PUBLICA?>verNoticia?id=<?=$variable['id']?>"><?=$variable['titulo']?></a></div>
									<div class="event_location">C.A.E Barinas</div>
									<p>
										<?php 
											$text = explode('.', $variable['mensaje']);
											echo $text[0];
										?>
											
										</p>
								</div>
							</div>

							<div class="col-lg-4 order-lg-3 order-1">
								<div class="event_image">
									<img src="images/noticias/<?=$variable['img']?>" alt="https://unsplash.com/@theunsteady5">
								</div>
							</div>

						</div>	
					</div>
				</div>

				<?php endforeach;?>				
			</div>		
		</div>
	</div>