<?php
session_start();
if (!isset($_SESSION["userrole"])) {
    header("Location: compte.php");
} else if (isset($_SESSION['userrole']) && ($_SESSION['userrole']) == 'admin') {
    header('Location: profiladmin.php');
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

            <!--PROFIL INFORMATIONS-->

            <div class="monprofil bg-light text-center">
                <a href="./profil.php">
                    <h1>Mon profil</h1>
                </a><span class="deco"><a href='./deconnexion.php'>Déconnexion</a></span>
                <?php
                echo "<p class='bienvenue'><b>Bienvenue " . ucwords($_SESSION['prenom']) . "&nbsp;" . ucwords($_SESSION['nom']) . "</b></p>";
                ?>
                <div class="row sousparties">
                    <div class="col-12 col-md-6 informations space2">
                        <div class="informations2 bg-white p-3">
                            <h2>Mes informations</h2><br>

                            <!-- AFFICHAGE DES INFORMATIONS PERSONNELLES -->

                            <?php
                            echo "<p>Adresse mail : " . $_SESSION['mail'] . "</p>";
                            echo "<p>Nom : " . ucwords($_SESSION['nom']) . "</p>";
                            echo "<p>Prénom : " . ucwords($_SESSION['prenom']) . "</p>";
                            echo "<p>Téléphone : " . $_SESSION['telephone'] . "</p>";
                            echo "<p>Né(e) le : " . $_SESSION['naissance'] . "</p>";
                            echo "<p>Code Postal : " . $_SESSION['codepostal'] . "</p>";
                            echo "<p>Ville : " . ucwords($_SESSION['ville']) . "</p>";
                            ?>
                            <a href="./profilupdate.php"><button class="form-control">Mettre à jour mes informations</button></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 motdepasse">
                        <div class="motdepasse2 bg-white p-3">
                            <h2>Mon mot de passe</h2>
                            <a href="./profilmdp.php"><button class="form-control mt-4">Modifier</button></a>
                        </div>
                    </div>
                </div>
                <div class="simuler mt-5">
                    <span class="simulerBouton"><a href='./simulation.php'>Simuler une réservation</a></span>
                </div>

                <div class="mesdemandescontact my-5">

                    <!-- DEMANDES DE CONTACT -->

                    <h2>Mes demandes de contact</h1>
                        <?php
                        include_once "./includes/connexionbdd.php";
                        $mail = $_SESSION['mail'];
                        $sql = "SELECT * FROM contacts WHERE mail='$mail' ORDER BY id DESC";
                        $requete = $connexion->query($sql);
                        $contacts = $requete->fetchAll(PDO::FETCH_ASSOC);
                        if ($requete->rowCount() == 0) {
                            echo "Aucune demande.";
                        } else {
                            echo '<table>';
                            foreach ($contacts as $contact) {
                                $date = $contact['dateenvoi'];
                                $date_inversee = date("d-m-Y à H:i", strtotime($date)); ?>
                                <?php echo "<tr class='bg-dark' style='color: var(--color3)'><td class='px-3 py-1'>Votre demande du " . $date_inversee . "</td></tr>"; ?>
                                <?php echo "<tr><td class='p-3'>" . $contact['messages'] . "</tr></td>";
                                if ($contact['statut'] == 'Clos') {
                                    echo "<tr><td class='p-1'><i>Une réponse vous a été faite par mail.</i></tr></td>";
                                } else {
                                    echo "<tr><td class='p-1'><i>Demande en attente de traitement.</i></tr></td>";
                                }
                                ?>
                        <?php }
                            echo '</table>';
                        } ?>
                </div>
            </div>
        </main>
        <?php
        include_once "./includes/footer.php"
        ?>
</body>

</html>