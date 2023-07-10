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
    <title>Private SPA - Nos forces, votre sécurité</title>
    <meta name="description" content="Private SPA - Profitez d’un moment de détente en toute intimité, SAUNA - HAMMAM - JACUZZI 100% PRIVATIF.">
</head>

<body>
    <div class="container-fluid">
        <?php
        include_once "./includes/header.php"
        ?>
        <main>

            <!--NOS FORCES-->

            <div class="nosforces bg-light">
                <h1>Nos forces</h1><br>
                <div class="presentationnosforces bg-white">

                    <!-- CALCUL ANNEE D'EXPERIENCE EN PHP -->

                    <h2><?php
                        $aujourdhui = date("Y");
                        $diff = $aujourdhui - 2016;
                        echo $diff;
                        ?> ans d’expérience dans la désinfection de nos espaces privatifs&nbsp;:</h2>
                    <p>Depuis nos débuts en 2017, notre obsession, au-delà de vous offrir des espaces privatifs uniques
                        dans
                        leur conception et dans leur décoration, a été d’assurer une hygiène parfaite et proche de ce
                        qui se
                        pratique dans les hôpitaux. En effet nous avons toujours opté pour des produits de nettoyage et
                        de
                        désinfection labellisés avec des protocoles élaborés en collaboration avec les fournisseurs
                        agréés
                        de ces produits.</p>
                    <h2>Infrastructures pensées :</h2>
                    <p>Dans les faits, nous disposons de 30 minutes pour nettoyer et passer au crible chaque recoin de
                        nos
                        espaces privatifs. Ces derniers ont notamment été étudié en amont lors de leur création pour
                        faciliter au mieux l’entretien et limiter les zones restreintes qui nous empêcherait un accès
                        confortable pendant le nettoyage.<br>
                        Par ailleurs, nous privilégions des qualités de matériaux supérieurs qui s’entretiennent
                        facilement
                        et qui supportent une charge fréquente et régulière de produits chimiques et antimicrobiens.</p>
                    <h2>Du personnel formé :</h2>
                    <p>Dès leur embauche, nos équipes sont formées avant toute chose à la qualité de l’entretien de nos
                        locaux. Nous avons développé des techniques de nettoyage appropriées intégrant procédures,
                        fréquence
                        et agents utilisés pour chaque type de surface.<br>
                        De plus, des formations continues et régulières sont maintenues pour s’assurer que les
                        procédures
                        soient respectées et que les compétences des collaborateurs soient toujours en adéquation avec
                        les
                        engagements pris lors de leur prise de fonction.<br>
                        Pour s’assurer du respect des protocoles d’hygiène au quotidien, des contrôles sont effectués de
                        façon récurrente dans tous nos établissements.</p>
                </div>
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