<?php

abstract class __MODULE {

	private static $_MODULES = array(); // Liste des modules créés
	private static $_LOADED = array();  // Liste des modules déjà chargés

	private $_NAME = '';                // Nom du module
	private $_FILE = '';                // URL du fichier du module
	private $_RESTRICT = array();       // Liste des modules avec qui il peut communiquer
	private $_IN = array();             // Type des variables pouvant être entrés dans ce module
	private $_OUT = array();            // Type des variables pouvant être sortis de ce module (string, int, object, array, object from class, all)

	public function __construct($name, $file, $dependencies, $in, $out) {
		// Fixe le nom
		// Verifie si le fichier existe, sinon throw new Exception
		// Fixe les dépendances
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

spl_autoload_register(function($class) {
	$module = __MODULE::find($class);
	if($module) {
		$module->load();
		return true;
	}
	throw new Exception("Error Processing Request", 1);
	
});