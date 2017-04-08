<?php


$site = $_GET["url"];

$configjson = json_decode(file_get_contents("_resources/$site.json"));
require("_views/_includes/_header.php");
require "_views/$site/index.php";
require("_views/_includes/_footer.php");
