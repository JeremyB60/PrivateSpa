<?php
session_start();
if (isset($_SESSION['userrole']) && ($_SESSION['userrole']) == 'client') {
    header('Location: profil.php');
} else if (isset($_SESSION['userrole']) && ($_SESSION['userrole']) == 'admin') {
    header('Location: profiladmin.php');
}
?>

<!-- S'IDENTIFIER -->

<?php
if (!empty($_POST['connecter'])) {
    include_once "./includes/fonctions.php";
    $email = $_POST['mail'];
    $exist = rechercheMail($email);
    $validemail = secumail($email);
}
if (!empty($_POST['connecter']) && ($exist != 0) && ($validemail == 1)) {
    include_once "./includes/connexionbdd.php";
    $mail = strtolower($_POST['mail']);
    $mdp = $_POST['mdp'];
    $sql = "SELECT * FROM clients WHERE mail = '$mail'";
    $requete = $connexion->query($sql);
    $user = $requete->fetch();
    if (password_verify($mdp, $user['mdp'])) {
        $_SESSION['idclient'] = $user['idclient'];
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['mail'] = $user['mail'];
        $datenaissance = $user['naissance'];
        $date_formattee = date('j.m.Y', strtotime($datenaissance));
        $_SESSION['naissance'] = $date_formattee;
        $_SESSION['telephone'] = $user['telephone'];
        $_SESSION['codepostal'] = $user['codepostal'];
        $_SESSION['ville'] = $user['ville'];
        $_SESSION['userrole'] = $user['userrole'];
        $_SESSION['dateinscription'] = $user['dateinscription'];
        header("Location: profil.php");
    } else {
        $e = "Identifiant ou mot de passe incorrect.<br>";
    }
} elseif (!empty($_POST['connecter']) && ($exist == 0)) {
    $e = "Identifiant ou mot de passe incorrect.<br>";
}
?>

<!-- INSCRIPTION ET CONNEXION AUTOMATIQUE -->

