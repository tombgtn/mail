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
	* Constante: modeles possibles
	*
	* @var array
	*/
	const MODELS = array('bdd', 'mail', 'mails', 'user');
 
	/**
	* Constante: niveau de l'affichage des erreurs
	* 0 : Affiche juste Erreur 500
	* 1 : Affiche le domaine de l'erreur (Erreur BDD, Erreur Fichier,...)
	* 2 : Affiche le status de l'erreur tel montré dans le fichier erreur.php
	* 3 : Affiche le message d'erreur de l'exception
	*
	* @var int
	*/
	const ERROR_DISPLAY = 3;
	
	/**
	* Slug de la page demandée
	* 
	* @var string
	* @access private
	* @static
	*/
	private static $page;
	
	/**
	* Slug du template de la page demandée
	* 
	* @var string
	* @access private
	* @static
	*/
	private static $template;

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
			$this->init();
		} catch (Exception $e) {
			echo "Message : " . $e->getMessage();
			echo "Code : " . $e->getCode();
		}
	}

	/**
	* Initialise la classe
	*
	* @param void
	* @return void
	*/
	private function init() {
		$this->loadModel('user');
		// Initialise les variables pages, templates
		$this->doAction();
		// Affiche le template
	}

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
				throw new Exception ('Modèle non trouvé', 201);
			}
		} else {
			throw new Exception ('Modèle non accepté', 203);
		}
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
	public static function whichTemplate() {
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
error_reporting(0);
$constructor = Constructor::getInstance();