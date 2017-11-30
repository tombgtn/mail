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




























abstract class _MODULE {

/*	private $_LINKSTO = array();        // Liste des modules avec qui il peut communiquer
	private $_IN = array();             // Type des variables pouvant être entrés dans ce module
	private $_OUT = array();            // Type des variables pouvant être sortis de ce module (string, int, object, array, object from class, all)

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
	}*/

}



//linksto Controller

class Front extends _MODULE
{
	function __construct() {}
}


function __autoloader($class) {
	if (is_subclass_of($class, '_MODULE', true)) {
		echo $class." is a subclass of __MODULE";
	} else {
		echo $class." is not a subclass of __MODULE";
	}	
}

spl_autoload_register('__autoloader');

$front = new Front();