<?php
if (!empty($_POST['inscrire'])) {
    include_once "./includes/fonctions.php";
    $email1 = strtolower($_POST['mailinscription']);
    $validemail1 = secumail($email1);
    $exist1 = rechercheMail($email1);
    $validemdp1 = secumdp($_POST['mdp1']);
    $valideprenom = verifytext($_POST['prenom']);
    $validenom = verifytext($_POST['nom']);
    $valideville = verifytext($_POST['ville']);
    $validetel = verifytel($_POST['telephone']);
    $validecp = verifycp($_POST['cp']);
}
if (
    !empty($_POST['inscrire']) && ($exist1 == 0) && ($_POST['mdp1'] == $_POST['mdp2'])
    && ($validemail1 == 1) && ($validemdp1 == 1) && ($valideprenom == 1)
    && ($validenom == 1) && ($validecp == 1) && ($validetel == 1) && ($valideville == 1)
) {
    include_once "./includes/connexionbdd.php";
    $prenom = secure($_POST["prenom"]);
    $nom = secure($_POST["nom"]);
    $mail1 = secure($_POST["mailinscription"]);
    $mail1 = strtolower($mail1);
    $mdp1 = $_POST['mdp1'];
    $mdphash = password_hash($mdp1, PASSWORD_DEFAULT);
    $naissance = secure($_POST["date"]);
    $telephone = secure($_POST["telephone"]);
    $codepostal = secure($_POST["cp"]);
    $ville = secure($_POST["ville"]);
    $userrole = 'client';

    $sql1 = 'INSERT INTO clients (prenom, nom, mail, mdp, naissance, telephone, codepostal, ville, userrole)
    VALUES (:prenom, :nom, :mail, :mdp, :naissance, :telephone, :codepostal, :ville, :userrole)';

    $insertion = $connexion->prepare($sql1);
    $insertion->bindParam(":prenom", $prenom, PDO::PARAM_STR);
    $insertion->bindParam(":nom", $nom, PDO::PARAM_STR);
    $insertion->bindParam(":mail", $mail1, PDO::PARAM_STR);
    $insertion->bindParam(":mdp", $mdphash);
    $insertion->bindParam(":naissance", $naissance);
    $insertion->bindParam(":telephone", $telephone, PDO::PARAM_STR);
    $insertion->bindParam(":codepostal", $codepostal, PDO::PARAM_INT);
    $insertion->bindParam(":ville", $ville, PDO::PARAM_STR);
    $insertion->bindParam(":userrole", $userrole, PDO::PARAM_STR);
    $insertion->execute();
    $sql2 = "SELECT * FROM clients WHERE mail = '$mail1'";
    $requete = $connexion->query($sql2);
    $user = $requete->fetch();
    $_SESSION['idclient'] = $user['idclient'];
    $_SESSION['prenom'] = $user['prenom'];
    $_SESSION['nom'] = $user['nom'];
    $_SESSION['mail'] = $user['mail'];
    $datenaissance = $user['naissance'];
    $date_formattee = date('j.m.Y', strtotime($datenaissance));
    $_SESSION['naissance'] = $date_formattee;
    $_SESSION['telephone'] = $user['telephone'];
    $_SESSION['codepostal'] = $user['codepostal'];
    $_SESSION['ville'] = $user['ville'];
    $_SESSION['userrole'] = $user['userrole'];
    $_SESSION['dateinscription'] = $user['dateinscription'];
    header("Location: profil.php");
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
    <title>Private SPA - Accéder à votre compte</title>
    <meta name="description" content="Private SPA - Profitez d’un moment de détente en toute intimité, SAUNA - HAMMAM - JACUZZI 100% PRIVATIF.">
</head>

<body>
    <div class="container-fluid">
        <?php
        include_once "./includes/header.php"
        ?>
        <main>

            <!--MON COMPTE-->

            <div class="compte bg-light text-center">
                <h1>Compte Client</h1>
                <p>Pour accéder à votre compte client vous devez choisir l'une des 2 options suivantes</p>
                <div class="row mt-5">
                    <div class="col-12 col-md-6 d-flex align-items-center flex-column bg-gradient space">
                        <a href="#options" class="d-flex justify-content-center align-items-center flex-column option1 hover">
                            <h2>Vous avez un compte client&nbsp;?</h2>
                            <p>Identifiez vous</p>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 d-flex align-items-center flex-column">
                        <a href="#options" class="d-flex justify-content-center align-items-center flex-column option2 hover">
                            <h2>Vous n'avez pas encore de compte client&nbsp;?</h2>
                            <p>Créez votre compte</p>
                        </a>
                    </div>
                </div>
                <div class="row mt-5" id="options">

                    <!-- FORMULAIRE POUR S'IDENTIFIER -->

                    <div class="identifier">
                        <h3>Identifiez-vous</h3>
                        <form action="" method="POST">
                            <label for="mail">Votre adresse mail</label><br>
                            <input class="form-control" type="email" name="mail" required> <br>
                            <label for="mdp">Votre mot de passe</label><br>
                            <input class="form-control" type="password" name="mdp" required>
                            <?php
                            if (!empty($_POST['connecter'])) {
                                echo "<span style='color:red'>* $e </span><script type='text/JavaScript'> 
                        $(document).ready(function () {
                        $('.identifier').show();
                        });
                        </script>";
                            }
                            ?><br>
                            <input class="form-control" type="submit" value="Se connecter" name="connecter">
                        </form>
                    </div>

                    <!-- FORMULAIRE POUR CREER UN COMPTE -->

                    <div class="creer">
                        <h3>Créez votre compte Private SPA</h3>
                        <p class="mb-3">Tous les champs marqués d'un * sont obligatoires</p>
                        <form action="" method="POST">
                            <label for="mailinscription" class="bold">Votre adresse mail *</label><br>
                            <input class="form-control" type="email" name="mailinscription" maxlength="200" required>
                            <?php
                            if ((!empty($_POST['inscrire'])) && ($exist1 != 0)) {
                                echo "<span style='color:red'>* L'adresse mail existe déjà.</span><br>
                                <script type='text/JavaScript'> 
                                $(document).ready(function () {
                                $('.creer').show();
                                });
                                </script>";
                            }
                            if ((!empty($_POST['inscrire'])) && ($validemail1 != 1)) {
                                echo "<span style='color:red'>* L'adresse mail saisie est incorrecte.</span><br><script type='text/JavaScript'> 
                                $(document).ready(function () {
                                $('.creer').show();
                                });
                                </script>";
                            }
                            ?><br>
                            <label for="mdp1" class="bold">Votre mot de passe (entre 8 et 20 caractères) *</label><br>
                            <input class="form-control" type="password" name="mdp1" required> <br>
                            <label for="mdp2" class="bold">Confirmez votre mot de passe *</label><br>
                            <input class="form-control" type="password" name="mdp2" required>
                            <?php
                            if ((!empty($_POST['mdp1'])) && (!empty($_POST['mdp2']))
                                && ($_POST['mdp1']) != ($_POST['mdp2'])
                            ) {
                                echo "<span style='color:red'>* Veuillez saisir le même mot de passe.</span><br><script type='text/JavaScript'> 
                                $(document).ready(function () {
                                $('.creer').show();
                                });
                                </script>";
                            }
                            if ((!empty($_POST['inscrire'])) && ($validemdp1 != 1)) {
                                echo "<span style='color:red'>* Le mot de passe doit contenir entre 8 et 20 caractères.</span><br><script type='text/JavaScript'> 
                                $(document).ready(function () {
                                $('.creer').show();
                                });
                                </script>";
                            }
                            ?><br>
                            <label for="nom">Votre nom *</label><br>
                            <input class="form-control" type="text" name="nom" maxlength="50" required>
                            <?php
                            if ((!empty($_POST['inscrire'])) && ($validenom != 1)) {
                                echo "<span style='color:red'>* Nom n'est pas valide.</span><br><script type='text/JavaScript'> 
                                $(document).ready(function () {
                                $('.creer').show();
                                });
                                </script>";
                            }
                            ?><br>
                            <label for="prenom">Votre prénom *</label><br>
                            <input class="form-control" type="text" name="prenom" maxlength="50" required>
                            <?php
                            if ((!empty($_POST['inscrire'])) && ($valideprenom != 1)) {
                                echo "<span style='color:red'>* Prénom n'est pas valide.</span><br><script type='text/JavaScript'> 
                                $(document).ready(function () {
                                $('.creer').show();
                                });
                                </script>";
                            }
                            ?><br>
                            <label for="date">Votre date de naissance *</label><br>
                            <input class="form-control" type="date" name="date" title="Date de naissance" required> <br>
                            <label for="telephone">Votre numéro de téléphone *</label><br>
                            <input class="form-control" type="tel" name="telephone" required>
                            <?php
                            if ((!empty($_POST['inscrire'])) && ($validetel != 1)) {
                                echo "<span style='color:red'>* Le numéro de téléphone n'est pas valide.</span><br><script type='text/JavaScript'> 
                                $(document).ready(function () {
                                $('.creer').show();
                                });
                                </script>";
                            }
                            ?><br>
                            <label for="cp">Votre code postal *</label><br>
                            <input class="form-control" type="number" name="cp" required>
                            <?php
                            if ((!empty($_POST['inscrire'])) && ($validecp != 1)) {
                                echo "<span style='color:red'>* Le code postal doit contenir 5 chiffres.</span><br><script type='text/JavaScript'> 
                                $(document).ready(function () {
                                $('.creer').show();
                                });
                                </script>";
                            }
                            ?><br>
                            <label for="ville">Votre ville *</label><br>
                            <input class="form-control" type="text" name="ville" maxlength="50" required>
                            <?php
                            if ((!empty($_POST['inscrire'])) && ($valideville != 1)) {
                                echo "<span style='color:red'>* Ville n'est pas valide.</span><br><script type='text/JavaScript'> 
                                $(document).ready(function () {
                                $('.creer').show();
                                });
                                </script>";
                            }
                            ?><br>
                            <input class="form-control" type="submit" value="S'inscrire" name="inscrire">
                        </form>
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