<?php

use Core\Database;
use Core\App;

$heading = 'Edit note';

$db = App::resolve(Database::class);

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_GET['id']
])->findOrFail();

view('notes/edit', [
    'heading' => $heading,
    'errors' => [],
    'note' => $note
])

?>