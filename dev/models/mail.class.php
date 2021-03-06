<?php

if (!defined('MASTER')) { die('You shall not pass mail !'); }


class Mail extends ModeleClass {

	/**
	* Expéditeur du mail
	*
	* @var string
	* @access private
	*/ 
	private const _REQUIRE = array();

	/**
	* Expéditeur du mail
	*
	* @var string
	* @access private
	*/ 
	private $from;

	/**
	* Destinataire du mail
	*
	* @var string
	* @access private
	*/ 
	private $to;

	/**
	* Date du mail
	*
	* @var string
	* @access private
	*/ 
	private $date;

	/**
	* Objet du mail
	*
	* @var string
	* @access private
	*/ 
	private $subject;

	/**
	* Contenu du mail
	*
	* @var string
	* @access private
	*/ 
	private $content;

	/**
	* Constructeur de la classe
	*
	* @param void
	* @return void
	*/
	private function __construct() {
	}
}