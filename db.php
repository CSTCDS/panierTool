<?php
// Configuration DB - mettez à jour selon votre environnement
$db_host = '127.0.0.1';
$db_user = 'root';
$db_pass = '';
$db_name = 'panier_tool';

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($mysqli->connect_errno) {
    die('DB connection failed: ' . $mysqli->connect_error);
}
$mysqli->set_charset('utf8mb4');

function e($s) { return htmlspecialchars($s, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8'); }
