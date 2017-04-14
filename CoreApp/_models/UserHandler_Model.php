<?php

namespace CoreApp\Model;
use \CoreApp;
use \PDO;

	class UserHandler_Model extends CoreApp\Model {

		public function __construct() {
			parent::__construct();
		}

		public function getUserSessions($c) {
			if(empty($c)) {
				return null;
			}
			else {
				$sessions = array();
				$c_s = count($c);
				for($i = 0; $i < $c_s; $i++) {
					$sessions[$c[$i]] = \CoreApp\Session::get($c[$i]);
				}
				return $sessions;
			}
		}

		public function getUserData() {
			$stmt = $this->db->prepare("SELECT userData.firstname, userData.lastname, userData.shopname, userData.status FROM userData INNER JOIN users ON (users.uniquekey = userData.uniquekey) WHERE users.email = :email");
			$stmt->execute(array(
				":email" => $this->logged_user
			));
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return($result[0]);
		}

		public function getModules() {
			$this->db->exec("use letsneth_modules");
			$stmt = $this->db->prepare("SELECT pages.name, pages.redirect, pages.lmodule FROM pages WHERE pages.uniquekey = :uniquekey OR pages.allow = :allow AND sitekey = :sitekey");

			$stmt->execute(array(
				":uniquekey" => \CoreApp\User::UniqueKey(),
				":allow" => \CoreApp\User::Allow(),
				":sitekey" => \CoreApp\User::SiteKey()
			));
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $result[0];
		}

		public function getPageModules($view) {
			$allow = CoreApp\User::Allow();
			$query = "SELECT littlemodules.module FROM `littlemodules` INNER JOIN users ON (users.uniquekey = littlemodules.uniquekey) WHERE littlemodules.view = :view UNION SELECT littlemodules.module FROM littlemodules WHERE littlemodules.uniquekey = 'ALL' OR littlemodules.uniquekey = '$allow' AND view = :view";

			$stmt = $this->db->prepare($query);
			$stmt->execute(array(
				":view" => $view
			));

			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}

		public function logout() {
			$stmt = $this->db->prepare("DELETE FROM logged_users WHERE devicekey = :dk");
			$stmt->execute(array(
				":dk" => $this->devicekey
			));
			CoreApp\Session::unnset("logged_user");
			CoreApp\Session::unnset("devicekey");
			CoreApp\Session::unnset("webpage");
			CoreApp\Session::unnset("allow");
			return;
		}

	}
