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
    <title>Private SPA - Nos prestations, tarifs et comment réserver</title>
    <meta name="description" content="Private SPA - Profitez d’un moment de détente en toute intimité, SAUNA - HAMMAM - JACUZZI 100% PRIVATIF.">
</head>

<body>
    <div class="container-fluid">
        <?php
        include_once "./includes/header.php"
        ?>
        <main>

            <!--NOS PRESTATIONS-->

            <div class="presentation presentationreservation bg-light">
                <h1>Nos prestations</h1>
                <div class="reservation">
                    <h3>Vous souhaitez réserver un espace privatif chez Private SPA</h3><br>
                    <ul>
                        <li>1. Les réservations se font uniquement par téléphone au
                            <a href="tel:+33618363736"><b>06&nbsp;18&nbsp;36&nbsp;37&nbsp;36</b></a>
                        </li>
                        <li>2. Un acompte par carte ou via PayPal vous sera demandé par téléphone lors de la
                            réservation.</li>
                        <li>3. Le reste du paiement sera à effectuer sur place par PayPal ou en espèces avant la séance.
                        </li><br>
                        <li class="petit">- Modifications possible jusqu’à 48h avant le rendez-vous.</li>
                        <li class="petit">- Les réservations de groupe mixte ne sont pas acceptées.</li>
                    </ul>
                </div>
                <div class="row grilletarifaire">
                    <h2><b>NOS TARIFS</b></h2>
                    <p>Tarifs en vigueur à partir du 1er avril 2023.</p>

                    <!-- AFFICHAGE OFFRE PROMOTIONNELLE PAR L'ADMINISTRATEUR -->
                    
                    <?php
                    include_once "./includes/connexionbdd.php";
                    $sql = "SELECT * FROM promotion ORDER BY id DESC LIMIT 1";
                    $requete = $connexion->query($sql);
                    if ($requete->rowCount() > 0) {
                        $promotion = $requete->fetch(PDO::FETCH_ASSOC);
                        echo '<div class="col-12 col-lg-6 offset-lg-3 tarifs">
                        <div class="sousgrille">
                            <h3 style="color:red;">PROMOTION SPECIALE ' . $promotion['nom'] . '</h3><span style="color:brown;font-weight:bold">' . $promotion['jour'] . '</span><br><br><p>2 HEURES 2 PERSONNES<br>' .
                            $promotion['tarif1'] . '€/pers.</p><p>3 HEURES 2 PERSONNES<br>' . $promotion['tarif2'] . '€/pers.</p><ul><li>+' .
                            $promotion['supplement'] . '€/pers. supplémentaire</li><li>De 2 à 5 personnes maximum.</li></ul></div></div>';
                    }
                    ?>

                    <div class="col-12 col-md-6 tarifs">
                        <div class="sousgrille">
                            <h3>Tarifs semaine</h3>
                            <span>Du lundi au vendredi</span><br><br>
                            <p>2 HEURES 2 PERSONNES<br>
                                45€/pers.</p>
                            <p>3 HEURES 2 PERSONNES<br>
                                65€/pers.</p>
                            <ul>
                                <li>+30€/pers. supplémentaire</li>
                                <li>De 2 à 5 personnes maximum.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 tarifs">
                        <div class="sousgrille">
                            <h3>Tarifs week-end</h3>
                            <span>Samedi & dimanche</span><br><br>
                            <p>2 HEURES 2 PERSONNES<br>
                                50€/pers.</p>
                            <p>3 HEURES 2 PERSONNES<br>
                                70€/pers.</p>
                            <ul>
                                <li>+35€/pers. supplémentaire</li>
                                <li>De 2 à 5 personnes maximum.</li>
                            </ul>
                        </div>
                    </div>
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