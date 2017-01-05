                    <!-- Top Menu -->
                    <div id="hornav" class="container no-padding">
                        <div class="row">
                            <div class="col-md-12 no-padding">
                                <div class="pull-right visible-lg">
										<?php if (!utilisateur_est_connecte()) { ?>
											<ul id="hornavmenu" class="nav navbar-nav">
												<li><a href="index.php" class="fa-home">Accueil</a></li>
												<li><a href="index.php?module=membres&amp;action=inscription">Inscription</a></li>
												<li><a href="index.php?module=membres&amp;action=connexion">Connexion</a></li>
											</ul>
										<?php } else { ?>
											<ul id="hornavmenu1" class="nav navbar-nav">
												<li><a href="index.php" class="fa-home">Accueil</a></li>
												<li><a href="index.php?module=membres&amp;action=vues/profil_infos_utilisateur">Profil</a></li>
												<li><a href="index.php?module=membres&amp;action=deconnexion">Deconnexion</a></li>
											</ul>
										<?php } ?>
								</div>
							</div>
						</div>
					</div>
				
