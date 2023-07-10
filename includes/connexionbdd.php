<?php
//VARIABLES DE CONNEXION
$servername = "localhost";
$username = "root";
$dbname = "privatespa";
$password = "";

//TESTE LA CONNEXION ET SI N'EXISTE PAS CREATION BDD
try {
    $connexion = new PDO("mysql:host=$servername;charset=utf8", "$username", "$password");
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8 COLLATE utf8_bin";
    $connexion->exec($sql);
}

//CAPTURE LES ERREURS AVEC PDOException DANS UN FICHIER error.log
catch (PDOException $e) {
    $fichier = fopen("error.log", "a+"); //creation fichier pour récupérer les erreurs
    setlocale(LC_TIME, 'fr_FR');
    date_default_timezone_set('Europe/Paris');
    fwrite($fichier, date("d/m/Y h:i:s") . " : " . $e->getMessage() . "\n");
    fclose($fichier);
};

//CONNEXION A LA BDD ET SI N'EXISTE PAS CREATION DE TABLES
try {
    $connexion = new PDO("mysql:host=$servername; dbname=$dbname;charset=utf8", $username, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $sql = "CREATE TABLE IF NOT EXISTS clients (
        idclient INT AUTO_INCREMENT PRIMARY KEY,
        mail VARCHAR(200) NOT NULL,
        nom VARCHAR(50) NOT NULL,
        prenom VARCHAR(50) NOT NULL,
        mdp VARCHAR(200) NOT NULL,
        naissance DATE,
        telephone VARCHAR(12), /* ne pas mettre INT car max atteint */
        codepostal INT(5),
        ville VARCHAR(50),
        userrole VARCHAR(20),
        dateinscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) CHARACTER SET utf8 COLLATE utf8_bin"; //spécifie le jeu de caractère utilisé
    $connexion->exec($sql);
    $sql1 = "CREATE TABLE IF NOT EXISTS livredor (
        id INT AUTO_INCREMENT PRIMARY KEY,
        mail VARCHAR(200) NOT NULL,
        commentaire VARCHAR(400) NOT NULL,
        dateenvoi TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) CHARACTER SET utf8 COLLATE utf8_bin";
    $connexion->exec($sql1);
    $sql2 = "CREATE TABLE IF NOT EXISTS promotion (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR(200) NOT NULL,
        jour VARCHAR(200) NOT NULL,
        tarif1 INT(2) NOT NULL,
        tarif2 INT(2) NOT NULL,
        supplement INT(2) NOT NULL,
        dateenvoi TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) CHARACTER SET utf8 COLLATE utf8_bin";
    $connexion->exec($sql2);
    $sql3 = "CREATE TABLE IF NOT EXISTS contacts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        prenom VARCHAR(50) NOT NULL,
        nom VARCHAR(50) NOT NULL,
        mail VARCHAR(200) NOT NULL,
        telephone VARCHAR(12),
        messages VARCHAR(400),
        dateenvoi TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        statut VARCHAR(20)
    ) CHARACTER SET utf8 COLLATE utf8_bin";
    $connexion->exec($sql3);
}

catch (PDOException $e) { //RECUPERATION DES ERREURS DANS LE JOURNAL error.log
    $fichier = fopen("error.log", "a+");  //ouvre le fichier en mode lecture/écriture avec le pointeur à la fin
    setlocale(LC_TIME, 'fr_FR'); //localisation pour afficher l'heure selon les conventions françaises
    date_default_timezone_set('Europe/Paris'); //fuseau horaire
    fwrite($fichier, date("d/m/Y h:i:s") . " : " . $e->getMessage() . "\n"); //écrit la date, l'heure et le message d'erreur + retour à la ligne
    fclose($fichier);
};
