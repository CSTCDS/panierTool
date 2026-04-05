<?php
require 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    if ($name !== '') {
        $stmt = $mysqli->prepare('INSERT INTO lists (name) VALUES (?)');
        $stmt->bind_param('s', $name);
        $stmt->execute();
    }
}
header('Location: lists.php');
exit;

