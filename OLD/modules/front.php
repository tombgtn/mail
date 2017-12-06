<?php

class Front extends __MODULE
{
	static function init($app) {
		// Protection des variables
		$c = new Controller();
		$c->init(__CLASS__);
	}
}