<?

    $router = new CoreApp\Router();

        $router->add("A/asdf", function() {

            $view = new CoreApp\View("Index");
            $view->render();
        });

        $router->add("A/asdfg", function() {
            $view = new CoreApp\View("Index");
            $view->render();
        });

        $router->add("A/(:param)", function() {
            $view = new CoreApp\View("Index");
            $view->render();
        });
        $router->add("B/c/d", function() {
            $view = new CoreApp\View("Index");
            $view->render();
        });
        $router->add("(:param)/(:param2)", function() {

            $view = new CoreApp\View("Index");
            $view->render();
        });
