<?php

class Router {
    private $routes;
    
    public function __construct() {
        $this->routes = [
            null => ['MainController', 'show'],
            '/contact' => ['ContactController', 'show'],
            '/blog' => ['BlogController', 'show'],
        ]; 
    }
    
    public function match($route) {
        if (isset($this->routes[$route])) {
            return $this->routes[$route];
        }
        return null;
    }
}
