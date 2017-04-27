<?php
ini_set('display_errors', 1);
error_reporting(-1);

require_once("vendor/autoload.php");

$timezone = CoreApp\AppConfig::getTimeZone();
date_default_timezone_set($timezone);

//$analytics = new CoreApp\Controller\Analytics();

//FRONTCONTROLLER

$url = isset($_GET["url"]) ? $_GET["url"] : "Index";

$app = new CoreApp\App($url);
$app->build();
