<?php
define('_SERVER_NAME', 'localhost'); //bledny port wiec trzeba usunac, defaultowy to 80 wiec mozna napisac :80 lub  nic
define('_SERVER_URL', 'http://'._SERVER_NAME);
define('_APP_ROOT', '/php_01_widok_kontroler');
define('_APP_URL', _SERVER_URL._APP_ROOT);
define("_ROOT_PATH", dirname(__FILE__));
?>