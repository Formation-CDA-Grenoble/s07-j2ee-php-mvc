<?php

class Route {
    private $controllerName;
    private $methodName;

    public function __construct($controllerName, $methodName) {
        $this->controllerName = $controllerName;
        $this->methodName = $methodName;
    }

    public function getControllerName() {
        return $this->controllerName;
    }

    public function getMethodName() {
        return $this->methodName;
    }
}

class Router {
    private $routes;
    
    public function __construct() {
        $routerData = parse_ini_file('./router.ini');

        $this->routes = [];
        foreach ($routerData['routes'] as $key => $routeData) {
            $routeProperties = explode('#', $routeData);
            $route = new Route($routeProperties[0], $routeProperties[1]);
            $this->routes[$key] = $route;
        }
    }
    
    public function match($route) {
        if (isset($this->routes[$route])) {
            return $this->routes[$route];
        }
        return null;
    }
}
