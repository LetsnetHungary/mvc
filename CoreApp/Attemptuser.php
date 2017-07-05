<?

    namespace CoreApp;

        class AttemptUser {

            public $email;
            public $password;
            public $devicekey;
            public $lalo;

            public function __construct($data) {
                $this->email = $data["email"];
                $this->password = $data["passwd"];
                $this->devicekey = $data["dk"];
               
               // $this->lalo = $data["lalo"];
               // $this->useragent = $_SERVER["useragent"];
               // $this->ip = $_SERVER["ip"];
            }

        }