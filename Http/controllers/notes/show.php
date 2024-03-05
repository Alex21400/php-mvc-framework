<?php

use Core\Database;

$db = new Database();

$query = "SELECT n.id, n.body, n.created_at, u.name FROM notes n LEFT JOIN users u ON n.user_id = u.id where n.id = :id";

$note = $db->query($query, [':id' => $_GET['id']])->findOrFail();

view('notes/show', [
    'heading' => 'Note',
    'note' => $note
]);

?>