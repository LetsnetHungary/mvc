<?php
namespace CoreApp;
	class InnerController extends Controller {

		public function __construct($objectname) {
			$this->model = $this->loadModel($objectname);
		}
	}
