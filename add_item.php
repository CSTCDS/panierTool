<?php
require 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $list_id = intval($_POST['list_id'] ?? 0);
    $name = trim($_POST['name'] ?? '');
    $qty = trim($_POST['qty'] ?? null);
    if ($list_id > 0 && $name !== '') {
        $stmt = $mysqli->prepare('INSERT INTO items (list_id, name, qty) VALUES (?, ?, ?)');
        $stmt->bind_param('iss', $list_id, $name, $qty);
        $stmt->execute();
    }
}
header('Location: list_view.php?id=' . ($list_id ?? 0));
exit;
