<?php
if (!defined('MASTER')) { die('You shall not pass !'); }

function hash_password($str, $salt=null) {
	if (!isset($salt)||!is_int($salt)||$salt>9||$salt<1||in_array($salt, array(1,2,3,4,5,6,7,8,9))) { $salt = random_int(1,9); }
	$pass = constant('SALT_'.$salt).$str;
	return password_hash($pass, PASSWORD_DEFAULT).$salt;
}

function generate_salt() {
	$sizes = 47;
	$characters = array("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","$","|","#","/",">","?","[","]","\\","<","`"," ","{","}","(",")","+","!","^","-","&",":","*","~",".",",","_","=","@","%",";");
	for($i=0;$i<$size;$i++) { $salt .= $characters[array_rand($characters)]; }
	return $salt;
}

function redirect($url, $code=302) {
	if (!in_array($code, array(301,302))) { $code = 302; }
	header("Location: ".$url, true, $code);
}

function alternative_url($url) {
	if (substr($url, -1)=='/'&&$url!='/') { return substr($url, 0, -1); } // Enlève le slash
	if (substr($url, -1)!='/')            { return $url.'/'; } // Ajoute le slash
}

function array_search_key($a, $k, $s) { return array_search($s,array_filter(array_combine(array_keys($a),array_column($a, $k)))); }

function template_exist($template) {
	if (is_string($template)) {
		/* Determine si le template existe dans le dossier templates */
		return true;
	} else if (is_array($template)) {
		/* Determine si les templates existent dans le dossier templates */
		return true;
	}
	return false;
}

function sanitize_var($var) {
	return $var;
}