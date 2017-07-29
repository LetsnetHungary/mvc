<?php
	class Shop_Model extends CoreApp\Model
	{
		public function __construct()
		{
			parent::__construct();
            $this->db = CoreApp\DB::init(CoreApp\AppConfig::getData("database=>webshoplap"));

		}
        public function getLabels($id) {
                $stmt = $this->db->prepare('SELECT name FROM `labels` WHERE shop='.$id);
                $stmt->execute(array());
                $labels = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $labels;
        }
        public function getShop() {
            if(isset($_GET['id'])) {
                $id = $_GET["id"];
                $stmt = $this->db->prepare('SELECT name,adress,phone,bio FROM `shops` WHERE id='.$id);
                $stmt->execute(array());
                $shop = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $shop = $shop[0];
                $shop["labels"] = $this->getLabels($id);
            } else {
                $shop = array("name" => "aaaaaaa", "phone" => "00-00-000-0000", "bio" => "", "adress" => "www.aaa.aaa");
            }
            return $shop;
        }
	}
