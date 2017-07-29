<?php
	class Index extends CoreApp\Controller {
		
		public function __construct() {
			parent::__construct(__CLASS__);
			$this->loadModel(__CLASS__);
			$this->viewInit("Index", function() {
				$this->view->shops = $this->model->getShops();
			});
		}
	}