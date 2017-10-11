<?php

if (!defined('MASTER')) { die('You shall not pass !'); }

/**
* Constante: liste des pages
* url        : l'url de la page (unique)
* visibility : visibilité de la page (private, public, logged : visible pour les utilisateurs loggés, unlogged : visible pour les utilisateurs non loggés)
* noaccess   : redirection de la page en cas de refus (par défaut : erreur)
* templates  : liste ordonnée des templates à charger
*
* @var array
*/
define('PAGES', serialize(array(
	'login' => array(
		'url' => '/login',
		'visibility' => 'unlogged',
		'noaccess'   => 'mails',
		'templates'  => array( 'header', 'login', 'footer' ),
	),
	'auth' => array(
		'url' => '/auth',
		'visibility' => 'unlogged',
		'noaccess'   => 'mails',
	),
)));
