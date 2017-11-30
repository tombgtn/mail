<?php

if (!defined('MASTER')) { die('You shall not pass user !'); }


class User {





	/********** ATTRIBUTS **********/
	
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








	/********** SINGLETON **********/

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








	/********** GETTER **********/

	/**
	* Méthode qui renvoie le mail de l'utilisateur
	*
	* @param void
	* @return string
	*/
	public function getMail() {
		return $this->mail;
	}

	/**
	* Méthode qui dit si le mot de passe est le même ou non
	*
	* @param string mot de passe à vérifier
	* @return booleen
	*/
	public function verifyPass($pass) {
		$salt = intval(substr($this->pass, -1));
		if (!isset($salt)||!is_int($salt)||$salt>9||$salt<1||in_array($salt, array(1,2,3,4,5,6,7,8,9))) { throw new Exception('Le mot de passe n\'est pas correctement crypté', 505); }
		return $this->pass===hash_password($pass, $salt);
	}








	/********** SETTER **********/

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

	/**
	* Méthode qui fixe le mot de passe de l'utilisateur
	*
	* @param string
	* @return void
	*/
	public function setPassword($pass) {
		$this->pass = hash_password($pass);
	}
}