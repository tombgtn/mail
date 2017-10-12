<?php

class Constructor {





	/********** ATTRIBUTS **********/
	
	/**
	* Instance de la class Constructor
	* 
	* @var Constructor
	* @access private
	* @static
	*/
	private static $_instance = null;

	/**
	* Slug de la page demandée
	* 
	* @var string
	* @access private
	* @static
	*/
	private static $page = null;








	/********** SINGLETON **********/

	/**
	* Méthode qui crée l'unique instance de la classe
	* si elle n'existe pas encore la créée puis la retourne.
	*
	* @param void
	* @return Singleton
	*/
	public static function getInstance() {
		if(is_null(self::$_instance)) { self::$_instance = new Constructor(); }
		return self::$_instance;
	}

	/**
	* Constructeur de la classe
	*
	* @param void
	* @return void
	*/
	private function __construct() {

		error_reporting(0);
		if (!defined('MASTER')) { define('MASTER', true); }

		try {
			if (!@include_once('.config')) { throw new Exception('Fichier de configuration non trouvé', 201); }
			$this->init();
		} catch (Exception $e) {
			echo "Message : " . $e->getMessage().'<br/>';
			echo "Code : " . $e->getCode();
		}
	}








	/********** SCRIPT **********/

	/**
	* Initialise la classe
	*
	* @param void
	* @return void
	*/
	private function init() {

		/* Détermine la page demandée */
		$url = str_replace(BASE, '/', $_SERVER['REQUEST_URI']);
		var_dump($url);
		$page = array_search($url, array_column(unserialize(PAGES), 'url'));
		if (!$page) {
			throw new Exception('Cette page n\'existe pas', 204);
		}
		$this->setPage($page);


		/* Démarre la session */
		$sess_params = session_get_cookie_params();
		session_set_cookie_params($sess_params["lifetime"], BASE, $sess_params["domain"], true, true);
		if (!session_start()) { throw new Exception('La session n\'a pas pu démarré', 501); }





		/*$this->correctPage();

		$this->loadModel('user');  // Charge la classe User
		$user = User::getInstance();
		//$user->setCookie(); // Fixe le cookie

		//$needAuth = needAuth();    // Determine si la page est protégé
		/*if (User::isLoggedIn()) {  // Si l'utilisateur est connecté
		} else {                   // Si l'utilisateur n'est pas connecté
			if ($needAuth) {

			} else {

			}
		}*
		
		// Initialise les variables pages, templates
		$this->doAction();
		// Affiche le template*/





	}








	/********** GETTER **********/

	/**
	* Méthode qui récupère la page
	*
	*
	* @param void
	* @return string page
	*/
	public static function getPage() {
		return $this->page;
	}








	/********** SETTER **********/

	/**
	* Méthode qui fixe la page
	*
	*
	* @param string page
	* @return void
	*/
	public function setPage($page) {
		$this->page = $page;
	}






















































	/**
	* Méthode qui corrige l'url (slash de fin)
	*
	*
	* @param void
	* @return void
	*/
	public static function correctPage() {
		$url = str_replace(BASE, '/', $_SERVER['REQUEST_URI']);
		if (substr($url, -1)=='/'&&$url!='/') {
			$new_url = substr($url, 0, -1);
			header("Location: ".$new_url, true, 301);
			exit;
		}
	}



/**********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/



	/**
	* Méthode qui charge un modele
	*
	*
	* @param void
	* @return Singleton
	*/
	public static function loadModel($class) {
		if (in_array($class, self::MODELS)) {
			if (!@include_once('modele/'.$class.'.class.php')) {
				throw new Exception('Modèle non trouvé', 201);
			}
		} else {
			throw new Exception('Modèle non accepté', 203);
		}
	}

	/**
	* Méthode qui dit si la page est protégé
	*
	*
	* @param void
	* @return booleen Protégé ou non
	*/
	public static function needAuth() {
		if (isset($this->page)) {
			return in_array($this->page, PRIVATES);
		} else {
			throw new Exception('Constructor::page non définie', 301);
		}
	}

	/**
	* Méthode qui dit quel template nous devons utiliser
	*
	*
	* @param string $page Le slug de la page
	* @return string Le slug du template
	*/
	public static function whichTemplate() {
		// En fonction de la page et des paramètres $_GET ou $_POST... détermine quel template(s) doit être utilisé(s)
	}

	/**
	* Méthode qui charge le template correspondant
	*
	*
	* @param void
	* @return html Le code html
	*/
	public static function getTemplate() {
		// Récupère le template
	}

	/**
	* Méthode qui execute le modèle correspondant
	*
	*
	* @param void
	* @return void
	*/
	public static function doAction() {
		// En fonction de la page demandé et des autorisations (loggé ou non) charge les différentes classes et effectue les modifications
		// Si erreur, throw new Exception
	}

	/**
	* Méthode qui affiche le code html
	*
	* @param int $code Le code HTTP
	* @param string $html Le code html de la page
	* @return void
	*/
	public static function HTTPrequest($code, $html) {
		// Envoie la réponse et le code
	}










































}
$constructor = Constructor::getInstance();
