You shall not pass!
<?php
/*
Fonctionnement du script :
- htaccess renvoie tout vers main.php
	- création du constructeur (Constructor::getInstance())
		- try/catch pour gérer toutes les erreurs du programme (Constructor::__construct())
			- init execute le programme (Constructor::init())
				- determine quel page est demandé (Constructor::whichPage())
				- determine quel template est nécessaire (Constructor::whichTemplate())
				- verifie l'utilisateur
					- si a les droits
						- execute les actions necessaires (Constructor::doAction())
							- charge les bons modeles (Constructor::loadModel())
							- execute les fonctions
					- sinon
						- erreur droits
*/
?>