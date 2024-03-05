<?php

use Core\Session;

$heading = 'Create a Note';

view('/notes/create', [
    'heading' => $heading,
    'errors' => Session::get('errors')
]);
?>