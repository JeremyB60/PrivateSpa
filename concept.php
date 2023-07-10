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
    <title>Private SPA - Découvrez notre concept 100% privatif</title>
    <meta name="description" content="Private SPA - Profitez d’un moment de détente en toute intimité, SAUNA - HAMMAM - JACUZZI 100% PRIVATIF.">
</head>

<body id="pageConcept">
    <div class="container-fluid bg-light">
        <?php
        include_once "./includes/header.php"
        ?>
        <main>

            <!--CONCEPT-->

            <div class="banniereconcept">
                <h1 class="text-center"><b>Private SPA, votre destination bien&#8209;être</b></h1><br>
                <p>Private SPA propose une expérience unique de&nbsp;bien&#8209;être&nbsp;100%&nbsp;privative.<br>
                    Coupez avec votre quotidien et prenez soin&nbsp;de&nbsp;vous.</p>
            </div>
            <div class="presentation bg-light">
                <h2>Jacuzzi, Sauna, Hammam rien que pour vous !</h2><br>
                <p>Le spa privatif "Private SPA" est un merveilleux endroit pour se remettre en forme.<br>Les bienfaits
                    de
                    l’eau et de la chaleur sur le corps sont indéniables et permettent de détendre pleinement les
                    muscles,
                    tout en profitant d’un instant de plaisir exceptionnel.<br>Notre concept est de mettre à disposition
                    cet
                    espace de bien-être rien que pour vous.<br><br><b>Lorsque vous réservez, la totalité des
                        installations
                        est
                        privatisée pour vous permettre de vous ressourcer en toute intimité.</b></p>
            </div>

            <!-- SLIDER JAVASCRIPT -->

            <div class="row presentationconcept">
                <div class="col-12 col-md-4 sliderbox">
                    <div class="slider">
                        <a href="./assets/images/1.webp"><img src="./assets/images/1.webp" alt="interieur spa"></a>
                        <a href="./assets/images/2.webp"><img src="./assets/images/2.webp" alt="interieur spa"></a>
                        <a href="./assets/images/3.webp"><img src="./assets/images/3.webp" alt="interieur spa"></a>
                        <a href="./assets/images/4.webp"><img src="./assets/images/4.webp" alt="interieur spa"></a>
                        <a href="./assets/images/5.webp"><img src="./assets/images/5.webp" alt="interieur spa"></a>
                        <a href="./assets/images/6.webp"><img src="./assets/images/6.webp" alt="interieur spa"></a>
                        <a href="./assets/images/7.webp"><img src="./assets/images/7.webp" alt="interieur spa"></a>
                        <a href="./assets/images/8.webp"><img src="./assets/images/8.webp" alt="interieur spa"></a>
                        <a href="./assets/images/9.webp"><img src="./assets/images/9.webp" alt="interieur spa"></a>
                        <a href="./assets/images/10.webp"><img src="./assets/images/10.webp" alt="interieur spa"></a>
                        <a href="./assets/images/11.webp"><img src="./assets/images/11.webp" alt="interieur spa"></a>
                        <a href="./assets/images/12.webp"><img src="./assets/images/12.webp" alt="interieur spa"></a>
                    </div>
                </div>
                <div class="col-12 col-md-8 textslider">
                    <h3>Des espaces de bien-être privatifs</h3><br>
                    <img src="./assets/images/concept_serviettes.png" class="serviette" alt="décoration serviette">
                    <p>Chaque salle possède son propre hammam, son sauna, une douche, un jacuzzi, ainsi qu’un salon
                        privatif
                        pour vous relaxer.</p><br>
                    <p>Le spa est aujourd’hui reconnu pour ses nombreux bienfaits. Grâce à ses buses d’hydro-massage, le
                        spa
                        permet d’obtenir des massages précis et efficaces. L’association de la chaleur et du massage
                        apaise
                        tout autant le corps et l’esprit, la santé et le mental.</p><br>
                    <p>Le sauna est apprécié pour les biens-faits qu’il procure à la fois au corps et à l’esprit. La
                        forte
                        chaleur qui y règne provoque une abondante sudation permettant l’élimination des toxines
                        accumulées.
                    </p><br>
                    <p>Le hammam permet de soulager le stress. La vapeur chaude ouvre les pores de la peau. Il élimine
                        la
                        saleté et les bactéries, libère les sinus et les voies nasales, apaise les douleurs musculaires
                        et
                        facilite la respiration.</p><br>
                    <p class="bold">Si vous avez envie de vous évader et de vous chouchouter, découvrez l’expérience
                        unique
                        Private&nbsp;SPA.</p>
                </div>
            </div>
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
        <script src="./assets/js/sliderConcept.js"></script>
</body>

</html>