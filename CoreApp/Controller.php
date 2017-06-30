<?

    namespace CoreApp;

        class Controller {

            public $model;

            public function __construct() {
                $this->model = [];
            }

            protected function loadModel($modelName) {
                $modelName .= '_Model';
                $modelF = "App/Models/".$modelName.".php";
                if(file_exists($modelF)) {
                    require($modelF);
                    $this->model = new $modelName();
                }
                return NULL;
            }

        }