<?php

/*
* Route
* Classe destinée à contenir les informations de chaque route existante dans l'application
*/
class Route {
    // Nom du contrôleur à invoquer lorsque cette route est appelée
    private $controllerName;
    // Nom de la méthode à invoquer lorsque cette route est appelée
    private $methodName;

    // Le constructeur permet d'initialiser les propriétés de l'objet
    public function __construct($controllerName, $methodName) {
        $this->controllerName = $controllerName;
        $this->methodName = $methodName;
    }

    // Getters, permettent d'avoir accès aux propriétés privées
    public function getControllerName() {
        return $this->controllerName;
    }

    public function getMethodName() {
        return $this->methodName;
    }
}

/*
* Router
* Classe permettant d'appeler les routes de l'application
*/
class Router {
    // Liste des routes existant dans l'application
    private $routes;

    // Le constructeur permet d'initialiser les routes à partir du fichier de configuration
    public function __construct() {
        // Lit le fichier de configuration
        $routerData = parse_ini_file('./router.ini');

        // Initialise la liste des routes
        $this->routes = [];
        // Pour chaque route dans le fichier de configuration
        foreach ($routerData['routes'] as $key => $routeData) {
            // Sépare le nom du contrôleur et le nom de la méthode
            $routeProperties = explode('#', $routeData);
            // Crée un nouvel objet Route à partir de ces propriétés
            $route = new Route($routeProperties[0], $routeProperties[1]);
            // Ajoute la route associée à la clé correspondante
            $this->routes[$key] = $route;
        }
    }
    
    // Méthode permettant de faire correspondre un nom de route à un objet Route
    public function match($requestedRoute) {
        // Si le nom de la route existe dans la liste
        if (isset($this->routes[$requestedRoute])) {
            // Renvoie l'objet Route correspondant
            return [
                $this->routes[$requestedRoute],
                null
            ];
        }
        preg_match('/^([A-Z]+)\s/', $requestedRoute, $matches);
        $requestedMethod = $matches[1];
        // Parcourt toutes les routes
        foreach ($this->routes as $routeName => $route) {
            // Si le nom de la route contient une Regex
            if (preg_match('/([A-Z]+)\s\{(.+)\}/', $routeName, $matches)) {
                // Si la route demandée correspond à la Regex
                $methodToMatch = $matches[1];
                $routeToMatch = $matches[2];
                if ($requestedMethod === $methodToMatch && preg_match('/'.$routeToMatch.'/', $requestedRoute, $matches)) {
                    // Renvoie l'objet Route correspondant
                    return [
                        $route,
                        $matches
                    ];
                }
            }
        }
        // Sinon, renvoie null
        return [null, null];
    }
}
