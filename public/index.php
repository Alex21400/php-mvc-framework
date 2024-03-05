<?php

use Core\Router;
use Core\Session;
use Core\ValidationException;

session_start();

const BASE_PATH = __DIR__ . '\..\\';

// For easier require
function basePath($path) {
    return BASE_PATH . $path;
}

// composers autoload
require basePath('/vendor/autoload.php');

require basePath('Core/functions.php');
require basePath('bootstrap.php');

$router = new Router();

$routes = require basePath('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch(ValidationException $exception) {
    Session::flash('errors', $exception->getErrors());
    Session::flash('old', $exception->getOld());

    return redirect($router->previousURL());
}

Session::unflash();

?>