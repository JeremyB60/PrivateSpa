<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

</head>

<body>
    <!--NOS PLUS ICONES-->
    <div class="row nosplus">
        <h2>NOS PLUS</h2>
        <div class="col-12 col-sm-6 col-md-3 d-flex justify-content-center align-items-center flex-column">
            <img src="./assets/images/icone1.svg" alt="privatif">
            <h3>100% Privatif</h3>
        </div>
        <div class="col-12 col-sm-6 col-md-3 d-flex justify-content-center align-items-center flex-column">
            <img src="./assets/images/icone2.webp" alt="respect hygiène">
            <h3>Respect des normes d'hygiène</h3>
        </div>
        <div class="col-12 col-sm-6 col-md-3 d-flex justify-content-center align-items-center flex-column">
            <img src="./assets/images/icone3.webp" alt="offre variée">
            <h3>Offre variée</h3>
        </div>
        <div class="col-12 col-sm-6 col-md-3 d-flex justify-content-center align-items-center flex-column">
            <img src="./assets/images/icone4.webp" alt="expérience">
            <h3><?php
                $aujourdhui = date("Y");
                $diff = $aujourdhui - 2016;
                echo $diff;
                ?> ans d'expérience</h3>
        </div>
    </div>
</body>

</html>