<?php

use Core\Authenticator;
use Core\LoginForm;

//Validate
$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

// $auth = new Authenticator();

$signedIn = (new Authenticator)->attempt($attributes['email'], $attributes['password']);

// If auth attempt fails throw an error else redirect to home
if(! $signedIn) {
    $form->addError('email', 'Wrong email or password')->throw();
}

redirect('/');

?>