<?

    class Index extends CoreApp\Controller {

        public function __construct($info) {
            parent::__construct();
            $this->loadModel(__CLASS__);
            $this->viewInit($info["view"]);
        }

    }