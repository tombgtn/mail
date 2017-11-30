<?php

/*require_once 'app/module.php';

new __MODULE('Helpers',    'modules/helpers.php',    array('Models','Views','Front','Controller'), array('all'), array('all') );
new __MODULE('Models',     'modules/models.php',     array('Controller','Helpers'),                array('all'), array('all') );
new __MODULE('Views',      'modules/views.php',      array('Controller','Helpers'),                array('all'), array('all') );
new __MODULE('Controller', 'modules/controller.php', array('Models','Views','Front','Helpers'),    array('all'), array('all') );
new __MODULE('Front',      'modules/front.php',      array('Controller','Helpers','__SCRIPT'),                array('all'), array('all') );

Front::init('__SCRIPT');

require_once 'modules/front.php';
$front = new Front();*/




########## MODULE.PHP ###########

//require_once 'app/module.php';
//require_once 'modules/front.php';


class Module {

	private static $_MODULES = array(); // Liste des modules créés
	private static $_LOADED = array();  // Liste des modules déjà chargés

	private $_NAME = '';                // Nom du module
	private $_FILE = '';                // URL du fichier du module
	private $_RESTRICT = array();       // Liste des modules avec qui il peut communiquer
	private $_IN = array();             // Type des variables pouvant être entrés dans ce module
	private $_OUT = array();            // Type des variables pouvant être sortis de ce module (string, int, object, array, object from class, all)

	private function __construct($name, $file, $dependencies, $in, $out) {
		require_once $file;
		return new $name();
	}

	public static function create($name, $file, $dependencies, $in, $out) {
		// Si $file existe
			// 
		$_MODULES[] = new Module($name, $file, $dependencies, $in, $out);
	}

	public final function load() {
		// Charge le fichier du module si ce n'est pas encore fait
		// Ajoute le module à $_LOADED
	}

	public static final function find($module) {
		// Renvoie un objet __MODULE contenu dans $_MODULES avec comme name $module, ou false si pas de modules trouvés
		return false;
	}

	public final function __get($property) {
		// Lors d'un appel du type $controller->variable [OUT, DEPENDENCIES]
		return false;
	}

	public final function __set($property, $value) {
		// Lors d'un appel du type $controller->variable='test' [IN, DEPENDENCIES]
		return false;
	}

	public final function __call($method, $parameters) {
		var_dump($parameters);
		return false;
		if (in_array($parameters[0], $this->_RESTRICT)) {
			array_shift($parameters);
			return call_user_func_array(array($this, $method), $parameters);
		}
		return false;
	}

}




Module::create( 'Front', 'modules/front.php', array('Controller','Helpers','__SCRIPT'), array('all'), array('all') );
$front = new Front();





spl_autoload_register(function($class) {
	if (is_subclass_of($class, 'Module', true)) {
		# code...
	} else {
		throw new Exception("Error Processing Request", 1);
	}	
});