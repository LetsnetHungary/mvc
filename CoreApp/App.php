<?

    namespace CoreApp;

        class App {

            public function __construct() {
                $uri = rtrim($_GET["url"], '/');
                $uri = isset($_GET["url"]) ? explode("/", $uri) : [];
                $this->routing($uri);
            }

            private function loop($uri, $routes) {
                $c_uri = count($uri);
                for($i = 0; $i < $c_uri; $i++) {
                    foreach($routes as $route) {
                        if($route[$i] != $uri[$i] || $c_uri != count($route)) {
                            if(strpos($route[$i], ":") != 1) {
                                unset($route);
                            }
                        }
                    }
                    /*
                    $c_routes = count($routes);
                    for($k = 0; $k < $c_routes; $k++) {
                        if($routes[$k][$i] != $uri[$i] || $c_uri != count($routes[$k])) {
                            if(strpos($routes[$k][$i], ":") != 1) {
                                unset($routes[$k]);
                            }
                            else {
                                $routes[$i]["i"] = $k;
                            }
                        }
                    } 
                    $routes = array_values($routes);
                    */
                }
                if(empty($routes)) {
                    return "HTTPError";
                }
                return $routes[0];
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