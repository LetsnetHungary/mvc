<?

    class LoginAPI extends CoreApp\Controller {

        public function __construct() {
            parent::__construct();
        }

        public function loginAttemptUser() {
            $attemptUserData = $_POST["d"];

            $this->loadModel(__CLASS__);
            $this->model->loginAttemptUser(new CoreApp\AttemptUser($attemptUserData));
        }

    }