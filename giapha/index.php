<?php
session_start();
ini_set('memory_limit', '1024M');
$_SERVER['URL_SERVER'] = "http://localhost/mvc";
require_once "./mvc/Bridge.php";
(new App())
?>