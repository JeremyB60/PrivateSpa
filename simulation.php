<?php
session_start();
if (!isset($_SESSION["userrole"])) {
    header("Location: compte.php");
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
    <title>Private SPA - Offrez un bon cadeau</title>
    <meta name="description" content="Private SPA - Profitez d’un moment de détente en toute intimité, SAUNA - HAMMAM - JACUZZI 100% PRIVATIF.">
</head>

<body>
    <div class="container-fluid">
        <?php
        include_once "./includes/header.php"
        ?>
        <main>
            <div class="presentation presentationsimulation bg-light">
                <h1>SIMULER UNE RESERVATION (hors promo)</h1>

                <!-- FORMULAIRE DE RESERVATION -->

                <label for="nombre" class="mt-4">Combien de personnes ?</label>
                <select class="form-select form-select-sm simulationNombre text-center p-0 mb-2" name="nombre" aria-label=".form-select-sm example">
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <label for="jour">Semaine ou Week-end ?</label>
                <select class="form-select form-select-sm simulationJour text-center p-0 mb-2" name="jour" aria-label=".form-select-sm example">
                    <option value="semaine">Semaine</option>
                    <option value="weekend">Week-end</option>
                </select>
                <label for="duree">Pour quelle durée ?</label>
                <select class="form-select form-select-sm simulationDuree text-center p-0 mb-2" name="duree" aria-label=".form-select-sm example">
                    <option value="2">2h</option>
                    <option value="3">3h</option>
                </select>

                <button class="form-control validerSimulation mt-3 mb-3 w-50">Valider</button>

                <!-- RESULTAT RESERVATION JAVASCRIPT -->

                <div class="simulationResultat">
                    <label for="tarif">Prix total</label><br>
                    <input class="form-control simulationTarif" type="text" name="tarif" readonly> <br>
                    <label for="tarifPersonne">Prix par personne</label><br>
                    <input class="form-control simulationTarifPersonne" type="text" name="tarifPersonne" readonly> <br>
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
        <script src="./assets/js/simulation.js"></script>

</body>

</html>