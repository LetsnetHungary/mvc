<?

    $router = new CoreApp\Router();

    $router->add("asdf/(:param)?", function() {
        $view = new CoreApp\View("Index");
        $view->render();
    });

    $router->add("asdf", function() {
        $view = new CoreApp\View("Index");
        $view->render();
    });


    $router->add("asdf/asdf", function() {
        $view = new CoreApp\View("Index");
        $view->render();
    });

    $router->add("asdf/asdk", function() {
        $view = new CoreApp\View("Index");
        $view->render();
    });

    $router->add("Index/ajsdfka", function() {
        echo "ajsbdfjads";
    });

    $router->add("Help", function() {
        echo "asjdbfjlasdf";
        $view = new CoreApp\View("Index");
        $view->render();
    });