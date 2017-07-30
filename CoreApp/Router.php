<?

    namespace CoreApp;

    class Router {

        public $routes;

        public function __construct() {
            $this->routes = [];
        }

        public function add($uri, $callback) {
            $rA = [];
            $rA['href'] = $uri;
            $rA['callback'] = $callback;
            array_push($this->routes, $rA);
        }
    }