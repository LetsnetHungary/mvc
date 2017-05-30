<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("vendor/autoload.php");

define("APPCONFIG", "development");
// 'letsnet', 'serverlocal', 'fkinglocal'
define("SERVER", "fkinglocal");

CoreApp\ServerHandler::sitekey();

date_default_timezone_set(CoreApp\AppConfig::getData("timezone"));
CoreApp\Session::init();

$url = isset($_GET["url"]) ? $_GET["url"] : "Index";

$app = new CoreApp\App($url);
$app->build();
