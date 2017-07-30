<?

    namespace CoreApp;

        class App {

            public function __construct() {
                $uri = isset($_GET["url"]) ? $_GET['url'] : "";
                $controller = $this->chooseController($uri, 0);
                $href = str_replace("/$controller" . "/", "", "/$uri");
                $href = explode("/", $href);
                require("App/Controllers/" . $controller . ".php");
                $routes = array_column($router->routes, "href");

                foreach($routes as $route) {
                    $callback = "---";
                    if($route == $href[0] ) {
                        $routeNumber = array_search($href[0], $routes);
                        $callback = $router->routes[$routeNumber]["callback"];    
                    }
                }

                foreach($routes as $route) {
                    if($route == "{param}?" && $callback == "---" ) {
                        $routeNumber = array_search($route, $routes);
                        $callback = $router->routes[$routeNumber]["callback"];    
                    }
                }

                if(empty($href[1])) {
                    $routeNumber = array_search("/", $routes);
                    $callback = $router->routes[$routeNumber]["callback"];    
                }

                if($callback != "---") {
                    $callback();
                }
            }

            public function chooseController($uri, $counter) {

                if($uri == "/") {
                    return "Index";
                }
                else if($uri == "" || $uri == "/" && $counter > 0) {
                    return "Index";
                }

                $return = false;
                $controllers = scandir('App/Controllers');
                foreach($controllers as $controllerFile) {
                    $file = $uri . ".php";
                    if($controllerFile == $file) {
                        $return = $uri;
                        break;
                    }
                }

                return $return ? $return : $this->chooseController(substr($uri, 0, strlen($uri) - 1 - strpos(strrev($uri), '/')), $counter + 1);   
            }

        }