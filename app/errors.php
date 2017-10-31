<?php

define('ERRORS', array(

	
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


));




/*


200 : Erreur client

210 : Page non trouvé
211 : Accès non autorisé
212 : Connection obligatoire
213 : Paramètres manquants
214 : Requête trop longue
215 : Pourquoi se connecter à une théière ?

220 : Erreur formulaire
221 : Champ obligatoire non remplie
222 : Case obligatoire non cochée
223 : Mauvais format
224 : Valeure interdite

230 : Texte incorrect
231 : Texte interdit
232 : Texte non identique
233 : Texte déjà utilisé
234 : Texte trop long
235 : Texte trop court
236 : Nombre incorrect
237 : Nombre interdit
238 : Nombre non identique
239 : Nombre déjà utilisé
240 : Nombre trop grand
241 : Nombre trop petit
242 : Mail incorrect
243 : Mail interdit
244 : Mail non identique
245 : Mail déjà utilisé
246 : Mail trop long
247 : Mail trop court
248 : Nom de domaine interdit
249 : Telephone incorrect
250 : Telephone interdit
251 : Telephone non identique
252 : Telephone déjà utilisé
253 : Telephone trop long
254 : Telephone trop court
255 : Date incorrect
256 : Date interdit
257 : Date non identique
258 : Date déjà utilisé
259 : Date trop ancienne
260 : Date trop récente
261 : Date trop future
262 : Captcha incorrect

*/

