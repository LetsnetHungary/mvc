<?php

    class Router {

        public function getRoute($uri) {
            $routes = $this->getRoutes();
            $route = function() use ($uri, $routes) {

             //   print_r($routes);
                array_unshift($routes, array("href" => "xxx"));
                $uri = rtrim($uri, '/');
                $rc = count(explode('/', $uri));
                for($i=0; $i < $rc; $i++) {
               //     echo $uri;
                    $return = array_search($uri, array_column($routes, "href"));
                 //   print_r($return);
                    return $return ? $routes[$return] : $this->getRoute(substr($uri, 0, strlen($uri) - 1 - strpos(strrev($uri), '/')));    
                }
            };
            $a = $route();
            print_r($a);
        }

        private function prepareURI($uri) {
            $uri = rtrim($uri, "/");
            $uri = explode("/", $uri);
            $return = [];
            foreach($uri as $ur) {
                array_push($return, $ur);
            }
            return $return;
        }

        private function getRoutes() {
            return json_decode(file_get_contents("routes.json"), true);
        }

        private function getRoutesInfo($type) {
            $json = json_decode(file_get_contents("routes_info.json"));
            return $json->$type;
        }

    }

    