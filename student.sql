-- Création de la base de données
CREATE DATABASE IF NOT EXISTS cilma_db;

-- Sélection de la base de données
USE cilma_db;

-- Création de la table des étudiants
CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    matricule VARCHAR(50) NOT NULL,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    date_naissance DATE NOT NULL,
    filiere VARCHAR(100) NOT NULL
);

-- Insertion de quelques données d'exemple
INSERT INTO students (matricule, nom, prenom, date_naissance, filiere)
VALUES
    ('1001', 'Bagbo', 'Jean', '1999-02-11', 'Webdesign'),
    ('1002', 'Fongang', 'François', '1997-06-23', 'Webmaster'),
    ('1003', 'FOYET', 'Giresse', '2005-10-18', 'Développement web');
