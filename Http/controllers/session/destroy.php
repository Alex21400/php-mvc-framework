<?php

// Logout the user

use Core\Authenticator;

$auth = new Authenticator();
$auth->logout();

?>