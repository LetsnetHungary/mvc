<?

    class LoginAPI_Model extends CoreApp\Model {

        public function __construct() {
            parent::__construct();
        }

        public function loginAttemptUser(CoreApp\AttemptUser $attemptUser) {
            $authentication = new CoreApp\Authentication();
            $authentication->login($attemptUser);
        }

    }