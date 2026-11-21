CREATE DATABASE IF NOT EXISTS tp7_crud
  CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE tp7_crud;

DROP TABLE IF EXISTS etudiants;
DROP TABLE IF EXISTS modules;
DROP TABLE IF EXISTS formations;

CREATE TABLE formations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(100) NOT NULL,
  duree_mois INT NOT NULL
) ENGINE=InnoDB;

CREATE TABLE etudiants (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(50) NOT NULL,
  prenom VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  formation_id INT NOT NULL,
  FOREIGN KEY (formation_id) REFERENCES formations(id) ON DELETE RESTRICT
) ENGINE=InnoDB;

CREATE TABLE modules (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titre VARCHAR(100) NOT NULL,
  heures INT NOT NULL,
  formation_id INT NOT NULL,
  FOREIGN KEY (formation_id) REFERENCES formations(id) ON DELETE RESTRICT
) ENGINE=InnoDB;

INSERT INTO formations (nom, duree_mois) VALUES
  ('Développement Web', 6),
  ('Réseaux et Sécurité', 8);

INSERT INTO etudiants (nom, prenom, email, formation_id) VALUES
  ('Alami', 'Sara', 'sara@mail.com', 1),
  ('Tazi', 'Omar', 'omar@mail.com', 2);

INSERT INTO modules (titre, heures, formation_id) VALUES
  ('HTML et CSS', 30, 1),
  ('PHP et MySQL', 40, 1),
  ('Cisco', 50, 2);