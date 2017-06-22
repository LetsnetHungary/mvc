<?php

	/**
	* Letsnet - App
	*
	* @author Letsnet <info@letsnet.hu>
	* @version 0.1
	* @category CoreApp File
	* @uses CoreApp namespace
	*
	*/

	namespace CoreApp;

	class App {

		/**
		* @param string $url contains the routing data (controller/method/function)
		*/

		public function __construct($url) {
			$this->routes = Router::getRoutes($url);
		}

		/* application build, setting up the controller, perform the method with parameter */

		public function build() {
			Router::build($this->routes);
		}

		/* end App CLASS */
	}
