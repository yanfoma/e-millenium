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
												 <li>
                                                 <li><a href="index.php?module=membres/vues&amp;action=monbureau" class="fa-home">Mon Bureau</a></li>
                                                 <li>
                                            <span class="fa-gears">TD & Examens</span>
                                            <ul>
                                                <li>
                                                    <a href="#">Travaux dirrigés</a>
                                                </li>
                                                <li>
                                                    <a href="#">Sujets d'examen</a>
                                                </li>
                                                <li>
                                                    <a href="#">Concours</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <span class="fa-copy">Cours & Supports</span>
                                            <ul>
                                                <li>
                                                    <a href="#l">Supports de cours</a>
                                                </li>
                                                <li>
                                                    <a href="#">Documents pratiques</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <span class="fa-globe">Campus</span>
                                            <ul>
                                                <li>
                                                    <a href="#">Emplois du temps</a>
                                                </li>
                                                <li>
                                                    <a href="#">Programme des devoirs</a>
                                                </li>
                                                <li>
                                                    <a href="#">Actualités</a>
                                                </li>
                                            </ul>

                                        </li>
                                         <li>
                                            <span class="fa-user">Profil</span>
                                            <ul>
                                                <li>
                                                    <a href="#">Mon Profile</a>
                                                </li>
                                                <li>
                                                    <a href="#">Paramètres</a>
                                                </li>
                                                <li><a href="index.php?module=membres&amp;action=deconnexion">Deconnexion</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="fa-comment">Forum</a>
                                        </li>
												


											</ul>
										<?php } ?>
								</div>
							</div>
						</div>
					</div>
				
