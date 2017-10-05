<?php
/*
require_once('template/header.php');
require_once('template/menu.php');
require_once('template/liste.php');
require_once('template/mail.php');
require_once('template/footer.php');
*/


class Constructor {
	
	/**
	* Instance de la class Constructor
	* 
	* @var Constructor
	* @access private
	* @static
	*/
	private static $_instance = null;
 
	/**
	* Constante: templates possibles
	*
	* @var array
	*/
	const TEMPLATES = array('header', 'footer', 'liste', 'login', 'mail', 'menu', 'nouveau');

	/**
	* Constructeur de la classe
	*
	* @param void
	* @return void
	*/
	private function __construct() {
		
	}

	/**
	* Méthode qui crée l'unique instance de la classe
	* si elle n'existe pas encore puis la retourne.
	*
	* @param void
	* @return Singleton
	*/
	public static function getInstance() {
		if(is_null(self::$_instance)) { self::$_instance = new Constructor(); }
		return self::$_instance;
	}

	/**
	* Méthode qui charge le template correspondant
	*
	*
	* @param string $file Le nom du template
	* @return html Le code html
	*/
	public static function getTemplate($file = 'login') {
		if (in_array($file, self::TEMPLATES)) {
			# code...
		}
	}
}