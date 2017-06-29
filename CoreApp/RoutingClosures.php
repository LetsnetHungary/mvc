<?

    $static = function($info) {
       $view = new CoreApp\View($info["view"]);
       return $view->render();
    };

    $mvc = function () {

    };