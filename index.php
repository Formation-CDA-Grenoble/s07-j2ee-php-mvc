<?php

// Imports
require_once('./Router.php');
require_once('./DatabaseManager.php');
require_once('./controllers/AbstractController.php');
require_once('./controllers/MainController.php');
require_once('./controllers/ContactController.php');
require_once('./controllers/ErrorController.php');

require_once('./models/Product.php');

// Crée un nouveau routeur
$router = new Router;

$routeName = $_SERVER['REQUEST_METHOD'] . ' ';
// Si _url n'a pas de valeur, c'est qu'on est sur la page d'accueil
if (isset($_GET['_url'])) {
    $routeName .= $_GET['_url'];
} else {
    $routeName .= '/';
}
// Demander au routeur de trouver l'objet Route correspondant au nom demandé
$route = $router->match($routeName);

// Si aucune route n'a été trouvée
if (is_null($route)) {
    // Renvoyer la page d'erreur 404
    $controller = new ErrorController;
    $controller->notFound();
// Sinon
} else {
    $controllerName = $route->getControllerName();
    $methodName = $route->getMethodName();

    // Crée un nouveau contrôleur du nom indiqué par la Route
    $controller = new $controllerName;
    // Invoque la méthode de ce contrôleur du nom indiqué par la Route
    $controller->$methodName();
}
