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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="./assets/images/logosolo.png">
    <title>Private SPA - Spa 100% privatif à Creil près de Paris</title>
    <meta name="description" content="Private SPA - Profitez d’un moment de détente en toute intimité, SAUNA - HAMMAM - JACUZZI 100% PRIVATIF.">

</head>

<body id="pageAccueil">
    <div class="container-fluid">
        <?php
        include_once "./includes/header.php"
        ?>
        <main>

            <!--ACCUEIL-->
            
            <div class="banniere">
                <h1>L'expérience Private SPA</h1>
            </div>
            <div class="presentation">
                <h2 class="mb-0">Découvrez notre complexe dédié au bien&#8209;être</h2>
                <span>&mdash;&mdash;&mdash;</span>
                <p class="bold mt-1">Private SPA, votre destination bien&#8209;être</p>
                <p>Private SPA propose une expérience unique de bien-être 100%&nbsp;privative.</p>
                <p>Coupez avec votre quotidien et prenez soin&nbsp;de&nbsp;vous.</p>
                <p>Pour ne pas laisser l'occasion de passer un moment inoubliable consultez <a href="./prestations.php">nos&nbsp;prestations</a>.
                </p><br>
                <a class="btn btn-dark" href="./concept.php">Découvrez le concept Private&nbsp;SPA</a>
            </div>
            <?php
            include_once "./includes/noscentres.php"
            ?>
            <?php
            include_once "./includes/choix.php"
            ?>
            <?php
            include_once "./includes/nosplus.php"
            ?>
            <?php
            include_once "./includes/suiveznous.php"
            ?>
        </main>
        <?php
        include_once "./includes/footer.php"
        ?>
</body>

</html>