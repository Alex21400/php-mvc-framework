<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

// AUTH
$router->get('/register', 'register/create.php')->only('guest');
$router->post('/register', 'register/store.php')->only('guest');
$router->get('/login', 'session/create.php')->only('guest');
$router->post('/login', 'session/store.php')->only('guest');
$router->delete('/logout', 'session/destroy.php')->only('auth');

// NOTES
$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note','notes/show.php');

$router->get('/notes/create', 'notes/create.php');
$router->post('/notes', 'notes/store.php');

$router->get('/notes/edit', 'notes/edit.php');
$router->patch('/notes', 'notes/update.php');

$router->delete('/note', 'notes/destroy.php');

?>