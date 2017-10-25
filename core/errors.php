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
	)
);