<?php
	class Category extends CoreApp\Controller {
		
		public function __construct() {
			parent::__construct(__CLASS__);
			$this->viewInit("Category");
		}
	}
