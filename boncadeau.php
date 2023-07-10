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
    <title>Private SPA - Offrez un bon cadeau</title>
    <meta name="description" content="Private SPA - Profitez d’un moment de détente en toute intimité, SAUNA - HAMMAM - JACUZZI 100% PRIVATIF.">
</head>

<body>
    <div class="container-fluid">
        <?php
        include_once "./includes/header.php"
        ?>
        <main>

            <!--BON CADEAU-->
            
            <div class="presentation presentationboncadeau bg-light">
                <h1>Envie d'offrir ?</h1><br>
                <p>Envie de faire plaisir à vos proches en leur offrant une expérience de&nbsp;bien&#8209;être&nbsp;?
                </p>
                <p>Pensez aux bons cadeaux Private SPA pour leur offrir un moment&nbsp;d'exception.</p>
                <p>Une belle idée de cadeau qui ne pourra que faire des&nbsp;heureux.</p>
                <p class="bold">Appelez nous au <a href="tel:+33618363736"><b>06&nbsp;18&nbsp;36&nbsp;37&nbsp;36</b></a>
                    on
                    s'occupe de tout&nbsp;!</p><br>
                <img src="./assets/images/boncadeau.webp" alt="bon cadeau">
            </div>
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