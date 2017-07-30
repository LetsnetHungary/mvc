<?

    namespace CoreApp;

        class App {

            public function __construct() {
                $uri = isset($_GET["url"]) ? explode("/", rtrim($_GET["url"], '/')) : [];
                $this->routing($uri);
            }

            private function loop($uri, $routes, $counter) {
                $c_routes = count($routes);
                for($i = 0; $i < $c_routes; $i++) {
                    if($routes[$i][$counter] != $uri[$counter]) {
                        unset($routes[$i]);
                    }
                }
                $c_routes = count($routes);
                if($c_routes == 0) {
                    return "HTTPError";
                }
                return $c_routes == 1 ? array_values($routes) : $this->loop($uri, array_values($routes), $counter + 1);
                
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

                

               $route = $this->loop($uri, $routes, 0);

               
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