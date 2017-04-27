<?php
namespace CoreApp\Model;

  use \CoreApp;
  use \PDO;

  class Authentication_Model extends CoreApp\Model {

      public function __construct() {
          parent::__construct();
          $this->db->exec("use ".CoreApp\AppConfig::getAuthenticationDB());
      }

      public function checkIfUserLoggedIn() {
        CoreApp\Session::init();
        if($loggeduser = CoreApp\Session::get("logged_user") && $devicekey = CoreApp\Session::get("devicekey")) {
          if(!empty($loggeduser)) {
            $stmt = $this->db->prepare("SELECT * FROM logged_users INNER JOIN users ON (logged_users.uniquekey = users.uniquekey) WHERE logged_users.devicekey = :devicekey");
            $stmt->execute(array(
              ":devicekey" => $devicekey
            ));
            if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
              return true;
            }
            else {
              CoreApp\Session::unnset("logged_user");
              CoreApp\Session::unnset("devicekey");
              CoreApp\Session::unnset("webpage");
              CoreApp\Session::unnset("allow");
              CoreApp\Session::unnset("uniquekey");
              $this->deleteUserByDevicekey($devicekey);
              return false;
            }
          }
        }
        else {
          return false;
        }
      }

      public function newAttemptUser($data) {
        //Creating the new Attempt User
        $a = new CoreApp\AttemptUser();

        //Setting it's properties
        $a->aemail = $data["ema"];
        $a->apassword = $data["passw"];
        $a->devicekey = $data["dk"];
        $a->lalo = $data["lalo"];

        //XSS, INJECTION ECT...
        $a->prepareCredentials();

        //return to the attemptuser
        return $a;
      }

      public function deleteUserByDevicekey($devicekey) {
        $stmt = $this->db->prepare("DELETE FROM logged_users WHERE devicekey = :devicekey");
        $stmt->execute(array(
          ":devicekey" => $devicekey
        ));
        return;
      }

      public function loginAttemptUser(CoreApp\AttemptUser $a) {
        if($this->checkIfUserLoggedIn()) {
          $this->response("error", "Már be van jelentkezve!");
        }
        else {
          $stmt = $this->db->prepare("SELECT password, uniquekey, webshopdb, allow FROM users WHERE email = :email");
          $stmt->execute(array(
            ":email" => $a->e
          ));
          if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)){
            if(!password_verify($a->p, $result[0]["password"])) {
              $this->response("error", "Hibás felhasználónév vagy JELSZÓ!");
            }
            if(!$devicename = $this->allowedDevice($result[0]["uniquekey"], $a->devicekey)) {
              $this->response("error", "Nincs ilyen készülék bejegyezve!");
            }

            $this->insertLoggedUser($a, $result[0]["uniquekey"]);

            $this->response("success", "Sikeres bejelentkezés!");
          }
          else {
            $this->response("error", "Hibás FELHASZNÁLÓNÉV vagy jelszó!");
          }
        }
      }

      private function allowedDevice($uk, $dk) {
        $stmt = $this->db->prepare("SELECT devicename FROM devices WHERE uniquekey = :uniquekey AND devicekey = :devicekey OR uniquekey = :uniquekey AND devicekey = 'ALL'");
        $stmt->execute(array(
          ":uniquekey" => $uk,
          ":devicekey" => $dk
        ));
        if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
          return $result[0]["devicename"];
        }
        return false;
      }

      private function insertLoggedUser(CoreApp\AttemptUser $a, $uniquekey) {
        $stmt = $this->db->prepare("INSERT INTO logged_users (devicekey, uniquekey, time, ip, useragent, lalo) VALUES (:devicekey, :uniquekey, :time, :ip, :useragent, :lalo)");
        $stmt->execute(array(
          ":devicekey" => $a->devicekey,
          ":uniquekey" => $uniquekey,
          ":time" => time(),
          ":ip" => $a->ip,
          ":useragent" => $a->useragent,
          ":lalo" => $a->lalo,
        ));
      }

      private function response($s, $m) {
        $json = array();
        $json["status"] = $s;
        $json["message"] = $m;
        die (json_encode($json));
      }

      public function registerNewUserBYEmail(CoreApp\AttemptUser $a) {

          $credentials = $a->getCredentials();
          $cost = $this->affordableCost($credentials["passw"], 0.05);
          $dbpass = password_hash($credentials["passw"], PASSWORD_DEFAULT, ["cost" => $cost]);
          echo $dbpass;
          if(password_verify($credentials["passw"], $dbpass)) {
              echo "<br>OK";
          }
          else {
              echo "<br>bad";
          }
      }

      private function affordableCost($p, $timeTarget) {
          $cost = 8;
          do {
              $cost++;
              $start = microtime(true);
              password_hash($p, PASSWORD_DEFAULT, ["cost" => $cost]);
              $end = microtime(true);
          }
          while (($end - $start) < $timeTarget);
          return $cost;
      }
  }
