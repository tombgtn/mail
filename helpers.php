<?php

function hash_password($str) {
	$salt = random_int(1,9);
	$pass = constant('SALT_'.$salt).$str;
	return password_hash($pass, PASSWORD_DEFAULT).$salt;
}