				<div class="row">
					<div class="col text-center">
						<div class="newsletter_form_container mx-auto">
							<?php 
								$url = $_GET['url'] ?? ' ';

							?>
							<form action="<?=$url?>" method="post">
								<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-center">
									<input id="newsletter_email" class="newsletter_email" type="email" placeholder="Ingresa tu E-mail" required="required" data-error="Valid email is required." name="email">
								
									<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">Subscribe</button>
								</div>
							</form>
						</div>
					</div>
				</div>
