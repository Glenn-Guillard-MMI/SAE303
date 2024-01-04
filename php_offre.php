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

            

        </section>
    </div>
</body>

</html>