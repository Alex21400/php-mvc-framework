<?php

use Core\Validator;
use Core\App;
use Core\Authenticator;
use Core\Database;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

// Validate 
$errors = [];

if(!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if(!Validator::checkLength($password, 6, 24)) {
    $errors['password'] = 'Password must be between 6 and 24 characters';
}

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    ':email' => $email
])->find();


// Check if email already exists in DB otherwise create account
if($user) {
    $errors['email'] = 'This email is already in use';
} else {
    $db->query('INSERT INTO users(email, password) VALUES (:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    $auth = new Authenticator();

    // Mark that the user has logged in
    $auth->login([
        'email' => $email
    ]);

    redirect('/');
}

if(!empty($errors)) {
    return view('register/create', [
        'errors' => $errors,
        'heading' => 'Register'
    ]);
}

?>