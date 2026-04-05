<?php
require 'db.php';

// Récupère les listes
$res = $mysqli->query('SELECT * FROM lists ORDER BY created_at DESC');
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Listes de courses - PanierTool</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <div class="container">
    <h1>Listes de courses</h1>

    <form action="add_list.php" method="post" class="inline-form">
      <input name="name" placeholder="Nouvelle liste" required>
      <button type="submit">Créer</button>
    </form>

    <ul class="lists">
      <?php while ($row = $res->fetch_assoc()): ?>
        <li>
          <a href="list_view.php?id=<?=$row['id']?>"><?=e($row['name'])?></a>
          <small><?= $row['created_at'] ?></small>
          <a class="danger" href="delete.php?action=delete_list&id=<?=$row['id']?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
        </li>
      <?php endwhile; ?>
    </ul>
  </div>
</body>
</html>
