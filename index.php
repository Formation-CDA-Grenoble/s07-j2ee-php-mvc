<?php

require_once('./Router.php');
require_once('./controllers/MainController.php');
require_once('./controllers/ContactController.php');

$router = new Router;
if (isset($_GET['_url'])) {
    $route = $_GET['_url'];
} else {
    $route = 0;
}
$routeInfo = $router->match($route);

if (is_null($routeInfo)) {
    echo 'Cette page n\'existe pas (encore)';
} else {
    $controllerName = $routeInfo->getControllerName();
    $methodName = $routeInfo->getMethodName();

    $controller = new $controllerName;
    $controller->$methodName();
}
