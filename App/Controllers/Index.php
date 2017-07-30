<?

    $router = new CoreApp\Router();

        $router->add("(:param)", function() {

            $view = new CoreApp\View("Index");
            $view->render();
        });

        $router->add("A/asdf", function() {

            $view = new CoreApp\View("Index");
            $view->render();
        });


        $router->add("A/(:param)", function() {
            $view = new CoreApp\View("Index");
            $view->render();
        });

        $router->add("A/asdfg", function() {
            $view = new CoreApp\View("Index");
            $view->render();
        });

        $router->add("B", function() {
            $view = new CoreApp\View("Index");
            $view->render();
        });