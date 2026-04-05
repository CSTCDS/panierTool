-- PanierTool schema
CREATE DATABASE IF NOT EXISTS panier_tool CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE panier_tool;

CREATE TABLE IF NOT EXISTS lists (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  list_id INT NOT NULL,
  name VARCHAR(255) NOT NULL,
  qty VARCHAR(50) DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (list_id) REFERENCES lists(id) ON DELETE CASCADE
);

-- Exemple
INSERT INTO lists (name) VALUES ('Courses hebdo');
INSERT INTO items (list_id, name, qty) VALUES (1, 'Pommes', '6'), (1, 'Lait', '1L');

