<?php
session_start();
if (!isset($_SESSION["userrole"])) {
    header("Location: compte.php");
} else if (isset($_SESSION['userrole']) && ($_SESSION['userrole']) != 'admin') {
    header('Location: profil.php');
}

// AJOUTER UNE PROMO

if (!empty($_POST['ajouter'])) {
    include_once "./includes/fonctions.php";
    $validenom = verifytext($_POST['nom']);
    $validejour = verifytext($_POST['jour']);
    $validetarif1 = verifynum($_POST['tarif1']);
    $validetarif2 = verifynum($_POST['tarif2']);
    $validesupplement = verifynum($_POST['supplement']);
}
if (
    !empty($_POST['ajouter'])
    && ($validenom == 1) && ($validejour == 1) && ($validetarif1 == 1)
    && ($validetarif2 == 1) && ($validesupplement == 1)
) {
    include_once "./includes/connexionbdd.php";
    $nom = secure($_POST["nom"]);
    $jour = secure($_POST["jour"]);
    $tarif1 = secure($_POST["tarif1"]);
    $tarif2 = secure($_POST["tarif2"]);
    $supplement = secure($_POST["supplement"]);

    $sql = 'INSERT INTO promotion (nom, jour, tarif1, tarif2, supplement)
                VALUES (:nom, :jour, :tarif1, :tarif2, :supplement)';

    $insertion = $connexion->prepare($sql);
    $insertion->bindParam(":nom", $nom, PDO::PARAM_STR);
    $insertion->bindParam(":jour", $jour, PDO::PARAM_STR);
    $insertion->bindParam(":tarif1", $tarif1, PDO::PARAM_INT);
    $insertion->bindParam(":tarif2", $tarif2, PDO::PARAM_INT);
    $insertion->bindParam(":supplement", $supplement, PDO::PARAM_INT);
    $insertion->execute();
    header('Location: prestations.php');
}

// CLORE UNE DEMANDE DE CONTACT

if (!empty($_POST['valider'])) {
    $choixContactRepondu = $_POST['choixContactRepondu'];
    include_once "./includes/connexionbdd.php";
    $sql = "UPDATE contacts SET statut = 'Clos' WHERE id = '$choixContactRepondu'";
    $requete = $connexion->query($sql);
    $retour = "Demande close !";
}

// SUPPRIMER UN MESSAGE SUR LE LIVRE D'OR

if (!empty($_POST['supprimer2'])) {
    $choixMessageSupp = $_POST['choixMessageSupp'];
    include_once "./includes/connexionbdd.php";
    $sql = "DELETE FROM livredor WHERE id = '$choixMessageSupp'";
    $requete = $connexion->query($sql);
    $retour = "Message supprimé !";
}

// SUPPRIMER UNE PROMO

