<?php

//*********************RECHERCHE MAIL DEJA EXISTANT DANS BDD*********************
function rechercheMail($mail)
{
    $servername = "localhost"; //A PRECISER
    $dbname = "privatespa"; //A PRECISER
    $username = "root"; //A PRECISER
    $password = ""; //A PRECISER
    $compteur = 0;

    try {
        $connexion = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    catch (PDOException $e) {
        $fichier = fopen("errorfct.log", "a+");
        setlocale(LC_TIME, 'fr_FR');
        date_default_timezone_set('Europe/Paris');
        fwrite($fichier, date("d/m/Y h:i:s") . " : " . $e->getMessage() . "\n");
        fclose($fichier);
    }
    $sql = "SELECT * FROM clients"; //A PRECISER
    $requete = $connexion->query($sql);
    $user = $requete->fetchAll();
    for ($i = 0; $i < count($user); $i++) {
        foreach ($user[$i] as $cle => $valeur) {
            if ($valeur == strtolower($mail)) { 
                $compteur++;
            }
        }
    }
    return $compteur;
}

//********************************SECURITE*********************************
function secure($saisie)
{
    $saisie = htmlspecialchars($saisie); //Convertit les caractères spéciaux en entités HTML
    $saisie = trim($saisie); //Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
    $saisie = stripslashes($saisie); // Supprime les antislashs d'une chaîne
    $regex1 = "&lt;";
    $regex2 = "&gt;";
    $regex3 = "<";
    $regex4 = ">";
    if (preg_match("/$regex1|$regex2|$regex3|$regex4/i", $saisie)) { // "/i" n'est plus sensible à la casse
        $saisie = str_ireplace($regex1, "", $saisie);
        $saisie = str_ireplace($regex2, "", $saisie);
        $saisie = str_ireplace($regex3, "", $saisie);
        $saisie = str_ireplace($regex4, "", $saisie);
    }
    return $saisie;
}

//********************************MAIL*********************************
function secumail($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 1;
    } else {
        return 0;
    }
}

//********************************LONGUEUR MDP*********************************
function secumdp($mdp)
{
    if ((strlen($mdp) < 8) || (strlen($mdp) > 20)) {
        return 0;
    } else {
        return 1;
    }
}

//********************************TEXTE(chiffres compris)*********************************
function verifytext($text) {
    if(preg_match("/^[\wÀ-ÿ'\d\.\-\s\,\!\?\;\:]+$/", $text)) {
        return 1;
    } else {
        return 0;
    }
}

//********************************NUMERO*********************************
function verifynum($num) {
    if(preg_match("/^[\d]+$/", $num)) {
        return 1;
    } else {
        return 0;
    }
}

//********************************TELEPHONE FRANCE*********************************
function verifytel($tel) {
    if((preg_match("/^[+][\d]{11}$/", $tel)) || (preg_match("/^[\d]{10}$/", $tel))) { //'+' autorisé au début
        return 1;
    } else {
        return 0;
    }
}

//********************************CODE POSTAL*********************************
function verifycp($cp) {
    if(preg_match("/^\d{5}$/", $cp)) {
        return 1;
    } else {
        return 0;
    }
}
