<?

    namespace CoreApp;

        class App {

            private $routes;
            private $uri;
            public function __construct() {
                $uri = rtrim($_GET["url"], '/');
                $this->uri = isset($_GET["url"]) ? explode("/", $uri) : [];
                $this->getController();
            }

              private function getRouteMatches($routes){
                foreach ($this->uri as $i => $urival) {
                  foreach($routes as $k => $routeval){
                    if(count($this->uri) != count($routeval) || ($urival != $routeval[$i] && strpos($routeval[$i], ":") != 1)){
                      unset($routes[$k]);
                    }
                  }
                }
                if(empty($routes)){
                  return "HTTPError";
                }
                return $this->prepareReturnArray($routes);
            }

            private function prepareReturnArray($routes){
              $return_array = array();
              reset($routes);
              $return_array["function"] = key($routes);
              foreach($routes[$return_array["function"]] as $key => $value){
                if (strpos($value, ":") == 1) {
                  $return_array["parameters"][substr($value, 2, strlen($value) - 3)] = $this->uri[$key];
                }
              }
              return $return_array;
            }


            private function getController() {
                $href = $this->findController($this->uri);
                if (!$href) {
                  require("App/Controllers/HTTPError.php");
                  return;
                }
                else {
                   require("App/Controllers/$href.php");
                }
                unset($this->uri[0]);
                $this->uri = array_values($this->uri);
                $this->routing($this->selectMethod($router));
            }

            private function findController($uri){
              if($uri == null){
                return "Index";
              }
              $href = $uri[0];
              $controllers = scandir("App/Controllers");
              $return = false;
              foreach($controllers as $controllerFile) {
                  if($controllerFile ==  $href . ".php"){
                      $return = $href;
                  }
              }
              return $return;
            }
            private function routing($r)
            {
              $routes = [];
              foreach($r as $route) {
                  array_push($routes, explode("/", $route));
              }

              $route = $this->getRouteMatches($routes);
              if ($route != "HTTPError") {
                $this->routes[$route["function"]]["callback"]($route['parameters']);
              }
              else{
                require("App/Controllers/HTTPError.php");
              }

            }

            private function selectMethod($r)
            {
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
