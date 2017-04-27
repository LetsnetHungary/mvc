<?php
namespace CoreApp;
	class Session {
		public static function init() {
			@session_start();
		}

		public static function set($key, $value) {
			$_SESSION[$key] = $value;
		}

		public static function get($key) {
			if (isset($_SESSION[$key])) {
        return $_SESSION[$key];
      }
      else
      {
    		return false;
      }
		}

		public static function unnset($key) {
			session_unset($_SESSION[$key]);
		}

		public static function destroy() {
			session_destroy();
    }

		public static function setArray($array) {
			if(is_object($array)) {
				foreach ($array as $key => $value) {
					self::set($key, $value);
				}
			}
			else {
				$c_array = count($array);
				for($i = 0; $i < $c_array; $i++) {
					echo "ilyet még nem tudunk";
				}
			}
		}

	}
