<?

    $router = new CoreApp\Router();

        $router->get("A/asdf", function($parameters) {
            $view = new CoreApp\View("Index");
            $view->render();
        });

        $router->post("A/asdfg", function($parameters) {
            $view = new CoreApp\View("Index");
            $view->render();
        });

        $router->get("A/(:param)", function($parameters) {
            $view = new CoreApp\View("Index");
            $view->parameters = $parameters;
            $view->render();
        });
        $router->put("B/(:p)", function($parameters) {
            $view = new CoreApp\View("Index");
            $view->render();
        });
        $router->put("(:param)/(:p)", function($parameters) {
            $view = new CoreApp\View("Index");
            $view->render();
        });
