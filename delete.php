<?php
require 'db.php';
$action = $_GET['action'] ?? null;
if ($action === 'delete_list') {
    $id = intval($_GET['id'] ?? 0);
    if ($id>0) {
        $stmt = $mysqli->prepare('DELETE FROM lists WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }
    header('Location: lists.php'); exit;
} elseif ($action === 'delete_item') {
    $id = intval($_GET['id'] ?? 0);
    $list_id = intval($_GET['list_id'] ?? 0);
    if ($id>0) {
        $stmt = $mysqli->prepare('DELETE FROM items WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }
    header('Location: list_view.php?id=' . $list_id); exit;
}
header('Location: lists.php');
exit;

