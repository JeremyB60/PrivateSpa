<?php
session_start();

// AJOUT DE MESSAGE DANS LE LIVRE D'OR

if (!empty($_POST['envoyer'])) {
    include_once "./includes/fonctions.php";
    $email = $_POST['mail'];
    $email = strtolower($email);
    $exist = rechercheMail($email);
    $validemail = secumail($email);
    $validecommentaire = verifytext($_POST['commentaire']);
}
// CONDITION A RESPECTER POUR VALIDER LE MESSAGE
if ((!empty($_POST['envoyer']) && ($exist == 0) && ($validemail == 1) && ($validecommentaire == 1) && (!isset($_SESSION['mail']))) ||
    (!empty($_POST['envoyer']) && ($exist != 0) && ($validemail == 1) && ($validecommentaire == 1) && (isset($_SESSION['mail'])) && (($_SESSION['mail']) === $email))
) {
    include_once "./includes/fonctions.php";
    $email = strtolower($_POST['mail']);
    $mail = secure($_POST["mail"]);
    $mail = strtolower($mail);
    $commentaire = secure($_POST['commentaire']);
    include_once "./includes/connexionbdd.php";
    $sql = 'INSERT INTO livredor (mail, commentaire)
    VALUES (:mail, :commentaire)';
    $insertion = $connexion->prepare($sql);
    $insertion->bindParam(":mail", $email, PDO::PARAM_STR);
    $insertion->bindParam(":commentaire", $commentaire, PDO::PARAM_STR);
    $insertion->execute();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="icon" type="image/png" href="./assets/images/logosolo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>Private SPA - Livre d'or</title>
    <meta name="description" content="Private SPA - Profitez d’un moment de détente en toute intimité, SAUNA - HAMMAM - JACUZZI 100% PRIVATIF.">
</head>

<body>
    <div class="container-fluid">
        <?php
        include_once "./includes/header.php"
        ?>
        <main>

            <!-- LIVRE D'OR -->

            <div class="presentationlivredor bg-light row d-flex justify-content-center align-items-center">
                <h1 class="mb-3">LIVRE D'OR</h1>
                <div class="col-12 col-lg-6 space2">

                    <?php
                    //  AFFICHAGE DES COMMENTAIRES
                    // PAGINATION

                    $messagesParPage = 4;
                    $page = isset($_GET['page']) ? $_GET['page'] : 1; //(opérateur ternaire) récupère le numéro de page dans l'URL
                    $debut = ($page - 1) * $messagesParPage; //détermine à partir de combien de messages je les récupère

                    // RECUPERATION DES MESSAGES DANS LA BDD

                    include_once "./includes/connexionbdd.php";
                    $sql1 = "SELECT clients.prenom, clients.nom, livredor.mail, livredor.commentaire, livredor.dateenvoi FROM livredor
                    LEFT JOIN clients ON livredor.mail = clients.mail
                    ORDER BY livredor.id DESC LIMIT $debut, $messagesParPage"; // LIMIT $debut, $messagesPerPage pour limiter le nombre de messages récupérés.
                    $requete = $connexion->query($sql1);
                    $messages = $requete->fetchAll(PDO::FETCH_ASSOC);

                    // COMPTAGE TOTAL DES MESSAGES

                    $comptage = "SELECT COUNT(*) FROM livredor";
                    $requeteComptage = $connexion->query($comptage);
                    $totalMessages = $requeteComptage->fetchColumn();

                    // CALCUL DU NOMBRE TOTAL DE PAGES, ceil arrondit supérieur

                    $totalPages = ceil($totalMessages / $messagesParPage);

                    // AFFICHAGE DES MESSAGES SUR LE LIVRE D'OR

                    if ($requete->rowCount() == 0) {
                        echo "Aucun message.";
                    } else {
                        foreach ($messages as $message) {
                            $date = $message['dateenvoi'];
                            $date_inversee = date("d-m-Y", strtotime($date));
                            $heure = date("H:i:s", strtotime($date));
                            if (isset($message['prenom'])) {
                                echo '<div class="msgLivredor my-2 p-2"><p><b class="colore">' . ucwords($message['prenom']) . " " . strtoupper(substr($message['nom'], 0, 1)) .
                                    ".</b> a écrit le " . $date_inversee . " à " . $heure . "</p>
                                <p class='indie m-0'>" . $message['commentaire'] . "</div>";
                            } else {
                                echo "<div class='msgLivredor my-2 p-2'><p>" . $message['mail'] . " " . $date_inversee . "</p>
                        <p class='indie m-0'>" . $message['commentaire'] . "</div>";
                            }
                        }
                    }
                    ?>

                    <!-- AFFICHAGE PAGINATION -->

                    <div class="pagination">
                        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                            <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        <?php } ?>
                    </div>
                </div>

                <!-- FORMULAIRE POUR LAISSER UN MESSAGE -->

                <div class="partiedroite col-12 col-lg-6">
                    <h2>Laissez nous un message vous&nbsp;aussi !</h2>
                    <form action="" method="POST">
                        <label for="mail">Votre adresse mail</label><br>
                        <input class="form-control" type="email" name="mail" value="<?php
                                                                                    if (isset($_SESSION['mail'])) {
                                                                                        echo $_SESSION['mail'];
                                                                                    } ?>" required>
                        <?php
                        if ((!empty($_POST['envoyer'])) && ($validemail != 1)) {
                            echo "<b>* Mail non valide.</b>";
                        } else if (!empty($_POST['envoyer']) && ($exist != 0) && (!isset($_SESSION['mail']))) {
                            echo "<b>* Mail existant, merci de vous connecter</b>";
                        } else if (!empty($_POST['envoyer']) && ($exist == 0) && ($validemail == 1) && (isset($_SESSION['mail']))) {
                            echo "<b>* Veuillez garder l'adresse mail correspondante à votre compte SVP !</b>";
                        }
                        ?><br>
                        <label for="commentaire">Votre message</label>
                        <textarea class="form-control" placeholder="Ecrivez ici" name="commentaire" style="height: 100px" maxlength="400"></textarea>
                        <?php
                        if ((!empty($_POST['envoyer'])) && ($validecommentaire != 1)) {
                            echo "<b>* La saisie n'est pas valide.</b>";
                        }
                        ?><br>
                        <input class="form-control" type="submit" value="Envoyer" name="envoyer">
                    </form>
                </div>

            </div>
        </main>
        <?php
        include_once "./includes/footer.php"
        ?>
    </div>
</body>

</html>