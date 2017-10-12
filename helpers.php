<?php

function hash_password($str) {
	$salt = random_int(1,9);
	$pass = constant('SALT_'.$salt).$str;
	return password_hash($pass, PASSWORD_DEFAULT).$salt;
}

function generate_salt() {
	$sizes = 47;
	$characters = array("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","$","|","#","/",">","?","[","]","\\","<","`"," ","{","}","(",")","+","!","^","-","&",":","*","~",".",",","_","=","@","%",";");
	for($i=0;$i<$size;$i++) { $salt .= $characters[array_rand($characters)]; }
	return $salt;
}