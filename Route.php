<?php

    class Route {

        private $routeInfoFile;
        

        public function __construct() {
            $this->routeInfoFile = "routes.json";
            $uri = isset($_GET["url"]) ? $_GET["url"] : "Index";
            $this->info = $this->getRouteInfo($uri);
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

    