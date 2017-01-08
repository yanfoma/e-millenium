@ e-millenium V 1.0 @

ORGANISATION DU CODE  - ARCHITECHTURE DU SITE  

<!=========== Introduction ============>

Dans ce site, 3 classes principales sont utilis�es :

* une pour l'acc�s � la base de donn�es SQL (mySQL dans le cas pr�sent) : nous utiliserons PDO, qui d�finit une excellente interface pour acc�der � une BDD. 

* une pour la gestion des formulaires : elle simplifie largement la cr�ation et surtout le traitement des formulaires ! On aura ainsi beaucoup moins de lignes de code � �crire en l'utilisant !

* Une troisi�me classe nomm�e Image est �galement utilis�e. Elle permet simplement de lire, redimensionner et sauvegarder des images aux formats JPG, PNG et GIF sans se soucier des fonctions � utiliser pour lire et enregistrer l'image.

Enfin, au niveau de la base de donn�es, j'utilise les requ�tes pr�par�es. Elle rend les injections SQL quasi impossibles (� ce qu'il parait !).


<!=========== Organisation du code et des fichiers ============>

// Modules et actions

Le site est scind� en un ensemble de modules (exemple : un espace membre, un learning, un forum ...), qui seront chacun constitu�s d'actions (exemples : afficher un profil, consulter un sujet ou une correction, poster un message dans le forum ...).

// Organisation des r�pertoires

Voici ce que je vous propose et ce que j'ai utilis� jusqu'� pr�sent:

* Nous avons un dossier ~/modules/ qui contient tous nos modules.

* Chaque module sera contenu dans un dossier portant le nom du module et situ� dans ~/modules/.

* Chaque action sera plac�e dans un fichier sp�cifique dans le dossier du module, portant le nom de l'action.

* Les vues associ�es � ces actions, si elles concernent uniquement le module en question, seront plac�e dans un dossier vues situ� dans le dossier du module: ~/module/nom_module/vues/.
Parcontre si l'action appelle une vue qui peut �tre utilis�e par d'autres modules, cette vue sera plac� dans ~/vues_globales (ex.: affichage des erreurs de connection.)

* Toutes ces pages ne seront pas appel�es directement, mais par la page principale index.php. Toutes les requ�tes passeront par cette page qui s'occupera de charger le bon module et la bonne action de mani�re s�curis�e (elle joue le r�le de contr�leur frontal).


<!=========== De la division 'MVC' du travail ! ============>

Chaque action d'un module appartient en fait � un contr�leur. Ce contr�leur est charg� de g�n�rer la page suivant la requ�te (HTTP) demand�e par l'utilisateur. Cette requ�te inclut des informations comme l'URL, avec ses param�tres GET, des donn�es POST, des COOKIES, etc. Un module est souvent divis� en plusieurs contr�leurs, qui contiennent chacun plusieurs actions.


//  Les librairies utilis�es

un dossier ~/libs contient les librairies utilis�s
	~/libs/form.php
	~/libs/image.php
	~/libs/pdo2.php

<!=========== Architecture finale utilis�e ============>

index.php redirige la requ�te de l'utilisateur vers le bon contr�leur du bon module. j'ai �galement d�fini un comportement lorsqu'aucun module ni action n'est sp�cifi�. J'ai choisi de charger la page ~/global/accueil.php qui contient le code de la page d'accueil.

En partant du constat qu'un mod�le peut servir dans plusieurs modules (exemple : les informations d'un utilisateur sont utiles � la fois pour le learning et le forum), on placera les fichiers de mod�les dans un dossier s�par� (~/modeles/), bien qu'ils seront toujours regroup�s par "modules".
Cela permet un meilleur d�coupage des mod�les et peut �viter d'inclure des fonctions utiles seulement dans une action d'un module. Par exemple, la fonction pour v�rifier l'unicit� d'une adresse e-mail lors de l'inscription est utile uniquement lors de l'inscription. Nous la mettrons donc dans un fichier s�par� pour �viter de surcharger le mod�le pour la table "membres".

// Squelette d'une page vierge

Les balises HTML <html> <head> <title> <meta> <body> �tant globales car n�cessaire � tous les modules, sont cr��s dans un dossier ~/global/.
J'ai mis dans ce dossier ~/global/ : haut.php et bas.php. puis un troisi�me : menu.php que j'inclus depuis haut.php
Ceci permet d'avoir acc�s au menu rapidement, car on aura � modifier cette page au fur et � mesure de l'avancement du site !

Enfin, deux derniers fichiers sont used. Il s'agit de ~/global/init.php et ~/global/config.php. Le premier fichier (d'initialisation) contient dans un premier temps une suppression des guillemets magiques (parrait que c'est bien de le faire !) et l'inclusion du second fichier (de configuration). Le second fichier d�finit les constantes de notre site. Les informations de connexion � la base de donn�es ainsi que des chemins vers les mod�les et vues.

Le fichier d'initialisation sera appel� sur toutes les pages depuis index.php, d'o� son emplacement dans ~/global/.