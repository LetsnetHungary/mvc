<?

  namespace CoreApp;

    class App {

        private $routes;
        private $uri;

        public function __construct() {
          $this->uri = isset($_GET["url"]) ? explode("/", rtrim($_GET["url"], "/")) : [];
        }

        public function startApp() {
          $this->getController();
        }

        private function getController() {

            $href = $this->findController($this->uri);
            require $href ? _CONTROLLERS . $href . _PHP_ENDING : _HTTP_ERROR_CONTROLLER;

            unset($this->uri[0]);
            $this->uri = array_values($this->uri);
            $this->routing($this->selectMethod($router));
        }

        private function findController($uri) {

          if($uri == null) {
            return "Index";
          }

          $href = $uri[0];
          $controllers = scandir(_CONTROLLERS);
          $controller = false;

          foreach($controllers as $controllerFile) {
              if($controllerFile ==  $href . _PHP_ENDING){
                  $controller = $href;
              }
          }

          return $controller;
        }

        private function getRouteMatches($routes) {

          $this->uri = empty($this->uri) ? [""] : $this->uri; 

          foreach ($this->uri as $i => $urival) {

            foreach($routes as $k => $routeval){
              if(count($this->uri) != count($routeval) || ($urival != $routeval[$i] && strpos($routeval[$i], ":") != 1)){
                unset($routes[$k]);
              }
            }

          }

            return empty($routes) ? "HTTPError" : $this->prepareReturnArray($routes);
        }

        private function prepareReturnArray($routes){

          $return_array = array();
          reset($routes);
          $return_array["function"] = key($routes);
          $return_array["parameters"] = [];

          foreach($routes[$return_array["function"]] as $key => $value){
            if (strpos($value, ":") == 1) {
              $return_array["parameters"][substr($value, 2, strlen($value) - 3)] = $this->uri[$key];
            }
          }

          return $return_array;
        }

        private function routing($r) {

          $routes = [];

          foreach($r as $route) {
              array_push($routes, explode("/", $route));
          }

          $route = $this->getRouteMatches($routes);

          if ($route != "HTTPError") {
            $this->routes[$route["function"]]["callback"]($route['parameters']);
          }
          else {
            require(_HTTP_ERROR_CONTROLLER);
          }

        }

      private function selectMethod($r) {

        switch ($_SERVER['REQUEST_METHOD']) {

          case 'GET':
            $this->routes = $r->getroutes;
            return array_column($r->getroutes, "href");

          case 'POST':
            $this->routes = $r->postroutes;
            return array_column($r->postroutes, "href");

          case 'DELETE':
            $this->routes = $r->deleteroutes;
            return array_column($r->deleteroutes, "href");

          case 'PUT':
            $this->routes = $r->putroutes;
            return array_column($r->putroutes, "href");

          default:
            return;
        }
      }

    }
