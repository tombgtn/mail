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

	/**
	* Liste des templates demandée
	* 
	* @var array
	* @access private
	* @static
	*/
	private static $templates = null;

	/**
	* Code de retour
	* 
	* @link https://fr.wikipedia.org/wiki/Liste_des_codes_HTTP
	* @var int
	* @access private
	* @static
	*/
	private static $code = null;

	/**
	* Data générée par les actions
	* 
	* @var array/string/object/...
	* @access private
	* @static
	*/
	private static $data = null;

	/**
	* Html généré par le template
	* 
	* @var string
	* @access private
	* @static
	*/
	private static $html = '';








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
		error_reporting(E_ERROR | E_CORE_ERROR);
		if (!defined('MASTER')) { define('MASTER', true); }
		spl_autoload_register('setClass');

		try {
			$this->setErrors();
		} catch (Exception $e) { // Impossibilité  de personnaliser le niveau d'erreur
			echo "Message : Fichier d'erreur et niveau de debug manquant : Impossibilité d'afficher les erreurs<br/>";
		}

		try {
			$this->init();
		} catch (Exception $e) {
			echo "Message : " . $e->getMessage().'<br/>';
			echo "Code : " . $e->getCode();
		}
	}








	/********** SCRIPT **********/

	/**
	* Initialise la classe (programme principal)
	*
	* @param void
	* @return void
	*/
	private function init() {
		$this->setConfig();        /* Charge les fonctions et la config minimum */
		$this->whichPage();        /* Détermine la page demandée */
		$this->defaultTemplate();  /* Enregistre le template par défaut */
		$this->doAction();         /* Execute les actions de la page */
		$this->loadTemplate();     /* Charge les templates enregistrés */
		$this->sendRequest();      /* Envoie la réponse */
	}








	/********** CORE **********/

	/**
	* Charge la page des erreurs (errors.php)
	*
	* @param void
	* @return void
	*/
	private function setErrors() { if (!include_once('./core/errors.php')) { throw new Exception('Fichier d\'erreur manquant', 131); } $this->setDebug(); }

	/**
	* Charge la page des fonctions primaires (functions.php)
	*
	* @param void
	* @return void
	*/
	private function setFunctions() { if (!@include_once('./core/functions.php')) { throw new Exception('Fichier de fonctions manquant', 131); } }

	/**
	* Charge la classe
	*
	* @param string nom de la classe
	* @return void
	*/
	private function setClass($class) {
		if (!@include_once('./modele/'.strtolower($class).'.class.php')) { throw new Exception('Fichier de classe manquant : classe '.$class, 131); }
	}

	/**
	* Charge la config et et le niveau d'erreur
	*
	* @param void
	* @return void
	*/
	private function setDebug() {
		if (!@include_once('.config')) { throw new Exception('Fichier de configuration manquant', 131); }
		if (!defined('DEBUG')||in_array(DEBUG, array(0,1,2,3))) { define('DEBUG', 0); }
	}

	/**
	* Verifie que la config est bonne
	*
	* @param void
	* @return void
	*/
	private function setConfig() {
		$this->setFunctions();
		
		if (!defined('BASE')) { define('BASE', '/'); }
		set_include_path(BASE);

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
	}

	/**
	* Méthode qui dis sur quelle page on est
	*
	*
	* @param void
	* @return le code de la page
	*/
	private function whichPage() {
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
	}

	/**
	* Méthode qui paramètre le template par défaut
	*
	*
	* @param void
	* @return le code de la page
	*/
	private function defaultTemplate() {
		if (isset(PAGES[$this->getPage()]['templates'])) { $this->setTemplate(PAGES[$this->getPage()]['templates']); }
	}

	/**
	* Méthode qui execute les actions de la page demandée
	*
	*
	* @param void
	* @return resultat de l'action
	*/
	private function doAction() {
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
	}

	/**
	* Méthode qui charge le code html
	*
	*
	* @param void
	* @return string code html du template
	*/
	private function loadTemplate() {
		/* Les templates ($this->templates) ont pu être modifiés durant l'action (ex: login erreur/succes) */
		if (isset($this->getTemplate())) {
			
		} else {
			throw new Exception('Aucun template(s) définie(-nt)', 141);
		}
	}

	/**
	* Méthode qui renvoie la requete avec html et metas
	*
	*
	* @param void
	* @return string code html du template
	*/
	private function sendRequest() {
		//header('');
		echo getHtml();
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
	* @return array templates
	*/
	public static function getTemplate() {
		return $this->templates;
	}

	/**
	* Méthode qui récupère le code HTTP
	*
	*
	* @param void
	* @return string code
	*/
	public static function getCode() {
		return $this->code;
	}

	/**
	* Méthode qui récupère les data
	*
	*
	* @param void
	* @return string/array data
	*/
	public static function getData() {
		return $this->data;
	}

	/**
	* Méthode qui récupère le HTML
	*
	*
	* @param void
	* @return string html
	*/
	public static function getHtml() {
		return $this->html;
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

	/**
	* Méthode qui fixe le code HTTP
	*
	*
	* @param string code
	* @return void
	*/
	public function setCode($code) {
		if (in_array($code, CODE_HTTP)) {
			$this->code = $code;
		} else {
			throw new Exception('Le code HTTP n\'existe pas', 181);	
		}
	}

	/**
	* Méthode qui fixe les data
	*
	*
	* @param string/array data
	* @return void
	*/
	public function setData($data=null) {
		$this->data = $data;
	}

	/**
	* Méthode qui fixe le HTML
	*
	*
	* @param string html
	* @return void
	*/
	public function setHtml($html='') {
		$this->html = $html;
	}

}
$main = Constructor::getInstance();
