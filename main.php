<?php

/*
if (defined('PROCESSING')) { die('You shall not pass !'); }
else { define('PROCESSING', true); }

require_once './app/init.php';
init();

require_once './modules/front.php';
*/



abstract class MODULE
{
	public final function __call($method, $parameters) {
		var_dump($method);
		var_dump($parameters);
	}
}

class Helpers extends MODULE
{
	private function test() {
		echo "hello world";
	}
}

class Front extends MODULE
{
	private function plouf() {
		$h = new Helpers();
		$h->test();
		Helpers::test();
	}
}

function init() {
	Front::plouf();
}

init();