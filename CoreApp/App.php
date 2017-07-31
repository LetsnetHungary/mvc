<?

    namespace CoreApp;

        class App {

            public function __construct() {
                $uri = rtrim($_GET["url"], '/');
                $uri = isset($_GET["url"]) ? explode("/", $uri) : [];
                $this->routing($uri);
            }

            private function loop($uri, $routes) {
              $return_array = array();
                $c_uri = count($uri);
                for($i = 0; $i < $c_uri; $i++) {
                    array_push($return_array, array());
                    $c_routes = count($routes);
                    for($k = 0; $k < $c_routes; $k++) {
                        if(strpos($routes[$k][$i], ":") != 1 && ($routes[$k][$i] != $uri[$i] || $c_uri != count($routes[$k]))) {
                            unset($routes[$k]);
                        }
                        else {
                          echo"k: ". $k;
                          array_push($return_array[$i], $k);
                        }
                    }
                    $routes = array_values($routes);
                }
                if(empty($routes)) {
                    return "HTTPError";
                }
                return $this->prepareReturnArray($return_array);
            }
            private function prepareReturnArray($array){
              print_r($array);
              $c_a = count($array);
              $index = 0;
              for ($i = $c_a - 1; $i >= 0 ; $i--) {
                $index = $array[$i][$index];
              }
              echo("index: " . $index . "</br>");
              return $index;
            }
            private function routing($uri) {
                $controller = $this->chooseController($uri[0]);
                $routes = [];
                unset($uri[0]); $uri = array_values($uri);
                require("App/Controllers/$controller.php");
                $r = array_column($router->routes, "href");
                foreach($r as $route) {
                    array_push($routes, explode("/", $route));
                }

                $route = $this->loop($uri, $routes);


               print_r($routes);
               print_r($uri);
               print_r($route);
            }

            private function chooseController($href) {
                $controllers = scandir("App/Controllers");
                $return = false;
                foreach($controllers as $controllerFile) {
                    if($controllerFile ==  $href . ".php"){
                        $return = $href;
                    }
                }
                return $return ? $href : "HTTPError";
            }

        }
