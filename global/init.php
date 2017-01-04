<?php

	// Inclusion du fichier de configuration (qui définit des constantes)
	include 'global/config.php';

	// Utilisation et démarrage des sessions
	session_start();

	// Désactivation des guillemets magiques
	//set_magic_quotes_runtime(0);
 	ini_set ("magic_quotes_runtime", 0);

	if (1 == get_magic_quotes_gpc())
	{
		function remove_magic_quotes_gpc(&$value) {
		
			$value = stripslashes($value);
		}
		array_walk_recursive($_GET, 'remove_magic_quotes_gpc');
		array_walk_recursive($_POST, 'remove_magic_quotes_gpc');
		array_walk_recursive($_COOKIE, 'remove_magic_quotes_gpc');
	}

	// Inclusion de Pdo2, potentiellement utile partout
	include CHEMIN_LIB.'pdo2.php';
 

	// Vérifie si l'utilisateur est connecté   
	function utilisateur_est_connecte() {
	 
		return !empty($_SESSION['id']);
	}