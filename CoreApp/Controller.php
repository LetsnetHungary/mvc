<?php

namespace CoreApp;
use \CoreApp\Model;

	abstract class Controller {

		public $model;

		protected function ClassName($class) {
			return substr(strrchr($class, "\\"), 1);
		}

		protected function loadModel($objectname) {
			$modelName = $objectname.'_Model';
			$modelFileName = "App/_models/$modelName.php";
			$coreAppModelFileName = "CoreApp/_models/$modelName.php";

			if(file_exists($modelFileName)) {
				require $modelFileName;
				$this->modelDidLoad();
				return new $modelName();;
			}
			else if(file_exists($coreAppModelFileName)){
				require($coreAppModelFileName);
				$m = "CoreApp\Model\\".$modelName;
				//$this->modelDidLoad();
				return new $m();
			}
			else {
				$this->model = null;
			}
		}

		protected function modelDidLoad() {

		}
	}
