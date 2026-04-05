<?php
require 'db.php';
$id = intval($_GET['id'] ?? 0);
if ($id <= 0) { header('Location: lists.php'); exit; }

$stmt = $mysqli->prepare('SELECT * FROM lists WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$list = $stmt->get_result()->fetch_assoc();
if (!$list) { header('Location: lists.php'); exit; }

$items_res = $mysqli->query('SELECT * FROM items WHERE list_id = '. $id .' ORDER BY created_at ASC');
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title><?=e($list['name'])?> — PanierTool</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <div class="container">
    <h1><?=e($list['name'])?></h1>
    <a href="lists.php">← Retour aux listes</a>

    <form action="add_item.php" method="post" class="inline-form">
      <input type="hidden" name="list_id" value="<?=$id?>">
      <input name="name" placeholder="Nouvel article" required>
      <input name="qty" placeholder="Quantité (ex: 1, 500g)">
      <button type="submit">Ajouter</button>
    </form>

    <ul class="items">
      <?php while ($it = $items_res->fetch_assoc()): ?>
        <li>
          <?=e($it['name'])?> <span class="muted"><?=e($it['qty'])?></span>
          <a class="danger" href="delete.php?action=delete_item&id=<?=$it['id']?>&list_id=<?=$id?>" onclick="return confirm('Supprimer cet article ?')">Suppr</a>
        </li>
      <?php endwhile; ?>
    </ul>
  </div>
</body>
</html>

