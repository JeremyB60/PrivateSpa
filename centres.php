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
    <title>Private SPA - 2 centres SPA et Piscine</title>
    <meta name="description" content="Private SPA - Profitez d’un moment de détente en toute intimité, SAUNA - HAMMAM - JACUZZI 100% PRIVATIF.">
</head>

<body id="pageCentres">
    <div class="container-fluid bg-light">
        <?php
        include_once "./includes/header.php"
        ?>
        <main>

            <!--NOS CENTRES-->
            
            <div class="presentation presentationnoscentres">
                <h1>Découvrez nos centres dédiés au bien&#8209;être</h1><br>
                <p>Private SPA vous propose une expérience unique de bien-être 100%&nbsp;privative.</p>
                <p>5 salles dont 2 avec piscine réparties en&nbsp;2&nbsp;centres&nbsp;à&nbsp;proximité.</p>
            </div>
            <?php
            include_once "./includes/noscentres.php"
            ?>
            <div class="localisation text-center mb-5">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10418.258509878011!2d2.4638745!3d49.2467431!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e649bd31a378f5%3A0x6f088d555936be21!2sPrivate%20Spa!5e0!3m2!1sfr!2sfr!4v1676934491384!5m2!1sfr!2sfr" width="80%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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