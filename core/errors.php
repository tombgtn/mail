<?php

$errors = array(

	
	'1' => array(
		'libelle' => 'Erreur système',
		'http'    => 500,
		'errors'  => array(


			'101' => array(
				'libelle' => 'Action non autorisée',
				'http'    => 403
			),
			'102' => array(
				'libelle' => 'Action nécessitant confirmation',
				'http'    => 401
			),


			'110' => array(
				'libelle' => 'Variable non définie',
				'http'    => 500
			),
			'112' => array(
				'libelle' => 'Variable : format non acceptable',
				'http'    => 500
			),


			'120' => array(
				'libelle' => 'Constante non définie',
				'http'    => 500
			),
			'121' => array(
				'libelle' => 'Constante déjà définie',
				'http'    => 500
			),
			'122' => array(
				'libelle' => 'Constante : format non acceptable',
				'http'    => 500
			),


			'130' => array(
				'libelle' => 'Erreur dans le modèle',
				'http'    => 500
			),
			'131' => array(
				'libelle' => 'Fichier requis manquant',
				'http'    => 500
			),
			'132' => array(
				'libelle' => 'Fichier requis non trouvé',
				'http'    => 500
			),
			'133' => array(
				'libelle' => 'Fichier requis non chargé',
				'http'    => 500
			),
			'134' => array(
				'libelle' => 'Fichier requis non accepté',
				'http'    => 500
			),


			'140' => array(
				'libelle' => 'Erreur dans la vue',
				'http'    => 500
			),
			'141' => array(
				'libelle' => 'Aucun template défini',
				'http'    => 500
			),
			'142' => array(
				'libelle' => 'Template non trouvé',
				'http'    => 500
			),
			'143' => array(
				'libelle' => 'Template non chargé',
				'http'    => 500
			),


			'150' => array(
				'libelle' => 'Erreur dans la base de données',
				'http'    => 500
			),
			'151' => array(
				'libelle' => 'Echec de la connexion',
				'http'    => 500
			),
			'152' => array(
				'libelle' => 'Hote non définie',
				'http'    => 500
			),
			'153' => array(
				'libelle' => 'Hote incorrect',
				'http'    => 500
			),
			'154' => array(
				'libelle' => 'Utilisateur non définie',
				'http'    => 500
			),
			'155' => array(
				'libelle' => 'Utilisateur incorrect',
				'http'    => 500
			),
			'156' => array(
				'libelle' => 'Mot de passe non définie',
				'http'    => 500
			),
			'157' => array(
				'libelle' => 'Mot de passe incorrect',
				'http'    => 500
			),
			'158' => array(
				'libelle' => 'Base de données non définie',
				'http'    => 500
			),
			'159' => array(
				'libelle' => 'Base de données inexistante',
				'http'    => 500
			),
			'160' => array(
				'libelle' => 'Accès à la base de données interdite',
				'http'    => 500
			),
			'161' => array(
				'libelle' => 'Table inexistante dans la BDD',
				'http'    => 500
			),
			'162' => array(
				'libelle' => 'Champ inexistant dans la table',
				'http'    => 500
			),
			'163' => array(
				'libelle' => 'Requete interdite',
				'http'    => 500
			),
			'164' => array(
				'libelle' => 'Requete trop longue',
				'http'    => 500
			),
			'165' => array(
				'libelle' => 'Requete échouée',
				'http'    => 500
			),


			'170' => array(
				'libelle' => 'Session non définie',
				'http'    => 500
			),
			'171' => array(
				'libelle' => 'Session déjà définie',
				'http'    => 500
			),
			'172' => array(
				'libelle' => 'Session non démarré',
				'http'    => 500
			),

			'180' => array(
				'libelle' => 'Erreur dans la réponse',
				'http'    => 500
			),
			'181' => array(
				'libelle' => 'Code HTTP inexistant',
				'http'    => 500
			),
			'182' => array(
				'libelle' => 'Code HTML vide',
				'http'    => 500
			),
			'183' => array(
				'libelle' => 'Code HTML non valide',
				'http'    => 500
			),
		)
	),




	
	'2' => array(
		'libelle' => 'Erreur client',
		'http'    => 400,
		'errors'  => array(


			'210' => array(
				'libelle' => 'Page non trouvé',
				'http'    => 404
			),
			'211' => array(
				'libelle' => 'Accès non autorisé',
				'http'    => 403
			),
			'212' => array(
				'libelle' => 'Connection obligatoire',
				'http'    => 401
			),
			'213' => array(
				'libelle' => 'Paramètres manquants',
				'http'    => 403
			),
			'214' => array(
				'libelle' => 'Requête trop longue',
				'http'    => 408
			),
			'215' => array(
				'libelle' => 'Pourquoi se connecter à une théière ?',
				'http'    => 418
			),


			'220' => array(
				'libelle' => 'Erreur formulaire',
				'http'    => 500
			),
			'221' => array(
				'libelle' => 'Champ obligatoire non remplie',
				'http'    => 500
			),
			'222' => array(
				'libelle' => 'Case obligatoire non cochée',
				'http'    => 500
			),
			'223' => array(
				'libelle' => 'Mauvais format',
				'http'    => 500
			),
			'224' => array(
				'libelle' => 'Valeure interdite',
				'http'    => 500
			),
		)
	)


);