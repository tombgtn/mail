<?php

/**
* 
*/
class Module {

	private static $_MODULES = array(); // Liste des modules créés
	private static $_LOADED = array();  // Liste des modules chargés

	private $_NAME = '';                // Nom du module
	private $_FILE = '';                // URL du fichier du module
	private $_DEPENDENCIES = array();   // Liste des dépendances du modules (autre modules nécessaire)
	private $_LINKS = array();          // Liste des autres modules avec qui il peut communique
	private $_IN = array();             // Type des variables pouvant être entrés dans ce module
	private $_OUT = array();            // Type des variables pouvant être sortis de ce module (string, int, object, array, object from class, all)
	
	/**
	* 
	* 
	* @param string $nom, string $file, array $dependencies, array $links, array $in, array $out
	*/
	public function __construct($nom, $file, $dependencies, $links, $in, $out) {
		# code...
	}

	/**
	* Inclut le fichier de module et ses dépendances
	*/
	final public function load() {
		// Parcours les dépendances, si elles sont créées et pas encore chargées, les charge.
		// Si une dépendances n'a pas pu être chargées (n'existe pas dans $_MODULES ou le fichier n'existe pas), FATAL ERROR
	}

	/**
	* Inclut le fichier de module et ses dépendances
	*/
	final public function out($to, $obj) {
		# code...
	}
}

$example0 = new Module(
	'Helpers',
	'app/helper.php',
	array(),
	array('Controller','Modele','Vue','Front'),
	array('all'),
	array('all')
);

$example1 = new Module(
	'Front',
	'index.php',
	array('Helpers'),
	array('Controller'),
	array(),
	array('string')
);

$example2 = new Module(
	'Controller',
	'app/controller.php',
	array('Helpers'),
	array('Modele','Vue','Front'),
	array(),
	array('string')
);

$example2 = new Module(
	'Modele',
	'app/modele.php',
	array('Helpers'),
	array('Controller'),
	array(),
	array()
);

