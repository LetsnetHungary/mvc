<?

    namespace CoreApp;

        class Route {

            private $errorRoute;
            private $routeInfoFile;

            protected $errorInfo;

            public $info;
            
            public function __construct() {
                $this->routeInfoFile = AppConfig::getData("routesF");
                $uri = isset($_GET["url"]) ? $this->uriSecurity($_GET["url"]) : AppConfig::getData("firstRoute");
                $this->info = $this->getRouteInfo($uri);
                $this->errorInfo = $this->getRouteInfo("HTTPError");
                $this->info["requestedURI"] = $uri;
            }

            private function uriSecurity($uri) {
                // stringműveletek, hogy biztonságos legyen
                return $uri;
            }

            private function getRouteInfo($uri) {
                $routes = json_decode(file_get_contents($this->routeInfoFile), true);
                $routeInfo = function() use ($uri, $routes) {
                    array_unshift($routes, array("href" => "xxx"));
                    $uri = rtrim($uri, '/');
                    $rc = count(explode('/', $uri));
                    for($i=0; $i < $rc; $i++) {
                        $return = array_search($uri, array_column($routes, "href"));
                        if(!$return && strpos($uri, '/') == false) {
                            return $this->getRouteInfo("HTTPError");
                        }
                        return $return ? $routes[$return] : $this->getRouteInfo(substr($uri, 0, strlen($uri) - 1 - strpos(strrev($uri), '/')));    
                    }
                };
                return $routeInfo();
            }
        }
