<?php
session_start();
if (!isset($_SESSION["userrole"])) {
    header("Location: compte.php");
} else if (isset($_SESSION['userrole']) && ($_SESSION['userrole']) == 'admin') {
    header('Location: profiladmin.php');
}
?>

<!-- MODIFIER MOT DE PASSE -->

<?php 
if (!empty($_POST['modifier'])) {
    include_once "./includes/connexionbdd.php";
    $actuel = $_POST['actuel'];
    $mail = $_SESSION['mail'];
    $sql = "SELECT mdp FROM clients WHERE mail = '$mail'";
    $requete = $connexion->query($sql);
    $user = $requete->fetch();
    include_once "./includes/fonctions.php";
    $validemdp = secumdp($_POST['nouveau']);
    if (password_verify($actuel, $user['mdp'])) {
        if (
            ($_POST['nouveau'] == $_POST['confirmation'])
            && ($validemdp == 1)
        ) {
            $nouveau = $_POST['nouveau'];
            $mdphash = password_hash($nouveau, PASSWORD_DEFAULT);
            $sql1 = "UPDATE clients SET mdp = :mdp WHERE mail = '$mail'";
            $insertion = $connexion->prepare($sql1);
            $insertion->bindParam(":mdp", $mdphash);
            $insertion->execute();
        }
    }
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
                echo "<p class='bienvenue'><b>Bienvenue " . ucwords($_SESSION['prenom']) . "&nbsp;" . ucwords($_SESSION['nom']) . "</b></p>";
                ?>
                <div class="row sousparties sousparties2">
                    <div class="col-12 col-md-6 informations">
                        <div class="informations2 bg-white p-3">
                            <h2>Mes informations</h2><br>
                            <?php
                            echo "<p>Adresse mail : " . $_SESSION['mail'] . "</p>";
                            echo "<p>Nom : " . ucwords($_SESSION['nom']) . "</p>";
                            echo "<p>Prénom : " . ucwords($_SESSION['prenom']) . "</p>";
                            echo "<p>Téléphone : " . $_SESSION['telephone'] . "</p>";
                            echo "<p>Né(e) le : " . $_SESSION['naissance'] . "</p>";
                            echo "<p>Code Postal : " . $_SESSION['codepostal'] . "</p>";
                            echo "<p>Ville : " . ucwords($_SESSION['ville']) . "</p>";
                            ?>
                            <a href="./profilupdate.php"><button class="form-control">Mettre à jour mes informations</button></a>
                        </div>
                    </div>

                    <!-- FORMULAIRE POUR MODIFIER LE MOT DE PASSE -->

                    <div class="col-12 col-md-6 motdepasse space2">
                        <div class="motdepasse2 bg-white p-3">
                            <h2>Mon mot de passe</h2>
                            <form action="" method="POST" class="mt-4">
                                <label for="actuel">Mot de passe actuel</label><br>
                                <input class="form-control" type="password" name="actuel" required>
                                <?php
                                if (!empty($_POST['modifier']) && (password_verify($actuel, $user['mdp']))) {
                                    if (
                                        ($_POST['nouveau'] == $_POST['confirmation'])
                                        && ($validemdp == 1)
                                    ) {
                                        echo "<script type='text/JavaScript'> 
                                        $(document).ready(function () {
                                        alert('Votre mot de passe a été modifié.');
                                        });
                                        </script>";
                                    }
                                } elseif (!empty($_POST['modifier']) && (!password_verify($actuel, $user['mdp']))) {
                                    echo "<span style='color:red'>* Mot de passe actuel incorrect.</span><br>";
                                }
                                ?>
                                <label for="new">Nouveau mot de passe</label><br>
                                <input class="form-control" type="password" name="nouveau" required><br>
                                <label for="confirm">Confirmez votre nouveau mot de passe</label><br>
                                <input class="form-control" type="password" name="confirmation" required>
                                <?php
                                if ((!empty($_POST['nouveau'])) && (!empty($_POST['confirmation']))
                                    && ($_POST['nouveau']) != ($_POST['confirmation'])
                                ) {
                                    echo "<span style='color:red'>* Veuillez saisir le même nouveau mot de passe.</span><br>";
                                }
                                if ((!empty($_POST['modifier'])) && ($validemdp != 1)) {
                                    echo "<span style='color:red'>* Le mot de passe doit contenir entre 8 et 20 caractères.</span><br>";
                                }
                                ?><br>
                                <input class="form-control" type="submit" name="modifier" value="Modifier">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </main>
        <?php
        include_once "./includes/footer.php"
        ?>
</body>

</html>