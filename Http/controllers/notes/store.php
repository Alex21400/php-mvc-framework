<?php

use Core\Database;
use Core\Session;
use Core\Validator;

$db = new Database();

$errors = [];

if(! Validator::checkLength($_POST['body'], 1, 255)) {
    $errors['body'] = 'The description must be between 1 and 255 characters long';
}

if(!empty($errors)) {

    Session::flash('errors', $errors);

    redirect('/notes/create');
}

$query = 'INSERT INTO notes (body, user_id) VALUES (:body, :user_id)';

$db->query($query, [
    ':body' => $_POST['body'],
    ':user_id' => 1
]);

header('location: /notes');