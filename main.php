<?php


if (defined('PROCESSING')) { die('You shall not pass !'); }
else { define('PROCESSING', true); }

require_once './app/init.php';
init();

require_once './modules/front.php';


