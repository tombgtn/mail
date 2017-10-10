<?php


class BDD {
	
	/**
	* Instance de la class BDD
	* 
	* @var BDD
	* @access private
	* @static
	*/
	private static $_instance = null;

	/**
	* Instance de la classe mysqli
	*
	* @var mysqli
	* @access private
	*/ 
	private $BDD_Instance = null;

	/**
	* Constante: nom d'utilisateur de la bdd
	*
	* @var string
	*/
	const SQL_USER = 'root';
 
	/**
	* Constante: hôte de la bdd
	*
	* @var string
	*/
	const SQL_HOST = 'localhost';
 
	/**
	* Constante: hôte de la bdd
	*
	* @var string
	*/
	const SQL_PASS = '';
 
	/**
	* Constante: nom de la bdd
	*
	* @var string
	*/
	const SQL_DTB = 'database';

	/**
	* Constructeur de la classe
	*
	* @param void
	* @return void
	*/
	private function __construct() {
		$mysqli = new mysqli(self::SQL_HOST, self::SQL_USER, self::SQL_PASS, self::SQL_DTB);
		if ($mysqli->connect_errno) {
			switch ($mysqli->connect_errno) {
				case 9999: break;
				default: throw new DatabaseException("Error connection", 1); break;
			}
		} else {
			$this->BDD_Instance = $mysqli;
		}
	}

	/**
	* Méthode qui crée l'unique instance de la classe
	* si elle n'existe pas encore puis la retourne.
	*
	* @param void
	* @return Singleton
	*/
	public static function getInstance() {
		if(is_null(self::$_instance)) { self::$_instance = new BDD(); }
		return self::$_instance;
	}

	/**
	* Exécute une requête SQL avec mysqli
	*
	* @param string $query La requête SQL
	* @return mysqli_result Retourne l'objet mysqli_result
	*/
	public function query($query) {
		return $this->BDD_Instance->query($query);
	}
}