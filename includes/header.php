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
    <!--MENU, MENU FLOTTANT & SCROLL UP-->
    <header>
        <nav id="menu">
            <ul class="menugauche">
                <li id="menuAccueil"><a href="./index.php">Accueil</a></li>
                <li id="menuConcept"><a href="./concept.php">Notre Concept</a></li>
                <li id="menuGalerie"><a href="./galerie.php">Galerie</a></li>
                <li id="menuCentres"><a href="./centres.php">Nos centres</a></li>
            </ul>
            <div class="menuresponsivegauche w-50">
                <ul>
                    <li><img src="./assets/images/iconmenu.svg" class="blurJS" width="40" alt="menu">
                        <ul class="sousmenu blurJS">
                            <li><a href="./index.php">Accueil</a></li>
                            <li><a href="./concept.php">Notre Concept</a></li>
                            <li><a href="./galerie.php">Galerie</a></li>
                            <li><a href="./centres.php">Nos centres</a></li>
                            <li><a href="./prestations.php"><b>Nos prestations</b></a></li>
                            <li><a href="./boncadeau.php"><b>Bon Cadeau</b></a></li>
                            <!-- <li><a href="https://www.privatepool.fr/"><b>Private
                                        Pool<br><span>*Nouveau*</span></b></a></li> -->
                            <li><a href="./compte.php">
                                    <?php
                                    if (!empty($_SESSION['userrole'])) {
                                        echo '<b>' . $_SESSION['prenom'] . '</b></a></li>';
                                    } else {
                                        echo 'Mon Compte</a></li>';
                                    }
                                    ?>
                        </ul>
                    </li>
                    <li><a href="./compte.php"><img src="./assets/images/compte.svg" alt="mon compte"></a></li>
                </ul>
            </div>
            <div class="logo">
                <a href="./index.php"><img src="./assets/images/logo-final.png" class="img-fluid" alt="logo"></a>
            </div>
            <div class="logoresponsive">
                <a href="./index.php"><img src="./assets/images/logo-2.webp" class="img-fluid" alt="logo"></a>
            </div>
            <ul class="menudroite">
                <li class="nospresta"><a href="./prestations.php"><img width="30" src="./assets/images/prestationssvg.svg" alt=""><br>Nos<br>Prestations</a></li>
                <li class="boncadeau"><a href="./boncadeau.php"><img src="./assets/images/boncadeau.svg" width="40" alt="bon cadeau"><br>Bon<br>Cadeau</a></li>
                <!-- <li><a href="https://www.privatepool.fr/"><span>*Nouveau*</span><br><b>Private<br>Pool</b></a></li> -->
                <li class="cmpt"><a href="./compte.php"><img src="./assets/images/compte.svg" alt="mon compte">
                        <?php
                        if (!empty($_SESSION['userrole'])) {
                            echo '<br><b>' . $_SESSION['prenom'] . '</b></a></li>';
                        } else {
                            echo '<br>Mon<br>Compte</a></li>';
                        }
                        ?>
                <li class="reseauxsociaux">
                    <a href="https://www.instagram.com/privatespa_60"><img src="./assets/images/instagram.svg" alt="instagram" width="25">&nbsp;</a>
                    <a href="https://www.facebook.com/privatespa60/"><img src="./assets/images/facebook.svg" alt="facebook" width="25">&nbsp;</a>
                    <a href="https://www.snapchat.com/add/privatespa"><img src="./assets/images/snapchat.svg" alt="snapchat" width="25"></a>
                </li>
            </ul>
            <div class="menuresponsivedroite w-50">
                <ul>
                    <li><a href="./prestations.php"><img width="40" src="./assets/images/prestationssvg.svg" alt="prestations"></a></li>
                    <li><a href="./boncadeau.php"><img src="./assets/images/boncadeau.svg" width="40" alt="bon cadeau"></a></li>
                </ul>
            </div>
        </nav>
    </header>
    <?php
    if (isset($_SESSION['nom'])) {
    ?>
        <div class="menuFlottant3">
            <a href="./deconnexion.php"><button><img src="./assets/images/logout.svg" alt="déconnexion"></button></a>
        </div><?php
            }
                ?>
    <div class="menuFlottant">
        <a href="./contact.php"><button>Contact</button></a>
    </div>
    <div class="menuFlottant2">
        <a href="./livredor.php"><button>Livre&nbsp;d'or</button></a>
    </div>
    <div class="scrollup"><img src="./assets/images/arrowup.webp" alt="scroller" width="15"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="./assets/js/jquery-3.6.1.min.js"></script>
    <script src="./assets/js/script.js"></script>
</body>

</html>