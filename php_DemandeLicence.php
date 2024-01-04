<!--

  Copyright by Thomas Henry, Valentin Lamour, Jérôme Fabre et Glenn Guillard.
  Tous droits réservés sur le site par ces membres.

-->

<!DOCTYPE html>
<html lang=fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/demande_licence.css?time=<?php require 'UID.php';
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
                                    <a href="index.php" class="exclu">
                                        <img class="w-50 logo-shadow" src="img/SVG/logo.svg" alt="logo aero club">
                                    </a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_login.php">Accueil</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_gestionnaireUtilisateur.php">Gestion des utilisateurs</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Gestion des réservations</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_analytique.php">Analytiques</a>
                                    <a class="text-blue bg-white text-decoration-none py-1 px-2 rounded-3 exclu" href="php_DemandeLicence.php">Demande de licence</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_Gestion_avions.php">Avions</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Offres</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Liste équipe</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Événement</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Galerie</a>
                                </nav>
                            <?php

                            }
                            if ($sauvegarde == 2) {
                            ?>
                                <nav class="text-center bg-custom text-white d-flex justify-content-around flex-column align-items-center font-avion">
                                    <img class="w-50 logo-shadow mt-3" src="img/SVG/logo.svg" alt="logo aero club">
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
                                    <img class="w-50 logo-shadow mt-3" src="img/SVG/logo.svg" alt="logo aero club">
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
                                    <img class="w-50 logo-shadow mt-3" src="img/SVG/logo.svg" alt="logo aero club">
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
        <section class="w-75 ml-custom">
            <h1 class="text-blue mt-4">Demande de licence</h1>
            <article class="d-flex flex-row">
                <p onclick="affAttente()" id="attente-button" class="rounded-3 px-2 fs-4 me-4">En attente</p>
                <p onclick="affValid()" id="valid-button" class="rounded-3 px-2 fs-4">Acceptées/Refusées</p>
            </article>

            <?php

            //Vérification si quelq'un est connecter
            if (isset($_SESSION['mail'])) {
                $mail = "'" . $_SESSION['mail'] . "'";
                require_once "poo_repository.php";
                require_once "poo_models.php";
                require_once "UID.php";

                //Vérification si la personne est admin
                try {

                    $modele = new Model("adherant");
                    $exemple1 = new Repository($modele->getTable());
                    $sql = "Select autorisation from " . $modele->getTable() . " where mail = $mail  ";
                    $resultat = $exemple1->requete($sql);

                    foreach ($resultat as $ligne) {
                        if ($ligne["autorisation"] == 3) {

            ?>
                            <article id="liste_attente">
                                <p class="fs-4">Liste d’attente pour les Licences</p>
                                <table class="text-blue">
                                    <thead class="text-white">
                                        <tr>
                                            <th>Nom et Prénom</th>
                                            <th>Date de modification</th>
                                            <th>Licence</th>
                                            <th>Plus d'action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        try {

                                            $modele2 = new Model("adherant");
                                            $exemple2 = new Repository($modele2->getTable());
                                            $sql2 = "Select * from " . $modele2->getTable() . " where licence_valid = 1  ";
                                            $resultat2 = $exemple2->requete($sql2);

                                            foreach ($resultat2 as $ligne2) {
                                                $mail = "'" . $ligne2["mail"] . "'";
                                        ?>
                                                <tr>
                                                    <th><?php echo $ligne2["nom"] . " " . $ligne2["prenom"] ?></th>
                                                    <th><?php echo substr($ligne2["date_update"], 0, 10) ?></th>
                                                    <th>
                                                        <span class="d-flex flex-row justify-content-start align-items-center">
                                                            <a href="PDFlicences/<?php echo $ligne2["licence"] ?>.pdf" target="_blank" class="icon-shadow py-1 px-2 rounded-3 bg-white me-3 mb-0">
                                                                <i class="far fa-file text-blue"></i>
                                                            </a>
                                                            <p class="mb-0">Voir la licence</p>
                                                        </span>
                                                    </th>
                                                    <th>
                                                        <span class="d-flex flex-row align-items-center justify-content-around">
                                                            <p class="p-2 icon-shadow rounded-3 mb-0 icon_confirm" onclick="accepter(<?= $mail ?>)">
                                                                <i class="fas fa-check text-success px-1"></i>
                                                            </p>
                                                            <p class="p-2 icon-shadow rounded-3 mb-0 icon_confirm" onclick="refuser(<?= $mail ?>)">
                                                                <i class="fas fa-times text-danger px-1"></i>
                                                            </p>
                                                        </span>
                                                    </th>
                                                </tr>

                                        <?php
                                            }
                                        } catch (PDOException $e) {
                                            die($e->getMessage());
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </article>
                            <article id="liste_licence">
                                <p class="fs-4">Liste des Licences</p>
                                <table class="text-blue">
                                    <thead class="text-white">
                                        <tr>
                                            <th>Nom et Prénom</th>
                                            <th>Date de modification</th>
                                            <th>Licence</th>
                                            <th>Etat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        try {

                                            $modele3 = new Model("adherant");
                                            $exemple3 = new Repository($modele3->getTable());
                                            $sql3 = "Select * from " . $modele3->getTable() . " where licence_valid = 2 or licence_valid = 3  ";
                                            $resultat3 = $exemple3->requete($sql3);

                                            foreach ($resultat3 as $ligne3) {

                                        ?>
                                                <tr>
                                                    <th><?php echo $ligne3["nom"] . " " . $ligne3["prenom"] ?></th>
                                                    <th><?php echo substr($ligne3["date_update"], 0, 10) ?></th>
                                                    <th class="d-flex flex-row justify-content-start align-items-center">
                                                        <a href="PDFlicences/<?php echo $ligne3["licence"] ?>.pdf" target="_blank" class="icon-shadow py-1 px-2 rounded-3 bg-white me-3 mb-0">
                                                            <i class="far fa-file text-blue"></i>
                                                        </a>
                                                        <p class="mb-0">Voir la licence</p>
                                                    </th>
                                                    <th>

                                                        <?php if ($ligne3["licence_valid"] == 2) {
                                                            echo "<span class='d-flex flex-row justify-content-start align-items-center ms-3 mb-0 text-success w-custom px-3 py-1 rounded-4 statu-shadow'>";
                                                            echo "<i class='fas fa-circle me-2 mb-0'></i>";
                                                            echo "<p class='m-0'> Acceptée </p>";
                                                        } ?><?php if ($ligne3["licence_valid"] == 3) {
                                                                echo "<span class='d-flex flex-row justify-content-start align-items-center ms-3 mb-0 text-danger w-custom px-3 py-1 rounded-4 statu-shadow'>";
                                                                echo "<i class='fas fa-circle me-2 mb-0'></i>";
                                                                echo "<p class='m-0'>Refusée</p>";
                                                            } ?>
                                                        </span>
                                                    </th>
                                                </tr>



                        <?php
                                            }
                                        } catch (PDOException $e) {
                                            die($e->getMessage());
                                        }
                                    } else {
                                        header("Location:php_login.php");
                                    }
                                }
                            } catch (PDOException $e) {
                                die($e->getMessage());
                            }
                        } else {
                            header("Location:php_login.php");
                        }
                        ?>

                                    </tbody>
                                </table>
                            </article>
        </section>
    </div>

    <script src="js/gestionLicence.js?time=<?php
                                            echo UID(200) ?>"></script>
    <script src="node_modules/jquery/dist/jquery.js?time=<?php
                                                            echo UID(200) ?>"></script>
    <script src="js/_AccETrefus.js?time=<?php
                                        echo UID(200) ?>""></script>
</body>
</html>