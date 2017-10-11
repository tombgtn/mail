<?php

if (!defined('MASTER')) { die('You shall not pass !'); }


class Mails {

	/**
	* Liste des mails
	*
	* @var Mail
	* @access private
	*/ 
	private $mails;

	/**
	* Timestamp de dernière actualisation
	*
	* @var timestamp
	* @access private
	*/ 
	private $last_refresh;

	/**
	* Constructeur de la classe
	*
	* @param void
	* @return void
	*/
	private function __construct() {
	}
}