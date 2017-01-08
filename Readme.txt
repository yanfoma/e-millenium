@ e-millenium V 1.0 @

ORGANISATION DU CODE  - ARCHITECHTURE DU SITE  

<!=========== Introduction ============>

Dans ce site, 3 classes principales sont utilisées :

* une pour l'accès à la base de données SQL (mySQL dans le cas présent) : nous utiliserons PDO, qui définit une excellente interface pour accéder à une BDD. 

* une pour la gestion des formulaires : elle simplifie largement la création et surtout le traitement des formulaires ! On aura ainsi beaucoup moins de lignes de code à écrire en l'utilisant !

* Une troisième classe nommée Image est également utilisée. Elle permet simplement de lire, redimensionner et sauvegarder des images aux formats JPG, PNG et GIF sans se soucier des fonctions à utiliser pour lire et enregistrer l'image.

Enfin, au niveau de la base de données, j'utilise les requêtes préparées. Elle rend les injections SQL quasi impossibles (à ce qu'il parait !).


<!=========== Organisation du code et des fichiers ============>

// Modules et actions

Le site est scindé en un ensemble de modules (exemple : un espace membre, un learning, un forum ...), qui seront chacun constitués d'actions (exemples : afficher un profil, consulter un sujet ou une correction, poster un message dans le forum ...).

// Organisation des répertoires

Voici ce que je vous propose et ce que j'ai utilisé jusqu'à présent:

* Nous avons un dossier ~/modules/ qui contient tous nos modules.

* Chaque module sera contenu dans un dossier portant le nom du module et situé dans ~/modules/.

* Chaque action sera placée dans un fichier spécifique dans le dossier du module, portant le nom de l'action.

* Les vues associées à ces actions, si elles concernent uniquement le module en question, seront placée dans un dossier vues situé dans le dossier du module: ~/module/nom_module/vues/.
Parcontre si l'action appelle une vue qui peut être utilisée par d'autres modules, cette vue sera placé dans ~/vues_globales (ex.: affichage des erreurs de connection.)

* Toutes ces pages ne seront pas appelées directement, mais par la page principale index.php. Toutes les requêtes passeront par cette page qui s'occupera de charger le bon module et la bonne action de manière sécurisée (elle joue le rôle de contrôleur frontal).


<!=========== De la division 'MVC' du travail ! ============>

Chaque action d'un module appartient en fait à un contrôleur. Ce contrôleur est chargé de générer la page suivant la requête (HTTP) demandée par l'utilisateur. Cette requête inclut des informations comme l'URL, avec ses paramètres GET, des données POST, des COOKIES, etc. Un module est souvent divisé en plusieurs contrôleurs, qui contiennent chacun plusieurs actions.


//  Les librairies utilisées

un dossier ~/libs contient les librairies utilisés
	~/libs/form.php
	~/libs/image.php
	~/libs/pdo2.php

<!=========== Architecture finale utilisée ============>

index.php redirige la requête de l'utilisateur vers le bon contrôleur du bon module. j'ai également défini un comportement lorsqu'aucun module ni action n'est spécifié. J'ai choisi de charger la page ~/global/accueil.php qui contient le code de la page d'accueil.

En partant du constat qu'un modèle peut servir dans plusieurs modules (exemple : les informations d'un utilisateur sont utiles à la fois pour le learning et le forum), on placera les fichiers de modèles dans un dossier séparé (~/modeles/), bien qu'ils seront toujours regroupés par "modules".
Cela permet un meilleur découpage des modèles et peut éviter d'inclure des fonctions utiles seulement dans une action d'un module. Par exemple, la fonction pour vérifier l'unicité d'une adresse e-mail lors de l'inscription est utile uniquement lors de l'inscription. Nous la mettrons donc dans un fichier séparé pour éviter de surcharger le modèle pour la table "membres".

// Squelette d'une page vierge

Les balises HTML <html> <head> <title> <meta> <body> étant globales car nécessaire à tous les modules, sont créés dans un dossier ~/global/.
J'ai mis dans ce dossier ~/global/ : haut.php et bas.php. puis un troisième : menu.php que j'inclus depuis haut.php
Ceci permet d'avoir accès au menu rapidement, car on aura à modifier cette page au fur et à mesure de l'avancement du site !

Enfin, deux derniers fichiers sont used. Il s'agit de ~/global/init.php et ~/global/config.php. Le premier fichier (d'initialisation) contient dans un premier temps une suppression des guillemets magiques (parrait que c'est bien de le faire !) et l'inclusion du second fichier (de configuration). Le second fichier définit les constantes de notre site. Les informations de connexion à la base de données ainsi que des chemins vers les modèles et vues.

Le fichier d'initialisation sera appelé sur toutes les pages depuis index.php, d'où son emplacement dans ~/global/.