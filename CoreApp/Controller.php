<?

    namespace CoreApp;

        class Controller {


            public $routeINFO;

            public $model;
            public $view;

            public function __construct() {
                $this->view = NULL;
                $this->model = [];
                $this->routeINFO = [];
            }

            protected function loadModel($modelName) {
                $modelName .= '_Model';
                $modelF = "App/Models/".$modelName.".php";
                if(file_exists($modelF)) {
                    require($modelF);
                    $this->model = new $modelName();
                    return $this->model;
                }
                return NULL;
            }

            protected function viewInit($viewName, $func="") {
                $this->view = new View($viewName);
                if(!$func==""){$func();}
                $this->view->render($viewName);
            }

        }