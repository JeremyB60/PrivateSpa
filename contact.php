<?php
session_start();

//  TRAITEMENT PAGE CONTACT 

if (!empty($_POST['envoyer'])) {
    include_once "./includes/fonctions.php";
    $email = strtolower($_POST['mail']);
    $exist = rechercheMail($email);
    $validemail = secumail($email);
    $valideprenom = verifytext($_POST['prenom']);
    $validenom = verifytext($_POST['nom']);
    $validemessage = verifytext($_POST['message']);
    $validetel = verifytel($_POST['telephone']);
}
if ((!empty($_POST['envoyer']) && ($exist == 0) && ($validemail == 1) && ($valideprenom == 1) && ($validemessage == 1) &&
        ($validenom == 1) && ($validetel == 1) && (!isset($_SESSION['mail']))) ||
    (!empty($_POST['envoyer']) && ($exist != 0) && ($validemail == 1) && ($valideprenom == 1) && ($validemessage == 1) &&
        ($validenom == 1) && ($validetel == 1) && (isset($_SESSION['mail'])) && (($_SESSION['mail']) === $email))
) {
    include_once "./includes/connexionbdd.php";
    $prenom = secure($_POST["prenom"]);
    $nom = secure($_POST["nom"]);
    $mail = secure($_POST["mail"]);
    $mail = strtolower($mail);
    $telephone = secure($_POST["telephone"]);
    $message = secure($_POST['message']);

    $sql1 = 'INSERT INTO contacts (prenom, nom, mail, telephone, messages, statut)
            VALUES (:prenom, :nom, :mail, :telephone, :messages, "En attente")';

    $insertion = $connexion->prepare($sql1);
    $insertion->bindParam(":prenom", $prenom, PDO::PARAM_STR);
    $insertion->bindParam(":nom", $nom, PDO::PARAM_STR);
    $insertion->bindParam(":mail", $mail, PDO::PARAM_STR);
    $insertion->bindParam(":telephone", $telephone, PDO::PARAM_STR);
    $insertion->bindParam(":messages", $message, PDO::PARAM_STR);
    $insertion->execute();
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
    <title>Private SPA - Contactez-nous</title>
    <meta name="description" content="Private SPA - Profitez d’un moment de détente en toute intimité, SAUNA - HAMMAM - JACUZZI 100% PRIVATIF.">
</head>

<body>
    <div class="container-fluid">
        <?php
        include_once "./includes/header.php"
        ?>
        <main>

            <!--CONTACT-->

            <div class="presentationcontact bg-light">
                <h1>CONTACTEZ-NOUS</h1>
                <p class="mb-3">Tous les champs marqués d'un * sont obligatoires</p>

                <!-- FORMULAIRE DE CONTACT -->

                <form action="" method="POST">
                    <label for="nom">Nom*</label><br>
                    <input class="form-control" type="text" name="nom" maxlength="50" value="<?php
                                                                                                if (isset($_SESSION['nom'])) {
                                                                                                    echo $_SESSION['nom'];
                                                                                                } ?>" required>
                    <?php
                    if ((!empty($_POST['envoyer'])) && ($validenom != 1)) {
                        echo "<b>* La saisie n'est pas valide.</b>";
                    }
                    ?><br>
                    <label for="prenom">Prénom*</label><br>
                    <input class="form-control" type="text" name="prenom" maxlength="50" value="<?php
                                                                                                if (isset($_SESSION['prenom'])) {
                                                                                                    echo $_SESSION['prenom'];
                                                                                                } ?>" required>
                    <?php
                    if ((!empty($_POST['envoyer'])) && ($valideprenom != 1)) {
                        echo "<b>* La saisie n'est pas valide.</b>";
                    }
                    ?><br>
                    <label for="mail">Adresse mail*</label><br>
                    <input class="form-control" type="email" name="mail" value="<?php
                                                                                if (isset($_SESSION['mail'])) {
                                                                                    echo $_SESSION['mail'];
                                                                                } ?>" required>
                    <?php
                    if ((!empty($_POST['envoyer'])) && ($validemail != 1)) {
                        echo "<b>Mail non valide.</b>";
                    } else if (!empty($_POST['envoyer']) && ($exist != 0) && (!isset($_SESSION['mail']))) {
                        echo "<b>Mail existant, merci de vous connecter</b>";
                    } else if (!empty($_POST['envoyer']) && ($exist == 0) && ($validemail == 1) && (isset($_SESSION['mail']))) {
                        echo "<b>Veuillez garder l'adresse mail correspondante à votre compte SVP !</b>";
                    }
                    ?><br>
                    <label for="telephone">Numéro de téléphone*</label><br>
                    <input class="form-control" type="tel" name="telephone" value="<?php
                                                                                    if (isset($_SESSION['telephone'])) {
                                                                                        echo $_SESSION['telephone'];
                                                                                    } ?>" required>
                    <?php
                    if ((!empty($_POST['envoyer'])) && ($validetel != 1)) {
                        echo "<b>* Le numero de telephone n'est pas valide.</b>";
                    }
                    ?><br>
                    <label for="message">Votre demande* (400&nbsp;caractères&nbsp;max.)</label><br>
                    <textarea class="form-control" placeholder="Saississez votre demande ici, nous vous répondrons sous 48h." name="message" style="height: 100px" maxlength="400"></textarea>
                    <?php
                    if ((!empty($_POST['envoyer'])) && ($validemessage != 1)) {
                        echo "<b>* La saisie n'est pas valide.</b>";
                    }
                    ?><br>
                    <input class="form-control" type="submit" value="Envoyer" name="envoyer">
                    <?php
                    if ((!empty($_POST['envoyer']) && ($exist == 0) && ($validemail == 1) && ($valideprenom == 1) && ($validemessage == 1) &&
                            ($validenom == 1) && ($validetel == 1) && (!isset($_SESSION['mail']))) ||
                        (!empty($_POST['envoyer']) && ($exist != 0) && ($validemail == 1) && ($valideprenom == 1) && ($validemessage == 1) &&
                            ($validenom == 1) && ($validetel == 1) && (isset($_SESSION['mail'])) && (($_SESSION['mail']) === $email))
                    ) {
                        echo "<meta http-equiv='refresh' content='0'>";
                        echo "<script type='text/JavaScript'> 
                        $(document).ready(function () {
                        alert('Message envoyé.');
                        });
                        </script>";
                    }
                    ?>
                </form>
            </div>
        </main>
        <?php
        include_once "./includes/footer.php"
        ?>
</body>

</html>