<?php
    class Index_Model extends CoreApp\Model {
      public function __construct() {
          parent::__construct();
      }
      public function getShops() {
          $db = CoreApp\DB::init(CoreApp\AppConfig::getData("database=>webshoplap"));
          $shops = array();
          $stmt = $db->prepare('SELECT * FROM `categories`');
          $stmt->execute(array());
          $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
          foreach ($categories as $cat) {
            $stmt = $db->prepare('SELECT name, id FROM `shops` WHERE category= :id ORDER BY RAND() LIMIT 5');
            $stmt->execute([
                ":id" => $cat["id"]
            ]);
            $shop = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $shops[$cat["name"]] = $shop;
          }
          return $shops;
      }
    }