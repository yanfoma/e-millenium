<?php

// Identifiants pour la base de données. Nécessaires a PDO2.
define('SQL_DSN',      'mysql:dbname=e-millenium;host=localhost');
define('SQL_USERNAME', 'root');
define('SQL_PASSWORD', '');

/*define('SQL_DSN',      'mysql:dbname=a5729478_mille;host=a5729478_root');
define('SQL_USERNAME', 'a5729478_root');
define('SQL_PASSWORD', 'root91');
*/
// Chemins à utiliser pour accéder aux vues/modeles/librairies
$module = empty($module) ? !empty($_GET['module']) ? $_GET['module'] : 'index' : $module;
define('CHEMIN_VUE',    'modules/'.$module.'/vues/');
define('CHEMIN_MODELE', 'modeles/');
define('CHEMIN_LIB',    'libs/');

define('CHEMIN_VUE_GLOBALE', 'vues_globales/');

// Configurations relatives à l'avatar
define('AVATAR_LARGEUR_MAXI', 100);
define('AVATAR_HAUTEUR_MAXI', 100);

define('DOSSIER_AVATAR', 'images/avatars/');
define('MAIL', 'PHPMailer/');