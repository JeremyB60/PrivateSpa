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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="./assets/images/logosolo.png">
    <title>Private SPA - Nos salles 100% privatives</title>
    <meta name="description" content="Private SPA - Profitez d’un moment de détente en toute intimité, SAUNA - HAMMAM - JACUZZI 100% PRIVATIF.">
</head>

<body id="pageGalerie">
    <div class="container-fluid">
        <?php
        include_once "./includes/header.php"
        ?>
        <main>

            <!--GALERIE-->

            <div class="presentation galerie bg-light">
                <h1>Découvrez nos salles privatives</h1><br>
                <p>Private SPA met à votre disposition 3 salles, à chacune sa décoration.</p>
                <p>Les équipements restent les mêmes sauna, hammam & jacuzzi vous attendent. </p>
                <p>N'hésitez pas à choisir lors de votre <a href="./prestations.php">réservation</a>.</p>
                <div class="row mt-5">

                    <!--PREMIER SLIDE-->

                    <div class="col-12 col-lg-6 col-xxl-4 mb-5">
                        <h2>Salle 1</h2>
                        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                                    <span></span>
                                </button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2">
                                    <span></span>
                                </button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3">
                                    <span></span>
                                </button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4">
                                    <span></span>
                                </button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5">
                                    <span></span>
                                </button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6">
                                    <span></span>
                                </button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block" src="./assets/images/salle1a.webp" alt="intérieur salle 1">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block" src="./assets/images/salle1b.webp" alt="intérieur salle 1">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block" src="./assets/images/salle1c.webp" alt="intérieur salle 1">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block" src="./assets/images/salle1d.webp" alt="intérieur salle 1">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block" src="./assets/images/salle1e.webp" alt="intérieur salle 1">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block" src="./assets/images/salle1f.webp" alt="intérieur salle 1">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                    <!--DEUXIEME SLIDE-->

                    <div class="col-12 col-lg-6 col-xxl-4 mb-5">
                        <h2>Salle 2</h2>
                        <div id="carouselExampleIndicators1" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                                    <span></span>
                                </button>
                                <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="1" aria-label="Slide 2">
                                    <span></span>
                                </button>
                                <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="2" aria-label="Slide 3">
                                    <span></span>
                                </button>
                                <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="3" aria-label="Slide 4">
                                    <span></span>
                                </button>
                                <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="4" aria-label="Slide 5">
                                    <span></span>
                                </button>
                                <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="5" aria-label="Slide 6">
                                    <span></span>
                                </button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block" src="./assets/images/salle2a.webp" alt="intérieur salle 2">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block" src="./assets/images/salle2b.webp" alt="intérieur salle 2">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block" src="./assets/images/salle2c.webp" alt="intérieur salle 2">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block" src="./assets/images/salle2d.webp" alt="intérieur salle 2">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block" src="./assets/images/salle2e.webp" alt="intérieur salle 2">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block" src="./assets/images/salle2f.webp" alt="intérieur salle 2">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                    <!--TROISIEME SLIDE-->
                    
                    <div class="col-12 col-lg-6 offset-lg-3 col-xxl-4 offset-xxl-0">
                        <h2>Salle 3</h2>
                        <div id="carouselExampleIndicators2" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                                    <span></span>
                                </button>
                                <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="1" aria-label="Slide 2">
                                    <span></span>
                                </button>
                                <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="2" aria-label="Slide 3">
                                    <span></span>
                                </button>
                                <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="3" aria-label="Slide 4">
                                    <span></span>
                                </button>
                                <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="4" aria-label="Slide 5">
                                    <span></span>
                                </button>
                                <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="5" aria-label="Slide 6">
                                    <span></span>
                                </button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block" src="./assets/images/salle3a.webp" alt="intérieur salle 3">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block" src="./assets/images/salle3b.webp" alt="intérieur salle 3">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block" src="./assets/images/salle3c.webp" alt="intérieur salle 3">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block" src="./assets/images/salle3d.webp" alt="intérieur salle 3">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block" src="./assets/images/salle3e.webp" alt="intérieur salle 3">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block" src="./assets/images/salle3f.webp" alt="intérieur salle 3">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
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