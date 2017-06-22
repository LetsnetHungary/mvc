<?php

namespace CoreApp\Model;

use \CoreApp;
use PDOException;

class Analytics_Model extends CoreApp\DataModel {

    public function __construct() {
        parent::__construct();

        $this->PDO = $this->database->PDOConnection(CoreApp\AppConfig::getData("database=>analyticsDB"));
        $this->database->PDOClose();

        $this->visitpage();
    }

    public function visitpage() {
        $uniquekey = CoreApp\Session::get('uniquekey');
        try {
            $stmt = $this->PDO->prepare("INSERT INTO `visits` (`uniquekey`, `conntime`, `connday`, `url`, `useragent`) VALUES (:uniquekey, :conntime, :connday, :url, :useragent)");
            $stmt->execute(array(
                ":uniquekey" => $uniquekey ? $uniquekey : $_SERVER["REMOTE_ADDR"],
                ":conntime" => time(),
                ":connday" => date("F j, Y, g:i a"),
                ":url" => $_SERVER["REQUEST_URI"],
                ":useragent" => $_SERVER["HTTP_USER_AGENT"]
            ));
        } 
        catch (PDOException $ex) { }
    }
}
