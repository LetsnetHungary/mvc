<?php

namespace CoreApp;

	class ServerHandler {

		public static function curlEnding() {
			if(SERVER == 'fkinglocal') {
				return ":8080";
			}
			else if(SERVER == 'letsnet' OR SERVER == 'serverlocal') {
				return ".hu";
			}
			else {
				return "";
			}
		}

		public static function sitekey() {
			if(SERVER == 'serverlocal') {
				Session::set("sitekey", "graphed");
			}
		}
	}
