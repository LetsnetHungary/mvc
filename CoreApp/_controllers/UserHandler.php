<?php

namespace CoreApp\Controller;
use \CoreApp;

	class UserHandler extends CoreApp\InnerController {

		/* - Constructor -- main CoreApp InnerController --  - */

		public function __construct() {
		    parent::__construct($this->ClassName(__CLASS__));
		}

		/* - User SESSIONS block - */

		public function UserSessions($c) {
			return $this->getUserSessions($c);
		}

		private function getUserSessions($c) {
			return $this->model->getUserSessions($c);
		}

		/* - User MODULES block - */

    public function Modules() {
      return $this->getModules();
    }

		private function getModules() {
			return $this->model->getModules();
		}

    public function getData() {
      return $this->model->getUserData();
    }

		public function getPageModules($view) {
			return $this->model->getPageModules($view);
		}

		public function logout() {
			$this->model->logout();
		}

		/*
		public function modelDidLoad()
		{
			echo "model loaded <br>";
		}
		*/
	}
