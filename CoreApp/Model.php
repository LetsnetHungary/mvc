<?php

namespace CoreApp;

	class Model {

		protected $db;

		public function __construct()	{
			$d = new Database();
			$this->db = $d->PDOConnection();
			unset($this->d);
			$this->db->exec("set names utf8");
		}
	}
