<?php

namespace CoreApp;
use \PDO;

	class Database extends PDO {

	    protected $PDO;
	    private $config;

		public function __construct() {
			$this->config = AppConfig::dbConfig();
			return;
		}

		public function PDOConnection() {
			if($this->PDO == null)
			{
				$pdo = $this->config->DB_TYPE.":host=". $this->config->DB_HOST.";port=.".$this->config->DB_PORT.";dbname=".$this->config->DB_NAME;

				try {
					$this->PDO = new \PDO($pdo, $this->config->DB_USER, $this->config->DB_PASS);
				}
				catch(Exception $ex) {
					echo "Cannot connect to the db: ";
					print_r($ex);
				}

			}
      return $this->PDO;
		}

		public function PDOClose() {
			$this->PDO = null;
			return null;
    }

	}
