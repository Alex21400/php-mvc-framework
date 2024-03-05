<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    ':id' => $_POST['id']
])->findOrFail();

$errors = [];

if(! Validator::checkLength($_POST['body'], 1, 255)) {
    $errors['body'] = 'The description must be between 1 and 255 characters long';
}

if(! empty($errors)) {
    return view('notes/edit', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query('UPDATE notes SET body = :body WHERE id = :id', [
    ':body' => $_POST['body'],
    ':id' => $_POST['id']
]);

// REDIRECT
header('location: /notes');
die();

?>