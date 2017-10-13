<?php

error_reporting(E_ERROR | E_CORE_ERROR);
if (!defined('MASTER')) { define('MASTER', true); }

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
		try {
			$this->setFunctions();
			$this->setConfig();
			$this->init();
		} catch (Exception $e) {
			echo "Message : " . $e->getMessage().'<br/>';
			echo "Code : " . $e->getCode();
		}
	}








	/********** SCRIPT **********/

	/**
	* Charge la page des fonctions primaires (helpers)
	*
	* @param void
	* @return void
	*/
	private function setFunctions() {
		if (!@include_once('helpers.php')) { throw new Exception('Fichier de fonctions non trouvé', 201); }
		return true;
	}

	/**
	* Charge la config et verifie que tout est ok
	*
	* @param void
	* @return void
	*/
	private function setConfig() {
		if (!@include_once('.config')) { throw new Exception('Fichier de configuration non trouvé', 201); }
		if (!defined('BASE')) { define('BASE', '/'); }
		if (!defined('SQL_BASE')) { throw new Exception('La Constante SQL_BASE n\'existe pas', 504); }
		if (!defined('SQL_USER')) { throw new Exception('La Constante SQL_USER n\'existe pas', 504); }
		if (!defined('SQL_PASS')) { throw new Exception('La Constante SQL_PASS n\'existe pas', 504); }
		if (!defined('SQL_HOST')) { throw new Exception('La Constante SQL_HOST n\'existe pas', 504); }
		if (!defined('SQL_CHAR')) { define('SQL_CHAR', 'utf8'); }
		if (!defined('SALT_1')) { define('SALT_1', generate_salt()); }
		if (!defined('SALT_2')) { define('SALT_2', generate_salt()); }
		if (!defined('SALT_3')) { define('SALT_3', generate_salt()); }
		if (!defined('SALT_4')) { define('SALT_4', generate_salt()); }
		if (!defined('SALT_5')) { define('SALT_5', generate_salt()); }
		if (!defined('SALT_6')) { define('SALT_6', generate_salt()); }
		if (!defined('SALT_7')) { define('SALT_7', generate_salt()); }
		if (!defined('SALT_8')) { define('SALT_8', generate_salt()); }
		if (!defined('SALT_9')) { define('SALT_9', generate_salt()); }
		if (!defined('SESS_DUREE')) { define('SESS_DUREE', 1296000); }
		if (!defined('DEBUG')) { define('DEBUG', 0); }
	}

	/**
	* Initialise la classe
	*
	* @param void
	* @return void
	*/
	private function init() {

		/* Détermine la page demandée */
		$url = str_replace(BASE, '/', $_SERVER['REQUEST_URI']);
		$page = array_search($url, array_column(PAGES, 'url'));
		if (!$page) {
			/* Si la page demandée n'existe pas, cherche une alternative (avec ou sans slash) */
			$alt_url = alternative_url($url);
			$alt_page = array_search($alt_url, array_column(PAGES, 'url'));
			if (!$alt_page) {
				/* Si l'alternative n'existe pas : 404 */
				throw new Exception('Cette page n\'existe pas', 204);
			} else {
				/* Si l'alternative existe : redirection */
				redirect($alt_url, 301);
			}
		}
		$this->setPage($page);
		var_dump($url);
		var_dump($page);


		/* Démarre la session */
		$sess_params = session_get_cookie_params();
		session_set_cookie_params($sess_params["lifetime"], BASE, $sess_params["domain"], true, true);
		if (!session_start()) { throw new Exception('La session n\'a pas pu démarré', 501); }


		/* Execute les actions de la page */
		if (isset(PAGES[$page]['action'])) {
			if (is_string(PAGES[$page]['action'])&&function_exists(PAGES[$page]['action'])) {
				PAGES[$page]['action']();
			} else if (is_array(PAGES[$page]['action'])) {
				/*
				load model
				*/
			}
		}
		

		/* Affiche les templates de la page */
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
