<?php
/*$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, strpos($_SERVER["SERVER_PROTOCOL"], '/')));
$protocol = $_SERVER['HTTPS'] ? 'https' : $protocol;
$hostname = $_SERVER["HTTP_HOST"];
//define(PROJECT, $protocol . '://' . $hostname . '/');
//define(ADMIN, $protocol . '://' . $hostname . '/admin');*/

define('HOST', 'localhost');
define('DBNAME', 'kodigo');
define('USERNAME', 'root');
define('PASSWORD', '');
/*
define(HOSTPROD, '');
define(DBNAMEPROD, '');
define(USERNAMEPROD, '');
define(PASSWORDPROD, '');*/