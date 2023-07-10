<?php
session_start();
if (!isset($_SESSION["userrole"])) {
    header("Location: compte.php");
} else if (isset($_SESSION['userrole']) && ($_SESSION['userrole']) == 'admin') {
    header('Location: profiladmin.php');
}
?>

<!--TRAITEMENT DES DONNEES A METTRE JOUR-->

<?php
if (!empty($_POST['envoyer'])) {
    include_once "./includes/fonctions.php";
    $email = strtolower($_POST['mail']);
    $validemail = secumail($email);
    $exist = rechercheMail($email);
    $validetel = verifytel($_POST['telephone']);
    $validecp = verifycp($_POST['cp']);
    $valideville = verifytext($_POST['ville']);
}
if (
    (!empty($_POST['envoyer']) && ($exist == 0)
        && ($validemail == 1) && ($validecp == 1)
        && ($validetel == 1) && ($valideville == 1)
    ) || (!empty($_POST['envoyer']) && $email == $_SESSION['mail']
        && ($validemail == 1) && ($validecp == 1)
        && ($validetel == 1) && ($valideville == 1)
    )
) {
    include_once "./includes/connexionbdd.php";
    $mail = secure($_POST["mail"]);
    $mail = strtolower($mail);
    $telephone = secure($_POST["telephone"]);
    $codepostal = secure($_POST["cp"]);
    $ville = secure($_POST["ville"]);
    $id = $_SESSION['idclient'];
    $sql = "UPDATE clients SET mail = :mail, telephone = :telephone, codepostal = :codepostal, ville = :ville WHERE idclient = '$id'";
    $insertion = $connexion->prepare($sql);
    $insertion->bindParam(":mail", $mail, PDO::PARAM_STR);
    $insertion->bindParam(":telephone", $telephone, PDO::PARAM_STR);
    $insertion->bindParam(":codepostal", $codepostal, PDO::PARAM_INT);
    $insertion->bindParam(":ville", $ville, PDO::PARAM_STR);
    $insertion->execute();
    $_SESSION['mail'] = $mail;
    $_SESSION['telephone'] = $telephone;
    $_SESSION['codepostal'] = $codepostal;
    $_SESSION['ville'] = $ville;
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
                echo "<p class='bienvenue'><b>Bienvenue " . ucwords($_SESSION['prenom']) . " " . ucwords($_SESSION['nom']) . "</b></p>";
                ?>
                <div class="row sousparties">
                    <div class="col-12 col-md-6 informations space2">
                        <div class="informations2 bg-white p-3">
                            <h2>Mes informations</h2><br>

                            <!--FORMULAIRE DE MISE A JOUR-->

                            <form action="" method="POST" id="modifierInformations">
                                <label for="mail">Mail</label><br>
                                <input class="form-control" type="text" name="mail" maxlength="200" value="<?php echo $_SESSION['mail'] ?>" required>
                                <?php
                                if (!empty($_POST['envoyer']) && ($exist == 1) && ($email != $_SESSION['mail'])) {
                                    echo "<span style='color:red'>Mail déjà existant</span><br>";
                                } else if (!empty($_POST['envoyer']) && ($validemail == 0)) {
                                    echo "<span style='color:red'>Mail non valide</span><br>";
                                }
                                ?><br>
                                <label for="telephone">Telephone</label><br>
                                <input class="form-control" type="tel" name="telephone" maxlength="12" value="<?php echo $_SESSION['telephone'] ?>" required>
                                <?php
                                if ((!empty($_POST['envoyer'])) && ($validetel != 1)) {
                                    echo "<span style='color:red'>* Le numéro de téléphone n'est pas valide.</span><br>";
                                }
                                ?><br>
                                <label for="cp">Code Postal</label><br>
                                <input class="form-control" type="number" name="cp" value="<?php echo $_SESSION['codepostal'] ?>" required>
                                <?php
                                if ((!empty($_POST['envoyer'])) && ($validecp != 1)) {
                                    echo "<span style='color:red'>* Le code postal doit contenir 5 chiffres.</span><br>";
                                }
                                ?><br>
                                <label for="ville">Ville</label><br>
                                <input class="form-control" type="text" name="ville" maxlength="50" value="<?php echo ucwords($_SESSION['ville']) ?>" required>
                                <?php
                                if ((!empty($_POST['envoyer'])) && ($valideville != 1)) {
                                    echo "<span style='color:red'>* Ville n'est pas valide.</span><br>";
                                }
                                ?><br>
                                <input id="changeenvoyer" class="form-control mt-2" type="submit" name="envoyer" value="Mettre à jour">
                                <?php
                                if (
                                    (!empty($_POST['envoyer']) && ($exist == 0)
                                        && ($validemail == 1) && ($validecp == 1)
                                        && ($validetel == 1) && ($valideville == 1)
                                    ) || (!empty($_POST['envoyer']) && $email == $_SESSION['mail']
                                        && ($validemail == 1) && ($validecp == 1)
                                        && ($validetel == 1) && ($valideville == 1)
                                    )
                                ) {
                                    echo "<meta http-equiv='refresh' content='0'>";
                                    echo "<script type='text/JavaScript'> 
                                    $(document).ready(function () {
                                    alert('Vos informations ont été mises à jour.');
                                    });
                                    </script>";
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 motdepasse">
                        <div class="motdepasse2 bg-white p-3">
                            <h2>Mon mot de passe</h2>
                            <a href="./profilmdp.php"><button class="form-control mt-4">Modifier</button></a>
                        </div>


                    </div>
                </div>
        </main>
        <?php
        include_once "./includes/footer.php"
        ?>
</body>

</html>