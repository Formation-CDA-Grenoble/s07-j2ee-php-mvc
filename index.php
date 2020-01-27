<?php

// Imports
require_once('./Router.php');
require_once('./controllers/MainController.php');
require_once('./controllers/ContactController.php');

// Crée un nouveau routeur
$router = new Router;

// Si _url n'a pas de valeur, c'est qu'on est sur la page d'accueil
if (isset($_GET['_url'])) {
    $routeName = $_GET['_url'];
} else {
    $routeName = 0;
}
// Demander au routeur de trouver l'objet Route correspondant au nom demandé
$route = $router->match($routeName);

// Si aucune route n'a été trouvée
if (is_null($route)) {
    // Renvoyer la page d'erreur 404
    echo 'Cette page n\'existe pas (encore)';
// Sinon
} else {
    $controllerName = $route->getControllerName();
    $methodName = $route->getMethodName();

    // Crée un nouveau contrôleur du nom indiqué par la Route
    $controller = new $controllerName;
    // Invoque la méthode de ce contrôleur du nom indiqué par la Route
    $controller->$methodName();
}
