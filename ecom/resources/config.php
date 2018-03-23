<?php
ob_start(); // for output buffering
session_start();
//session_destroy();

defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
//echo (__DIR__);
//echo (__FILE__);
defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT", __DIR__ . DS . "templates\\front");
defined("TEMPLATE_BACK") ? null : define("TEMPLATE_BACK", __DIR__ . DS . "templates\\back");
//echo (TEMPLATE_FRONT);
defined("DB_HOST") ? null : define("DB_HOST", "localhost");
defined("DB_USER") ? null : define("DB_USER", "Swapnil");
defined("DB_PASS") ? null : define("DB_PASS", "swapnil");
defined("DB_NAME") ? null : define("DB_NAME", "ecom_db");

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

require_once("functions.php")


 ?>
