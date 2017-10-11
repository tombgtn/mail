<?php


class User {

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
	}

	/*********** SETTER ***********/

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