<?php
//error_reporting(E_ALL);
ini_set('display_errors', 1);

require "vendor/autoload.php";
require "CoreApp/Enviroment.php";

$app = new CoreApp\App();
$app->startApp();
