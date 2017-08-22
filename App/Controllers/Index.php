<?

    $router = new CoreApp\Router();

        $router->get("A/asdf", function() {
            $view = new CoreApp\View("Index");
            $view->render();
        });

        $router->post("A/asdfg", function() {
            $view = new CoreApp\View("Index");
            $view->render();
        });

        $router->get("A/(:param)", function() {
            $view = new CoreApp\View("Index");
            $view->render();
        });
        $router->put("B/(:p)", function() {
            $view = new CoreApp\View("Index");
            $view->render();
        });
        $router->put("(:param)/(:p)", function() {
            $view = new CoreApp\View("Index");
            $view->render();
        });
