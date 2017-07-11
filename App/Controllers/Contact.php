<?php
	class Contact extends CoreApp\Controller {

		public function __construct() {
			parent::__construct(__CLASS__);
			$this->viewInit("Contact");
		}
    }