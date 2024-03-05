<?php

use Core\Database;

$db = new Database();

$query = "SELECT n.id, n.body, n.created_at, n.updated_at, u.name from notes n 
        LEFT JOIN users u ON n.user_id = u.id
        ORDER BY n.created_at DESC";

$notes = $db->query($query)->get();

$heading = 'Welcome to Notes';

view('notes/index', [
    'heading' => $heading,
    'notes' => $notes
]);

?>