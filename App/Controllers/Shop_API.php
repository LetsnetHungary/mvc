<?php
    class Shop_API extends CoreApp\Controller {
        public function __construct() {
            parent::__construct(__CLASS__);
			$this->loadModel(__CLASS__);
        }
        public function getShop() {
          $id = $_POST["id"];
          return $this->model->getShop($id);
        }
    }