<?php
    class Shop_API_Model extends CoreApp\Model {
      public function __construct() {
          parent::__construct();
      }
      public function getShop($id) {
          $db = CoreApp\DB::init(CoreApp\AppConfig::getData("database=>webshoplap"));
          $stmt = $db>prepare('SELECT name, adress, phone FROM `shops` WHERE id='.$id);
          $stmt->execute(array());
          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
          echo(json_encode($result));
          return;
      }
    }