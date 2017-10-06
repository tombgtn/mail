<?php
/*
require_once('template/header.php');
require_once('template/menu.php');
require_once('template/liste.php');
require_once('template/mail.php');
require_once('template/footer.php');

require_once('modele/bdd.class.php');
require_once('modele/user.class.php');
require_once('modele/mails.class.php');
require_once('modele/mail.class.php');

*/


class Constructor {
	
	/**
	* Instance de la class Constructor
	* 
	* @var Constructor
	* @access private
	* @static
	*/
	private static $_instance = null;
 
	/**
	* Constante: templates possibles
	*
	* @var array
	*/
	const TEMPLATES = array('header', 'footer', 'liste', 'login', 'mail', 'menu', 'nouveau');
	
	/**
	* Slug de la page demandée
	* 
	* @var string
	* @access private
	* @static
	*/
	private static $page = $this->whichPage();
	
	/**
	* Slug du template de la page demandée
	* 
	* @var string
	* @access private
	* @static
	*/
	private static $template = $this->whichTemplate();

	/**
	* Constructeur de la classe
	*
	* @param void
	* @return void
	*/
	private function __construct() {
		try {
			$this->doAction();
		} catch (Exception $e) {

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
		if(is_null(self::$_instance)) { self::$_instance = new Constructor(); }
		return self::$_instance;
	}

	/**
	* Méthode qui charge le template correspondant
	*
	*
	* @param string $file Le slug du template
	* @return html Le code html
	*/
	public static function getTemplate($file = 'login') {
		// Récupère le template
	}

	/**
	* Méthode qui dit dans quelle page nous sommes
	*
	*
	* @param void
	* @return string Le slug de la page
	*/
	public static function whichPage() {
		// En fonction de l'URL détermine quelle page est demandée
	}

	/**
	* Méthode qui dit quel template nous devons utiliser
	*
	*
	* @param string $page Le slug de la page
	* @return string Le slug du template
	*/
	public static function whichTemplate($page) {
		// En fonction de la page et des paramètres $_GET ou $_POST... détermine quel template(s) doit être utilisé(s)
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
	public static function return($code, $html) {
		// Envoie la réponse et le code
	}
}
$constructor = Constructor::getInstance();