<?php

namespace CoreApp;

  abstract class DataModel extends Model {

    protected $database;
    protected $PDO;
    protected $curl;
    protected $log;
    protected $response;

    public function __construct() {
      $this->database = new Database();
      $this->log = array();
    }

    public function CURLWPOST($to, $url, $postarray) {
      $to = $to == "API" ? Session::get("database") : Session::get("sitekey");
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,"http://$to".ServerHandler::curlEnding()."/".$url);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postarray));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $api_output = curl_exec ($ch);
      curl_close($ch);
      return $api_output;
    }

  }
