<?php

namespace Core;

use Core\Middleware\Middleware;

class Router {
    protected $routes = [];

    // add route
    protected function add($method, $uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

    public function only($key) {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    }

    public function route($uri, $method) {
        foreach($this->routes as $route) {
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                
                // Apply middleware
                Middleware::resolve($route['middleware']);

                // This won't work unless all controllers are in http/controllers
                return require basePath('Http/controllers/' . $route['controller']);
            }
        }

        $this->abort();
    }

    public function get($uri, $controller) {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller) {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller) {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller) {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller) {
        return $this->add('PUT', $uri, $controller);
    }

    // return previous URL
    public function previousURL() {
        return $_SERVER['HTTP_REFERER'];
    }

    protected function abort($status = 404) {
        http_response_code(404);

        require basePath('views/404.php');

        die();
    }
}

?>