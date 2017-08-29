<?

    $router = new CoreApp\Router();

        $router->get("/", function() {
            $view = new CoreApp\View("Index");
            $view->render();
        });

        $router->get("A", function() {
            $view = new CoreApp\View("Index");
            $view->render();
        });
