                <div id="content">
					<div class="container">
						<div class="row margin-vert-30">
							<!-- Register Box -->
							<div class="col-sm-8 col-sm-offset-2">
								<div class="signup-page">
									<div class="signup-header">
										<h2 class="text-center">Connexion au site</h2>
										<p>Si vous n'êtes pas encore inscrit, vous pouvez le faire en <a href="index.php?module=membres&amp;action=inscription">cliquant sur ce lien</a>.</p>
									</div>
									<div class="row">
										<?php
											if (!empty($erreurs_connexion)) {
												echo '<ul>'."\n";
												foreach($erreurs_connexion as $e) {
													echo '	<li>'.$e.'</li>'."\n";
												}
												echo '</ul>';
											}
											echo $form_connexion;
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>