<!--

  Copyright by Thomas Henry, Valentin Lamour, Jérôme Fabre et Glenn Guillard.
  Tous droits réservés sur le site par ces membres.

-->

<!DOCTYPE html>
<html lang=fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/galerie.css?time=<?php require 'UID.php';
                                                        echo UID(200) ?>">
    <link rel="stylesheet" href="css/bootstrap.min.css?time=<?php echo UID(200) ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="node_modules/jquery/dist/jquery.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">
    <link rel="icon" href="img/SVG/logo.svg">
    <title>ACF2L</title>
</head>

<body class="font-normal text-blue">
    <div class="d-flex flex-row w-100 h-100">
        <section class="w-25 h-100 position-fixed start-0">
            <?php
            //Lancement session
            session_start();

            //Vérification si quelq'un est connecter
            if (isset($_SESSION['mail'])) {
                $mail = "'" . $_SESSION['mail'] . "'";
                require_once "poo_repository.php";
                require_once "poo_models.php";
                try {
                    $modele = new Model("adherant");

                    $exemple1 = new Repository($modele->getTable());

                    $sql = "Select * from " . $modele->getTable() . " where mail = $mail  ";

                    $resultat = $exemple1->requete($sql);

                    foreach ($resultat as $ligne) { {
                            $sauvegarde = $ligne["autorisation"];
                            if ($sauvegarde == 3) {
            ?>
                                <nav class="text-center bg-custom text-white d-flex justify-content-around flex-column align-items-center font-avion">
                                    <a href="index.php" class="w-50 exclu mt-3">
                                        <img class="logo-shadow" src="img/SVG/logo.svg" alt="logo aero club">
                                    </a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_login.php">Accueil</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_gestionnaireUtilisateur.php">Gestion des utilisateurs</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Gestion des réservations</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_analytique.php">Analytiques</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_DemandeLicence.php">Demande de licence</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_Gestion_avions.php">Avions</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_offre.php">Offres</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Liste équipe</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_evenement.php">Événement</a>
                                    <a class="text-blue bg-white text-decoration-none py-1 px-2 rounded-3 exclu" href="php_galerie.php">Galerie</a>
                                </nav>
                            <?php

                            }
                            if ($sauvegarde == 2) {
                            ?>
                                <nav class="text-center bg-custom text-white d-flex justify-content-around flex-column align-items-center font-avion">
                                    <a href="index.php" class="w-50 exclu mt-3">
                                        <img class="logo-shadow" src="img/SVG/logo.svg" alt="logo aero club">
                                    </a>
                                    <div class="d-flex flex-column h-25 justify-content-around my-auto">
                                        <a class="text-blue bg-white text-decoration-none py-1 px-2 rounded-3 exclu" href="php_login.php">Accueil</a>
                                        <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_analytique.php">Analytiques</a>
                                        <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_Gestion_avions.php">Avions</a>
                                    </div>
                                </nav>
                            <?php

                            }


                            if ($sauvegarde == 1) {
                            ?>
                                <nav class="text-center bg-custom text-white d-flex flex-column align-items-center font-avion">
                                    <a href="index.php" class="w-50 exclu mt-3">
                                        <img class="logo-shadow" src="img/SVG/logo.svg" alt="logo aero club">
                                    </a>
                                    <div class="d-flex flex-column h-25 justify-content-around my-auto">
                                        <a class="text-blue bg-white text-decoration-none py-1 px-2 rounded-3 exclu" href="php_login.php">Accueil</a>
                                        <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Réservations</a>
                                        <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_Gestion_avions.php">Avions</a>
                                    </div>
                                </nav>
                            <?php

                            }




                            if ($sauvegarde == 0) {
                            ?>
                                <nav class="text-center bg-custom text-white d-flex justify-content-around flex-column align-items-center font-avion">
                                    <a href="index.php" class="w-50 exclu mt-3">
                                        <img class="logo-shadow" src="img/SVG/logo.svg" alt="logo aero club">
                                    </a>
                                    <div class="d-flex flex-column h-25 justify-content-around my-auto">
                                        <a class="text-blue bg-white text-decoration-none py-1 px-2 rounded-3 exclu" href="php_login.php">Accueil</a>
                                        <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Réservations</a>
                                    </div>
                                </nav>
            <?php

                            }
                        }
                    }
                } catch (PDOException $e) {
                    die($e->getMessage());
                }
            } else {
                header("Location: php_connexion.php");
            }
            ?>
        </section>
        <section class="w-75 ml-custom mb-5">
            <article class="d-flex flex-row align-items-center mt-4">
                <h1 class="text-blue m-0 me-5">Galerie</h1>
                <p onclick="ajoutGalerie()" class="fs-4 text-blue bg-white ajout_event rounded-3 mb-0">+</p>
            </article>


            <form action="_ajoutGalerie.php" method="POST" id="form-ajout" class="position-fixed bg-white rounded-4 py-3 px-5" enctype="multipart/form-data">
                <div class="d-flex flex-column justify-content-around">
                    <h1 class="font-avion text-center">Ajouter un image</h1>
                    <input class="mt-5" type="file" name="photo">
                    <span class="d-flex flex-row align-items-center justify-content-start mt-3">
                        <label class="mb-0" for="titre">Titre :</label>
                        <input class="ms-3 mb-0" type="text" name="titre">
                    </span>
                    <div class="d-flex flex-row justify-content-around mt-5">
                        <p onclick="anulAjout()" class="annul_buton bg-white rounded-3 py-1 px-2 mb-0 text-blue fs-5">Annuler</p>
                        <input class="bg-custom text-white rounded-3 py-1 px-2 fs-5 buton-ajout" type="submit">
                    </div>
                </div>
            </form>

            <?php

            //Vérification si quelq'un est connecter
            if (isset($_SESSION['mail'])) {
                $mail = "'" . $_SESSION['mail'] . "'";
                require_once "poo_repository.php";
                require_once "poo_models.php";
                try {
                    $modele = new Model("adherant");

                    $exemple1 = new Repository($modele->getTable());

                    $sql = "Select * from " . $modele->getTable() . " where mail = $mail  ";

                    $resultat = $exemple1->requete($sql);

                    foreach ($resultat as $ligne) {
                        $sauvegarde = $ligne["autorisation"];
                        if ($sauvegarde != 3) {
                            header("Location:php_login.php");
                            exit();
                        }
                    }
                } catch (PDOException $e) {
                    die($e->getMessage());
                }
            } else {
                header("Location:php_login.php");
                exit();
            }
            ?>


            <?php
            try {
                $modele2 = new Model("galerie");
                $exemple2 = new Repository($modele2->getTable());
                $sql2 = "SELECT * FROM " . $modele2->getTable();
                $resultat2 = $exemple2->requete($sql2);
                foreach ($resultat2 as $ligne2) {
                    $img = $ligne2["image"];
                    $alt = $ligne2["titre"];
                    $id = "'" . $img . "'"
            ?> <div class="d-flex flex-row justify-content-start align-items-center">
                        <img class="w-50 mt-3 rounded-4 shadow-img" src="ImagesGalerie/<?= $img ?>.png" alt="<?= $alt ?>">
                        <span class="ms-5 mb-0 d-flex flex-row align-items-center">
                            <i onclick="confirmation(<?= $id ?>)" class="fas fs-4 p-2 rounded-3 fa-trash text-danger icon-suppr"></i>
                            <p class="text-danger mb-0 ms-2">Supprimer</p>
                        </span>
                    </div>
            <?php
                }
            } catch (PDOException $e) {
                die($e->getMessage());
            }
            require_once "UID.php"
            ?>


        </section>
    </div>
    <div id="confirm" class="rounded-4 bg-white position-fixed">
        <div class="d-flex justify-content-around align-items-center flex-column h-100">
            <p class="text-blue text-center px-2">Voulez-vous supprimer cette information ? Cette action ne peut
                pas être annulée.</p>
            <div class="d-flex flex-row justify-content-around align-items-center w-100">
                <p id="button_annul" onclick="annulSuppr()" class="px-2 py-1 rounded-3 bg-white">Annuler</p>
                <p id="button_suppr" onclick="supprime(this.value)" value="" class="px-2 py-1 rounded-3 text-white">Supprimer</p>
            </div>
        </div>
    </div>
    <div id="overlay"></div>
    <script src="node_modules/jquery/dist/jquery.js?time=<?php echo UID(200) ?>"></script>
    <script src="js/galerie.js?time=<?php echo UID(200) ?>"></script>
</body>

</html>