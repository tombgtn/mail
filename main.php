<?php

//error_reporting(E_ERROR | E_CORE_ERROR);
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

	/**
	* Liste des templates demandée
	* 
	* @var array
	* @access private
	* @static
	*/
	private static $templates = null;








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
			$this->setConfig();
			$this->init();
		} catch (Exception $e) {
			echo "Message : " . $e->getMessage().'<br/>';
			echo "Code : " . $e->getCode();
		}
	}








	/********** SCRIPT **********/

	/**
	* Charge la page des erreurs (errors.php)
	*
	* @param void
	* @return void
	*/
	private function setErrors() {
		if (!include_once('./core/errors.php')) { throw new Exception('Fichier d\'erreur manquant', 131); }
		return true;
	}

	/**
	* Charge la page des fonctions primaires (functions.php)
	*
	* @param void
	* @return void
	*/
	private function setFunctions() {
		if (!@include_once('./core/functions.php')) { throw new Exception('Fichier de fonctions manquant', 131); }
		return true;
	}

	/**
	* Charge la config et verifie que tout est ok
	*
	* @param void
	* @return void
	*/
	private function setConfig() {
		if (!@include_once('.config')) { throw new Exception('Fichier de configuration manquant', 131); }
		if (!defined('BASE')) { define('BASE', '/'); }
		set_include_path(BASE);

		$this->setErrors();
		$this->setFunctions();

		if (!defined('SQL_BASE')) { throw new Exception('La Constante SQL_BASE n\'existe pas', 158); }
		if (!defined('SQL_USER')) { throw new Exception('La Constante SQL_USER n\'existe pas', 154); }
		if (!defined('SQL_PASS')) { throw new Exception('La Constante SQL_PASS n\'existe pas', 156); }
		if (!defined('SQL_HOST')) { throw new Exception('La Constante SQL_HOST n\'existe pas', 152); }
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
		$full_url = $_SERVER['REQUEST_URI'];
		$url = str_replace(BASE, '/', $full_url);
		$page = array_search_key(PAGES, 'url', $url);
		if (!$page) {
			/* Si la page demandée n'existe pas, cherche une alternative (avec ou sans slash) */
			$alt_full_url = alternative_url($full_url);
			$alt_url = str_replace(BASE, '/', $alt_full_url);
			$alt_page = array_search_key(PAGES, 'url', $alt_url);
			if (!$alt_page) { throw new Exception('Cette page n\'existe pas', 210); /* Si l'alternative n'existe pas : 404 */ }
			else { redirect($alt_full_url, 301); /* Si l'alternative existe : redirection */ }
		}
		$this->setPage($page);


		/* Démarre la session */
		$sess_params = session_get_cookie_params();
		session_set_cookie_params($sess_params["lifetime"], BASE, $sess_params["domain"], true, true);
		if (!session_start()) { throw new Exception('La session n\'a pas pu démarré', 172); }


		/* Enregistre le template par défaut */
		if (isset(PAGES[$page]['templates'])) { $this->setTemplate(PAGES[$page]['templates']); }
		

		/* Execute les actions de la page */
		if (isset(PAGES[$page]['action'])) {
			if (is_string(PAGES[$page]['action'])&&function_exists(PAGES[$page]['action'])) {
				//PAGES[$page]['action']();
			} else if (is_array(PAGES[$page]['action'])) {
				/*
				load model
				execute model::fucntion
				*/
			}
		}
		

		/* Affiche les templates enregistrés */
		/* Les templates ($this->templates) ont pu être modifiés durant l'action (ex: login erreur/succes) */
		if (isset($this->templates)) {
			
		} else {
			throw new Exception('Aucun template(s) définie(-nt)', 141);
		}

		echo 'URL : '.$url.'<br/>';
		echo 'This:page : '.$this->page.'<br/>';
		echo 'This:templates : '.implode(', ', $this->templates);
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

	/**
	* Méthode qui récupère les templates
	*
	*
	* @param void
	* @return string page
	*/
	public static function getTemplate() {
		return $this->templates;
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
	* Méthode qui fixe le template
	*
	*
	* @param string template
	* @return void
	*/
	public function setTemplate($templates) {
		if (template_exist($templates)) {
			if (is_string($templates)) { $templates = array($templates); }
			$this->templates = $templates;
		} else {
			throw new Exception('Un ou plusieurs templates n\'existe pas', 142);	
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
				throw new Exception('Modèle non trouvé', 132);
			}
		} else {
			throw new Exception('Modèle non accepté', 134);
		}
	}

	/**
	* Méthode qui charge le template correspondant
	*
	*
	* @param void
	* @return html Le code html
	*/
	public static function loadTemplate() {
		// Récupère le template
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
$main = Constructor::getInstance();
