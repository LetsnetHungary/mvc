<?

    $router = new CoreApp\Router();

    $router->add("/", function() {
        $view = new CoreApp\View("Index");
        $view->render();
    });

    $router->add("{param}?", function() {
        echo "ajsbdfjads";
    });

    $router->add("Help", function() {
        $view = new CoreApp\View("Index");
        $view->render();
    });