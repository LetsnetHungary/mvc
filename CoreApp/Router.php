<?

    namespace CoreApp;

    class Router {

        public $getroutes;
        public $postroutes;
        public $deleteroutes;
        public $putroutes;

        public function __construct() {
            $this->getroutes = [];
            $this->postroutes = [];
            $this->putroutes = [];
            $this->deleteroutes = [];
        }

        public function get($uri, $callback) {
            $rA = [];
            $rA['href'] = $uri;
            $rA['callback'] = $callback;
            array_push($this->getroutes, $rA);
        }
        public function post($uri, $callback) {
            $rA = [];
            $rA['href'] = $uri;
            $rA['callback'] = $callback;
            array_push($this->postroutes, $rA);
        }
        public function delete($uri, $callback) {
            $rA = [];
            $rA['href'] = $uri;
            $rA['callback'] = $callback;
            array_push($this->deleteroutes, $rA);
        }
        public function put($uri, $callback) {
            $rA = [];
            $rA['href'] = $uri;
            $rA['callback'] = $callback;
            array_push($this->putroutes, $rA);
        }
    }
