<?php

// Vérification des droits d'accès de la page
if (utilisateur_est_connecte()) {

	// On affiche la page d'erreur comme quoi l'utilisateur est déjà connecté   
	include CHEMIN_VUE_GLOBALE.'erreur_deja_connecte.php';
	
} 
else if (isset($_POST['submitAcceuil']) && !empty($_POST['telephone']) && !empty($_POST['mot_de_passe'])) {
	// Création d'un tableau des erreurs
	$erreurs_connexion = array();
	$telephone=$_POST["telephone"];
	$mot_de_passe=$_POST['mot_de_passe'];

		// On veut utiliser le modèle des membres (~/modeles/membres.php)
		include CHEMIN_MODELE.'membres.php';
		
		// combinaison_connexion_valide() est définit dans ~/modeles/membres.php
		$id_utilisateur = combinaison_connexion_valide($telephone, sha1($mot_de_passe));
		// Si les identifiants sont valides
		if (false !== $id_utilisateur) {
	
			$infos_utilisateur = lire_infos_utilisateur($id_utilisateur);
			
			// On enregistre les informations dans la session
			$_SESSION['id']     = $id_utilisateur;
			$_SESSION['phone'] 	= $telephone;
			$_SESSION['pseudo'] = $infos_utilisateur['user_name'];
			$_SESSION['avatar'] = $infos_utilisateur['user_avatar'];
			$_SESSION['email']  = $infos_utilisateur['adresse_email'];
			
			// Mise en place des cookies de connexion automatique
			if (!empty($_POST['connexi)on_auto']))
			{
				$navigateur = (!empty($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : '';
				$hash_cookie = sha1('aaa'.$telephone.'bbb'.$mot_de_passe.'ccc'.$navigateur.'ddd');
				
				setcookie( 'id',            $_SESSION['id'], strtotime("+1 year"), '/');
				setcookie('connexion_auto', $hash_cookie,    strtotime("+1 year"), '/');
			}
			
			// Vérifications pour la connexion automatique
			
			// Le mec n'est pas connecté mais les cookies sont là, on y va !
			if (!utilisateur_est_connecte() && !empty($_COOKIE['id']) && !empty($_COOKIE['connexion_auto']))
			{
				$infos_utilisateur = lire_infos_utilisateur($_COOKIE['id']);
				
				if (false !== $infos_utilisateur)
				{
					$navigateur = (!empty($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : '';
					$hash = sha1('aaa'.$infos_utilisateur['telephone'].'bbb'.$infos_utilisateur['mot_de_passe'].'ccc'.$navigateur.'ddd');
					
					if ($_COOKIE['connexion_auto'] == $hash)
					{
						// On enregistre les informations dans la session
						$_SESSION['id']     = $_COOKIE['id'];
						$_SESSION['phone'] 	= $infos_utilisateur['telephone
						'];
						$_SESSION['pseudo'] = $infos_utilisateur['nom_utilisateur'];
						$_SESSION['avatar'] = $infos_utilisateur['avatar'];
						$_SESSION['email']  = $infos_utilisateur['adresse_email'];
					}
				}
			}

			// Affichage de la confirmation de la connexion
			//include CHEMIN_VUE.'connexion_ok.php';
		include CHEMIN_VUE.'monbureau.php';
		} else {
			// Ne pas oublier d'inclure la librairie Form
		include CHEMIN_LIB.'form.php';
		
		// "formulaire_connexion" est l'ID unique du formulaire
		$form_connexion = new Form('formulaire_connexion');
		
		$form_connexion->method('POST');
		
		$form_connexion->add('Text', 'telephone')
					   ->label("Votre numero de telephone");
		
		$form_connexion->add('Password', 'mot_de_passe')
					   ->label("Votre mot de passe");
		
		// Ajoutons d'abord une case à cocher au formulaire de connexion
		$form_connexion->add('Checkbox', 'connexion_auto')
					   ->label("Connexion automatique");

		$form_connexion->add('Submit', 'submit')
					   ->value("Connectez-moi !");
		
		// Pré-remplissage avec les valeurs précédemment entrées (s'il y en a)
		$form_connexion->bound($_POST);
	
	
	
			$erreurs_connexion[] = "Couple nom d'utilisateur / mot de passe inexistant.";
			
			// On réaffiche le formulaire de connexion
			include CHEMIN_VUE.'formulaire_connexion.php';
		}
		
	
}
else {
	
		// Ne pas oublier d'inclure la librairie Form
		include CHEMIN_LIB.'form.php';
		
		// "formulaire_connexion" est l'ID unique du formulaire
		$form_connexion = new Form('formulaire_connexion');
		
		$form_connexion->method('POST');
		
		$form_connexion->add('Text', 'telephone')
					   ->label("Votre numero de telephone");
		
		$form_connexion->add('Password', 'mot_de_passe')
					   ->label("Votre mot de passe");
		
		// Ajoutons d'abord une case à cocher au formulaire de connexion
		$form_connexion->add('Checkbox', 'connexion_auto')
					   ->label("Connexion automatique");

		$form_connexion->add('Submit', 'submit')
					   ->value("Connectez-moi !");
		
		// Pré-remplissage avec les valeurs précédemment entrées (s'il y en a)
		$form_connexion->bound($_POST);
	
	
	
	// Création d'un tableau des erreurs
	$erreurs_connexion = array();
	
	// Validation des champs suivant les règles
	if ($form_connexion->is_valid($_POST)) {
		
		list($telephone, $mot_de_passe) =
			$form_connexion->get_cleaned_data('telephone', 'mot_de_passe');
		
		// On veut utiliser le modèle des membres (~/modeles/membres.php)
		include CHEMIN_MODELE.'membres.php';
		
		// combinaison_connexion_valide() est définit dans ~/modeles/membres.php
		$id_utilisateur = combinaison_connexion_valide($telephone, sha1($mot_de_passe));
		
		// Si les identifiants sont valides
		if (false !== $id_utilisateur) {
	
			$infos_utilisateur = lire_infos_utilisateur($id_utilisateur);
			
			// On enregistre les informations dans la session
			$_SESSION['id']     = $id_utilisateur;
			$_SESSION['phone'] 	= $telephone;
			$_SESSION['pseudo'] = $infos_utilisateur['user_name'];
			$_SESSION['avatar'] = $infos_utilisateur['user_avatar'];
			$_SESSION['email']  = $infos_utilisateur['adresse_email'];
			
			// Mise en place des cookies de connexion automatique
			if (false != $form_connexion->get_cleaned_data('connexion_auto'))
			{
				$navigateur = (!empty($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : '';
				$hash_cookie = sha1('aaa'.$telephone.'bbb'.$mot_de_passe.'ccc'.$navigateur.'ddd');
				
				setcookie( 'id',            $_SESSION['id'], strtotime("+1 year"), '/');
				setcookie('connexion_auto', $hash_cookie,    strtotime("+1 year"), '/');
			}
			
			// Vérifications pour la connexion automatique
			
			// Le mec n'est pas connecté mais les cookies sont là, on y va !
			if (!utilisateur_est_connecte() && !empty($_COOKIE['id']) && !empty($_COOKIE['connexion_auto']))
			{
				$infos_utilisateur = lire_infos_utilisateur($_COOKIE['id']);
				
				if (false !== $infos_utilisateur)
				{
					$navigateur = (!empty($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : '';
					$hash = sha1('aaa'.$infos_utilisateur['telephone'].'bbb'.$infos_utilisateur['mot_de_passe'].'ccc'.$navigateur.'ddd');
					
					if ($_COOKIE['connexion_auto'] == $hash)
					{
						// On enregistre les informations dans la session
						$_SESSION['id']     = $_COOKIE['id'];
						$_SESSION['phone'] 	= $infos_utilisateur['telephone
						'];
						$_SESSION['pseudo'] = $infos_utilisateur['nom_utilisateur'];
						$_SESSION['avatar'] = $infos_utilisateur['avatar'];
						$_SESSION['email']  = $infos_utilisateur['adresse_email'];
					}
				}
			}

			// Affichage de la confirmation de la connexion
			//include CHEMIN_VUE.'connexion_ok.php';
		include CHEMIN_VUE.'monbureau.php';
		} else {
	
			$erreurs_connexion[] = "Couple nom d'utilisateur / mot de passe inexistant.";
			
			// On réaffiche le formulaire de connexion
			include CHEMIN_VUE.'formulaire_connexion.php';
		}
		
	} else {
	
		// On réaffiche le formulaire de connexion
		include CHEMIN_VUE.'formulaire_connexion.php';
	}
}