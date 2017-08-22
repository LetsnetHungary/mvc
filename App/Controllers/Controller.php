<?

    $router = new CoreApp\Router();

    $router->add("/", function() {
        echo "ajsdbfkjasdf";
    });

    $router->add("Help", function() {
        $view = new View("Index");
        $view->render();
    });