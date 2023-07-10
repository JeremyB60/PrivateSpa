<?php
session_start()
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
    <title>Private SPA - Plan du site</title>
    <meta name="description" content="Private SPA - Profitez d’un moment de détente en toute intimité, SAUNA - HAMMAM - JACUZZI 100% PRIVATIF.">
</head>

<body>
    <div class="container-fluid">
        <?php
        include_once "./includes/header.php"
        ?>
        <main>

            <!-- PLAN DU SITE-->

            <div class="plandusite bg-light">
                <h1>Plan du site</h1>
                <ul>
                    <li>
                        <ul><a href="./index.php">Accueil</a>
                            <li><a href="./forces.php">Nos forces</a></li>
                    </li>
                </ul>
                <li><a href="./concept.php">Notre concept</a></li>
                <li><a href="./galerie.php">Galerie</a></li>
                <li><a href="./prestations.php">Nos prestations</a></li>
                <li><a href="./boncadeau.php">Bon cadeau</a></li>
                <li><a href="./compte.php">Mon compte</a></li>
                <li><a href="./livredor.php">Livre d'or</a></li>
                <li><a href="./contact.php">Contact</a></li>

                </ul>
        </main>
        <?php
        include_once "./includes/footer.php"
        ?>
</body>

</html>