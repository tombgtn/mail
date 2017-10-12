<?php

if (!defined('MASTER')) { die('You shall not pass !'); }


class User {
	
	/**
	* Instance de la class User
	* 
	* @var User
	* @access private
	* @static
	*/
	private static $_instance = null;

	/**
	* ID de l'utilisateur
	*
	* @var int
	* @access private
	*/ 
	private $id;

	/**
	* Mail de l'utilisateur
	*
	* @var string
	* @access private
	*/ 
	private $mail;

	/**
	* Mot de passe de l'utilisateur
	*
	* @var string
	* @access private
	*/
	private $pass;

	/**
	* Constructeur de la classe
	*
	* @param void
	* @return void
	*/
	private function __construct() {
		/**/
		//if (session_status()!=PHP_SESSION_ACTIVE) { throw new Exception('La session n\'existe pas', 502); }
	}

	/**
	* Méthode qui crée l'unique instance de la classe
	* si elle n'existe pas encore puis la retourne.
	*
	* @param void
	* @return Singleton
	*/
	public static function getInstance() {
		if(is_null(self::$_instance)) { self::$_instance = new User(); }
		return self::$_instance;
	}

	/*********** SETTER ***********/

	/**
	* Méthode qui crée le cookie d'enregistrement
	*
	* @param void
	* @return void
	*/
	public function setCookie() {
		/* Si id, mail et password existe et si id, mail et password correspondent */
		if (1==2) {
			$cookieName = 'auth';
			$cookieValue = $this->id.'#'.hash_password($this->mail.$this->pass);
			$cookieLength = time()+SESS_DUREE;
			$cookiePath = BASE;
			$cookieDomain = 'localhost';
			$cookieSecure = true;
			$cookieHttpOnly = true;
			return setcookie($cookieName, $cookieValue, $cookieLength, $cookiePath, $cookieDomain, $cookieSecure, $cookieHttpOnly);
		} else {
			return false;
		}
	}

	/**
	* Méthode qui fixe le mail de l'utilisateur
	*
	* @param string
	* @return void
	*/
	public function setMail($mail) {
		if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
			$this->mail = $mail;
		} else {
			throw new Exception('Mail incorrect', 403);
		}
	}

	/*********** GETTER ***********/

	/**
	* Méthode qui renvoie le mail de l'utilisateur
	*
	* @param void
	* @return string
	*/
	public function getMail() {
		return $this->mail;
	}
}