<!--

  Copyright by Thomas Henry, Valentin Lamour, Jérôme Fabre et Glenn Guillard.
  Tous droits réservés sur le site par ces membres.

-->

<!DOCTYPE html>
<html lang=fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reserv_pilote.css?time=<?php require 'UID.php';
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
                                    <a class="exclu" href="index.php">
                                        <img class="w-50 logo-shadow" src="img/SVG/logo.svg" alt="logo aero club">
                                    </a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_login.php">Accueil</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_gestionnaireUtilisateur.php">Gestion des utilisateurs</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Gestion des réservations</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_analytique.php">Analytiques</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Demande de licence</a>
                                    <a class="text-blue bg-white text-decoration-none py-1 px-2 rounded-3 exclu" href="php_Gestion_avions.php">Avions</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_offre.php">Offres</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Liste équipe</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Événement</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Galerie</a>
                                </nav>
                            <?php

                            }
                            if ($sauvegarde == 2) {
                            ?>
                                <nav class="text-center bg-custom text-white d-flex justify-content-around flex-column align-items-center font-avion">
                                    <a class="exclu" href="index.php">
                                        <img class="w-50 logo-shadow" src="img/SVG/logo.svg" alt="logo aero club">
                                    </a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_login.php">Accueil</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_analytique.php">Analytiques</a>
                                    <a class="text-blue bg-white text-decoration-none py-1 px-2 rounded-3 exclu" href="php_Gestion_avions.php">Avions</a>
                                </nav>
                            <?php

                            }


                            if ($sauvegarde == 1) {
                            ?>
                                <nav class="text-center bg-custom text-white d-flex flex-column align-items-center font-avion">
                                    <a class="exclu" href="index.php">
                                        <img class="w-50 logo-shadow" src="img/SVG/logo.svg" alt="logo aero club">
                                    </a>
                                    <div class="d-flex flex-column h-25 justify-content-around my-auto">
                                        <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_login.php">Accueil</a>
                                        <a class="text-blue bg-white text-decoration-none py-1 px-2 rounded-3 exclu" href="">Réservations</a>
                                        <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_Gestion_avions.php">Avions</a>
                                    </div>
                                </nav>
                            <?php

                            }




                            if ($sauvegarde == 0) {
                            ?>
                                <nav class="text-center bg-custom text-white d-flex justify-content-around flex-column align-items-center font-avion">
                                    <a class="exclu" href="index.php">
                                        <img class="w-50 logo-shadow" src="img/SVG/logo.svg" alt="logo aero club">
                                    </a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_login.php">Accueil</a>
                                    <a class="text-blue bg-white text-decoration-none py-1 px-2 rounded-3 exclu" href="">Réservations</a>
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
        <section class="w-75 ml-custom d-flex flex-column mt-3 justify-content-between mb-5">
            <h1 class="text-blue mt-3">Résevations</h1>



            <?php

            //Vérification si quelq'un est connecter
            if (isset($_SESSION['mail'])) {
                $mail = "'" . $_SESSION['mail'] . "'";
                require_once "poo_repository.php";
                require_once "poo_models.php";

                //Vérification si la personne est admin
                try {

                    $modele = new Model("adherant");
                    $exemple1 = new Repository($modele->getTable());
                    $sql = "Select autorisation from " . $modele->getTable() . " where mail = $mail  ";
                    $resultat = $exemple1->requete($sql);

                    foreach ($resultat as $ligne) {
                        if ($ligne["autorisation"] == 1) {

            ?>
                            <article class="d-flex flex-row mt-4">
                                <div class="bg-custom-3 text-white p-4 text-center rounded-3 me-5 mb-0 w-25 shadow-custom d-flex flex-column justify-content-center align-items-center">
                                    <p class="fs-5">Nombre de vol</p>
                                    <p class="fs-1">
                                        <?php
                                        try {
                                            $modele6 = new Model("reservation");
                                            $exemple6 = new Repository($modele6->getTable());
                                            $sql8 = "Select COUNT(*) from " . $modele6->getTable() . " WHERE pilote = $mail";
                                            $resultat8 = $exemple6->requete($sql8);

                                            foreach ($resultat8 as $ligne) { {
                                                    echo  $ligne["COUNT(*)"];
                                                }
                                            }
                                        } catch (PDOException $e) {
                                            die($e->getMessage());
                                        }
                                        ?>


                                    </p>
                                </div>
                                <div class="bg-custom-3 text-white p-4 text-center rounded-3 me-5 mb-0 w-25 shadow-custom d-flex flex-column justify-content-center align-items-center">
                                    <p class="fs-5">Temps de vol</p>
                                    <p class="fs-1">
                                        <?php
                                        try {
                                            $modele6 = new Model("reservation");
                                            $exemple6 = new Repository($modele6->getTable());
                                            $sql8 = "Select SUM(temps_presta) from " . $modele6->getTable() . " WHERE pilote = $mail";
                                            $resultat8 = $exemple6->requete($sql8);

                                            foreach ($resultat8 as $ligne) { {
                                                    echo  $ligne["SUM(temps_presta)"] . " min";
                                                }
                                            }
                                        } catch (PDOException $e) {
                                            die($e->getMessage());
                                        }
                                        ?>


                                    </p>
                                </div>
                            </article>

                            <p class="fw-medium fs-4 mt-4">Liste de réservations pour les Baptêmes de l’air</p>

                            <table class="mt-3 fw-light text-blue">
                                <thead class="text-white">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom et Prénom</th>
                                        <th>Type d'ULM</th>
                                        <th>Pilote</th>
                                        <th>Date</th>
                                        <th>Temps de prestation</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    try {
                                        $modele9 = new Model("reservation");
                                        $exemple9 = new Repository($modele9->getTable());
                                        $sql9 = "Select * from " . $modele9->getTable() . " WHERE pilote = $mail";
                                        $resultat9 = $exemple9->requete($sql9);

                                        foreach ($resultat9 as $ligne2) {

                                    ?>
                                            <tr>
                                                <th>
                                                    <?= $ligne2["num_res"] ?>
                                                </th>
                                                <th>
                                                    <?php
                                                    $mailChecker = "'" . $ligne2["mail"] . "'";
                                                    try {
                                                        $modele1 = new Model("adherant");
                                                        $exemple1 = new Repository($modele1->getTable());
                                                        $sql1 = "Select * from " . $modele1->getTable() . " WHERE mail = $mailChecker";
                                                        $resultat1 = $exemple1->requete($sql1);

                                                        foreach ($resultat1 as $ligne3) {
                                                            echo $ligne3["nom"] . " " . $ligne3["prenom"];
                                                        }
                                                    } catch (PDOException $e) {
                                                        die($e->getMessage());
                                                    }
                                                    ?>
                                                </th>
                                                <th>
                                                    <?php
                                                    $matriculeChecker = "'" . $ligne2["matricule"] . "'";
                                                    try {
                                                        $modele0 = new Model("avion");
                                                        $exemple0 = new Repository($modele0->getTable());
                                                        $sql0 = "Select * from " . $modele0->getTable() . " WHERE matricule = $matriculeChecker";
                                                        $resultat0 = $exemple0->requete($sql0);

                                                        foreach ($resultat0 as $ligne0) {
                                                            echo $ligne3["type"];
                                                        }
                                                    } catch (PDOException $e) {
                                                        die($e->getMessage());
                                                    }
                                                    ?>
                                                </th>
                                                <th>
                                                    <?php

                                                    try {
                                                        $modele12 = new Model("adherant");
                                                        $exemple12 = new Repository($modele12->getTable());
                                                        $sql12 = "Select * from " . $modele12->getTable() . " WHERE mail =  $mail";
                                                        $resultat12 = $exemple12->requete($sql12);

                                                        foreach ($resultat12 as $ligne12) {
                                                            echo $ligne12["nom"] . " " . $ligne12["prenom"];
                                                        }
                                                    } catch (PDOException $e) {
                                                        die($e->getMessage());
                                                    }
                                                    ?>
                                                </th>
                                                <th><?= $ligne2["date_j"] ?> </th>
                                                <th><?= $ligne2["temps_presta"] ?> min</th>
                                            </tr>

                                    <?php


                                        }
                                    } catch (PDOException $e) {
                                        die($e->getMessage());
                                    }
                                    ?>
                                </tbody>
                            </table>


            <?php
                        } else {
                            header("Location: index.php");
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
    </div>
</body>

</html>