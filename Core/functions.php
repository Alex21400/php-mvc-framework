<?php

// Return the requested view with optional attributes
function view($path, $attributes = []) {
    extract($attributes);

    require basePath("views/" . $path . '.view.php');
}

// Die and dump
function dd($value) {

    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}

// check url for nav links
function checkURL($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

// Redirect to the given path
function redirect($path) {

    header("location: {$path}");
    exit();
}

// Return the Session with old key or default
function old($key, $default = '') {
    return \Core\Session::get('old')[$key] ?? $default;
}

?>