<?

    namespace CoreApp;
    
        class Authentication {

            public function __construct() {
                $this->DB = DB::init(AppConfig::getData("database=>authenticationDB"));
                DB::restore();
            }
            

            public function login(AttemptUser $attemptUser) {
                print_r($this->DB); print_r($attemptUser);
            }

        }