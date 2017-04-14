<?php

namespace CoreApp;

	class AppConfig {

        private static $appconfigfile = "App/_config/_appconfig.json";

				public $AppConfig = array(

					"appname" => "Letset",
					"author" => "Hegel Ákos",
					"version" => 2.0

				);

				private static function getConfigFile() {
            $config = file_get_contents(self::$appconfigfile);
            $config = json_decode($config);
            return($config);
        }

				public static function getDB($db) {
					$config = self::getConfigFile();
					return($config->database->$db);
				}

        public static function dbConfig() {
            $config = self::getConfigFile();
            return($config->database->basic);
        }

        public static function getVisitorsDB() {
            $config = self::getConfigFile();
            return($config->database->visitorsDB);
        }

				public static function getAuthenticationDB() {
            $config = self::getConfigFile();
            return($config->database->autchenticationDB);
        }

				public static function getCMSDB() {
            $config = self::getConfigFile();
            return($config->database->cmsDB);
        }

				public static function getWebpageDB() {
            $config = self::getConfigFile();
            return($config->database->webpageDB);
        }

        public static function getFirstPage() {
            $config = self::getConfigFile();
            return($config->firstpage);
        }

        public static function getAuthentication() {
            $config = file_get_contents("App/_config/_appconfig.json");
            $config = json_decode($config);
            return($config->authentication);
        }

        public static function pregmatch($type) {
            $config = self::getConfigFile();
            if($type == "special") {
                //return($config->pregmatchspecial);
            }
        }

        public static function getTimeZone() {
            $config = self::getConfigFile();
            return($config->timezone);
        }

        public static function getConfigDB() {
            $config = self::getConfigFile();
            return($config->database->configDB);
        }

				public static function getDebug() {
            	return false;
        }
	}
