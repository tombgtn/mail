<?php

require_once('modele/bdd.class.php');
require_once('modele/user.class.php');
require_once('modele/mails.class.php');
require_once('modele/mail.class.php');

try {
	$bdd = BDD::getInstance();
	$constructor = new Constructor();
} catch (Exception $e) {
	echo "Error : ".$e->getMessage();
}