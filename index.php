<?php

require_once('modele/bdd.class.php');
require_once('modele/mails.class.php');
require_once('modele/mail.class.php');

try {
	BDD::getInstance();
} catch (Exception $e) {
	echo "Error : ".$e->getMessage();
}