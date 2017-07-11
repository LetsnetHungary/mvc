<?php
	class Shop extends CoreApp\Controller {

		public function __construct() {
			parent::__construct(__CLASS__);
			$this->loadModel(__CLASS__);
			$this->viewInit("Shop", function() {
				$this->view->shop = $this->model->getShop();
			});
		}
	}
