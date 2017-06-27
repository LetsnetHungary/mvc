<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require("Router.php");
$r = new Router();
$r->getRoute(isset($_GET["url"]) ? $_GET["url"] : "Index");