if (!empty($_POST['supprimer'])) {
    $choixPromotion = $_POST['choixpromotion'];
    include_once "./includes/connexionbdd.php";
    $sql = "DELETE FROM promotion WHERE nom = '$choixPromotion'";
    $requete = $connexion->query($sql);
    $retour = "Promotion supprimée !";
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="icon" type="image/png" href="./assets/images/logosolo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>Private SPA - Mon profil</title>
    <meta name="description" content="Private SPA - Profitez d’un moment de détente en toute intimité, SAUNA - HAMMAM - JACUZZI 100% PRIVATIF.">
</head>

<body>
    <div class="container-fluid">
        <?php
        include_once "./includes/header.php"
        ?>
        <main>
            <div class="monprofil bg-light text-center">
                <h1 class="mt-4 p-1">PARTIE ADMIN</h1>
                </a><span class="deco"><a href='./deconnexion.php'>Déconnexion</a></span>

                <!-- LISTE DES CLIENTS -->

                <div class="clients mt-5">
                    <h2>Liste des inscrits</h2>
                </div>
                <div class="partieClients" style="overflow-x:auto;">
                    <?php
                    include "./includes/connexionbdd.php";
                    $sql = "SELECT idclient, mail, nom, prenom, naissance, telephone, codepostal, ville, dateinscription
                 FROM clients
                 WHERE userrole='client'";
                    echo "<table border=1><tr>";
                    echo "<th>IDCLIENT</th><th>MAIL</th><th>NOM</th><th>PRENOM</th><th>NAISSANCE</th><th>TELEPHONE</th>
                <th>CP</th><th>VILLE</th><th>DATE D'INSCRIPTION</th><th>PRISES<br>DE CONTACT</th><th>MESSAGES<br>LIVRE D'OR</th></tr>";
                    foreach ($connexion->query($sql) as $client) {
                        echo "<tr>";
                        foreach ($client as $cle => $valeur) {
                            $utilisateur = $client['mail'];
                            if ($cle == "naissance") {
                                $date_formattee = date('d/m/y', strtotime($valeur));
                                echo '<td>' . $date_formattee . '</td>';
                            } else if ($cle == "dateinscription") {
                                $date_formattee = date("d-m-Y H:i:s", strtotime($valeur));
                                echo '<td>' . $date_formattee . '</td>';
                            } else {
                                echo "<td> $valeur </td>";
                            }
                        }

                        // AJOUTE UNE COLONNE NOMBRE DE DEMANDES VIA CONTACT

                        $sql = "SELECT COUNT(*) FROM contacts WHERE mail = '$utilisateur'";
                        $requete = $connexion->query($sql);
                        $totalMessage = $requete->fetchColumn();
                        echo '<td>' . $totalMessage . '</td>';

                        // AJOUTE UNE COLONNE NOMBRE DE MESSAGES DANS LIVRE D'OR

                        $sql = "SELECT COUNT(*) FROM livredor WHERE mail = '$utilisateur'";
                        $requete = $connexion->query($sql);
                        $totalMessage = $requete->fetchColumn();
                        echo '<td>' . $totalMessage . '</td>';
                        echo "</tr>";
                    }
                    echo "</table><br<br>";
                    ?>
                </div>

                <!-- PAGE CONTACT -->
                <!-- AFFICHE LE NOMBRE DE DEMANDES EN ATTENTE -->

                <div class="voirContact">
                    <h2>Ticket Contact</h2>
                    <?php
                    include_once "./includes/connexionbdd.php";
                    $sql = "SELECT COUNT(*) FROM contacts WHERE statut = 'En attente'";
                    $requete = $connexion->query($sql);
                    $totalDemandes = $requete->fetchColumn();
                    if ($totalDemandes > 0) {
                        echo "<span>&ensp;" . $totalDemandes . " demande(s) en attente</span>";
                    }

                    ?>
                </div>
                <div class="partieVoirContact">

                    <!-- SELECT POUR CLORE UNE DEMANDE DE CONTACT-->

                    <?php
                    include_once "./includes/connexionbdd.php";
                    $sql = "SELECT id FROM contacts WHERE statut = 'En attente' ORDER BY id DESC";
                    $requete = $connexion->query($sql);
                    if ($requete->rowCount() == 0) {
                        echo "Aucune demande en attente.";
                    } else {
                        echo "<form method='POST'><select name='choixContactRepondu'>";
                        foreach ($requete as $msg) {
                            echo "<option>" . $msg['id'] . "</option>";
                        }
                        echo '</select><br>';
                    }
                    ?>
                    <input class="form-control mb-3" type="submit" name="valider" value="Clore la demande">
                    <?php
                    if (!empty($_POST['valider'])) {
                        echo "<b>" . $retour . "</b><br><script type='text/JavaScript'> 
            $(document).ready(function () {
            $('.partieVoirContact').show();
            });
            </script>";
                    }
                    ?>
                    </form>

                    <!-- AFFICHAGE DES DEMANDES DE CONTACT -->

                    <?php
                    $sql = "SELECT * FROM contacts ORDER BY id DESC";
                    $requete = $connexion->query($sql);
                    echo "<table border=1><tr>";
                    echo "<th>ID</th><th>PRENOM</th><th>NOM</th><th>MAIL</th><th>TELEPHONE</th><th>MESSAGE</th><th>DATE</th><th>STATUT</th></tr>";
                    foreach ($requete as $contact) {
                        echo "<tr>";
                        foreach ($contact as $cle => $valeur) {
                            echo "<td> $valeur </td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table><br<br>";
                    ?>
                </div>
                <!-- VOIR LES MESSAGES DU LIVRE D'OR -->

                <div class="voirLivredor">
                    <h2>Modération livre d'or</h2>
                </div>
                <div class="partieVoirlivredor">
                    <?php

                    // SELECT POUR SUPPRIMER UN MESSAGE DU LIVRE D'OR

                    include_once "./includes/connexionbdd.php";
                    $sql = "SELECT id FROM livredor ORDER BY id DESC";
                    $requete = $connexion->query($sql);
                    if ($requete->rowCount() == 0) {
                        echo "Livre d'or vide.";
                    } else {
                        echo "<form method='POST'><select name='choixMessageSupp'>";
                        foreach ($requete as $msg) {
                            echo "<option>" . $msg['id'] . "</option>";
                        }
                        echo '</select><br>';
                    }
                    ?>
                    <input class="form-control mb-3" type="submit" name="supprimer2" value="Supprimer le message">
                    <?php
                    if (!empty($_POST['supprimer2'])) {
                        echo "<b>" . $retour . "</b><br><script type='text/JavaScript'> 
                                $(document).ready(function () {
                                $('.partieVoirlivredor').show();
                                });
                                </script>";
                    }
                    ?>
                    </form>

                    <!-- AFFICHE LES MESSAGES DU LIVRE D'OR -->

                    <?php
                    $sql = "SELECT id, mail, commentaire FROM livredor ORDER BY id DESC";
                    $requete = $connexion->query($sql);
                    echo "<table border=1><tr>";
                    echo "<th>ID</th><th>MAIL</th><th>MESSAGE</th></tr>";
                    foreach ($requete as $message) {
                        echo "<tr>";
                        foreach ($message as $cle => $valeur) {
                            echo "<td> $valeur </td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table><br<br>";
                    ?>
                </div>

                <!-- FORMULAIRE AJOUTER UNE PROMOTION -->

                <div class="promotion">
                    <h2>Ajouter une promotion</h2>
                </div>
                <div class="partiePromotion">
                    <form action="" method="POST">
                        <label for="nom">Titre de la promotion</label><br>
                        <input class="form-control" type="text" name="nom" maxlength="50" required>
                        <?php
                        if ((!empty($_POST['ajouter'])) && ($validenom != 1)) {
                            echo "<b>* La saisie n'est pas valide.</b><script type='text/JavaScript'> 
                            $(document).ready(function () {
                            $('.partiePromotion').show();
                            });
                            </script>";
                        }
                        ?><br>
                        <label for="jour">Quel(s) jour(s) ?</label><br>
                        <input class="form-control" type="text" name="jour" maxlength="50" required>
                        <?php
                        if ((!empty($_POST['ajouter'])) && ($validejour != 1)) {
                            echo "<b>* La saisie n'est pas valide.</b><script type='text/JavaScript'> 
                            $(document).ready(function () {
                            $('.partiePromotion').show();
                            });
                            </script>";
                        }
                        ?><br>
                        <label for="tarif1">Tarif 2 heures 2 personnes</label><br>
                        <input class="form-control" type="number" max="99" name="tarif1" required> <br>
                        <label for="tarif2">Tarif 3 heures 2 personnes</label><br>
                        <input class="form-control" type="number" max="99" name="tarif2" required> <br>
                        <label for="supplement">Prix par personne supplémentaire</label><br>
                        <input class="form-control" type="number" name="supplement" max="99" required> <br>
                        <input class="form-control" type="submit" value="Ajouter la promotion" name="ajouter">
                    </form>
                </div>

                <!-- SUPPRIMER UNE PROMOTION -->
                <!-- AFFICHE LA PROMO EN COURS DANS LE TITRE -->

                <div class="supprimerPromotion">
                    <h2>Retirer une promotion</h2>
                    <?php
                    include_once "./includes/connexionbdd.php";
                    $sql = "SELECT nom FROM promotion ORDER BY id DESC LIMIT 1";
                    $requete = $connexion->query($sql);
                    if ($requete->rowCount() > 0) {
                        $promotion = $requete->fetch(PDO::FETCH_ASSOC); //fetch plutôt que foreach car 1 seul résultat à afficher
                        echo "<span>&ensp;PROMO EN COURS &laquo " . $promotion['nom'] . " &raquo;<span>";
                    }
                    ?>
                </div>

                <!-- SELECT POUR SUPPRIMER LA PROMO -->

                <div class="partieSupprimerPromotion">
                    <?php
                    include_once "./includes/connexionbdd.php";
                    $sql = "SELECT nom FROM promotion ORDER BY id DESC";
                    $requete = $connexion->query($sql);
                    if ($requete->rowCount() == 0) {
                        echo "Aucune promotion actuellement.";
                    } else {
                        echo "<form method='POST'><select name='choixpromotion'>";
                        foreach ($requete as $promo) {
                            echo "<option>" . $promo['nom'] . "</option>";
                        }
                        echo '</select><br>';
                    }
                    ?>
                    <input class="form-control" type="submit" name="supprimer" value="Supprimer la promotion">
                    <?php
                    if (!empty($_POST['supprimer'])) {
                        echo "<b>" . $retour . "</b><br><script type='text/JavaScript'> 
                                $(document).ready(function () {
                                $('.partieSupprimerPromotion').show();
                                });
                                </script>";
                    }
                    ?>
                    </form>
                </div>
            </div>
        </main>
        <?php
        include_once "./includes/footer.php"
        ?>
</body>

</html>