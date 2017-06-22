<?php

namespace CoreApp;

	abstract class Model {

		protected $apiProtection;

		public function __construct() {
			$this->apiProtection = true;
		}

		protected function setApiProtection($protection) {
			if($protection == "protected") {
				$this->apiProtection = TRUE;
			}
			return;
		}

		public function __call($method, $args) {
			if($this->apiProtection) {
				echo "ajhsdvf";
				die();
			}
		}

	}
