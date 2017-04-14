<?php

namespace CoreApp\Controller;
use \CoreApp;

  class Authentication extends CoreApp\InnerController {

      public function __construct() {
          parent::__construct($this->ClassName(__CLASS__));
      }

      public function moduleAllowedToUser($devicekey) {
        //$return $this->model->moduleAllowedToUser($credentials);
      }

      public function newAttemptUser($logindata) {
        return $this->model->newAttemptUser($logindata);
      }

     public function loggedInChangeLocation($l) {
          if($this->checkIfUserLoggedIn()) {
              //if the user is logged in
              header("location: $l");
          }
      }

      public function userShouldChangeLocation($l) {
          if(!$this->checkIfUserLoggedIn()) {
              //if the user is not logged in
              header("location: $l");
          }
      }

      public function checkIfUserLoggedIn() {
          return $this->model->checkIfUserLoggedIn();
      }

      public function loginAttemptUser(CoreApp\AttemptUser $a) {
        $this->model->loginAttemptUser($a);
      }

      public function registerNewUserByEmail(CoreApp\AttemptUser $a) {
          $this->model->registerNewUserByEmail($a);
      }
  }
