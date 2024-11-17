<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'].'/web2/');

define('SITE_ROOT', 'http://localhost/web2/');

require_once(SERVER_ROOT . 'controllers/' . 'router.php');

?>