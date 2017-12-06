<?php

/**
* 
*/
class Module
{

	private static $_modules = array();
	
	function __construct($nom, $fichier, $in, $out)
	{
		# code...
	}
}

/**
* 
*/
class Controller extends Module
{
	
	function __construct(argument)
	{
		# code...
	}
}


$controller = new Controller();
new Module( 'Vue', 'app/vue.class.php', STRING|ARRAY|INT|OBJECT, HTML);