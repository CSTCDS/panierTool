# PanierTool

Petit site PHP/MySQL pour créer des listes de courses (Listes & Articles).

Pré-requis
- PHP 7.4+ avec mysqli
- MySQL ou MariaDB

Installation rapide
1. Créer la base et les tables:
   mysql -u root -p < schema.sql
2. Mettre à jour la configuration DB dans `db.php`.
3. Démarrer un serveur local dans le dossier du projet:
   php -S localhost:8000
4. Ouvrir http://localhost:8000/lists.php

Fichiers principaux
- `db.php` : configuration et connexion DB
- `schema.sql` : schéma et exemples
- `lists.php` : liste des listes, création
- `list_view.php` : affichage d'une liste et gestion des articles
- `add_list.php`, `add_item.php`, `delete.php` : actions simples

Licence: code exemple éducatif.

