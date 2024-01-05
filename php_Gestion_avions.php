<!--

  Copyright by Thomas Henry, Valentin Lamour, Jérôme Fabre et Glenn Guillard.
  Tous droits réservés sur le site par ces membres.

-->

<!DOCTYPE html>
<html lang=fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/gestion_avion.css?time=<?php require 'UID.php';
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

<body class="font-normal">
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
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_DemandeLicence.php">Demande de licence</a>
                                    <a class="text-blue bg-white text-decoration-none py-1 px-2 rounded-3 exclu" href="php_Gestion_avions.php">Avions</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_offre.php">Offres</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Liste équipe</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_evenement.php">Événement</a>
                                    <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_galerie.php">Galerie</a>
                                </nav>
                            <?php

                            }
                            if ($sauvegarde == 2) {
                            ?>
                                <nav class="text-center bg-custom text-white d-flex justify-content-around flex-column align-items-center font-avion">
                                    <a class="exclu" href="index.php">
                                        <img class="w-50 logo-shadow" src="img/SVG/logo.svg" alt="logo aero club">
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
                                    <a class="exclu" href="index.php">
                                        <img class="w-50 logo-shadow" src="img/SVG/logo.svg" alt="logo aero club">
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
                                    <a class="exclu" href="index.php">
                                        <img class="w-50 logo-shadow" src="img/SVG/logo.svg" alt="logo aero club">
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
        <section class="w-75 ml-custom">
            <h1 class="text-blue mt-4">Gestion des utilisateurs</h1>
            <article class="d-flex flex-row align-items-center w-50 justify-content-start mb-4 mt-3">
                <h4 class="text-blue me-5 mb-0">Liste des avions disponible</h4>
                <?php



                try {

                    $modele = new Model("adherant");
                    $exemple1 = new Repository($modele->getTable());
                    $sql = "Select autorisation from " . $modele->getTable() . " where mail = $mail  ";
                    $resultat = $exemple1->requete($sql);

                    foreach ($resultat as $ligne) {
                        if ($ligne["autorisation"] == 3 || $ligne["autorisation"] == 2 || $ligne["autorisation"] == 1) {
                            if ($ligne["autorisation"] == 3) {
                ?>
                                <p onclick="ajoutAvion()" class="fs-4 text-blue bg-white ajout_avion rounded-3 mb-0">+</p>
                            <?php
                            }

                            ?>

                            <?php
                            try {

                                $modele = new Model("adherant");
                                $exemple1 = new Repository($modele->getTable());
                                $sql = "Select autorisation from " . $modele->getTable() . " where mail = $mail  ";
                                $resultat = $exemple1->requete($sql);
                                foreach ($resultat as $ligne) {
                            ?>

            </article>
            <table>
                <thead class="text-white">
                    <tr>
                        <th>Nom</th>
                        <th>Class</th>
                        <th>Matricule</th>
                    <?php if ($ligne["autorisation"] == 3) {
                                        echo " <th>Plus d'option</th>";
                                    }
                                } ?>


                    </tr>
                </thead>
                <tbody class="text-blue">
                    <?php
                                try {
                                    $modele2 = new Model("avion");
                                    $exemple2 = new Repository($modele2->getTable());
                                    $sql2 = "Select * from " . $modele2->getTable() . " WHERE Active = 1";
                                    $resultat2 = $exemple2->requete($sql2);
                                    foreach ($resultat2 as $ligne2) {





                    ?>
                            <tr id="<?php echo "Matricule_" . $ligne2["matricule"] ?>">
                                <th><?= $ligne2["nom"] ?></th>
                                <th><?= $ligne2["type"] ?></th>
                                <th><?= $ligne2["matricule"] ?></th>
                                <?php if ($ligne["autorisation"] == 3) {
                                            $supr = "'" . $ligne2["matricule"] . "'";
                                ?>
                                    <th class="text-danger">
                                        <span onclick="test(<?= $supr ?>)" class="d-flex flex-row justify-content-start align-items-center width-custom pe-auto cursor-pointer">
                                            <i class="fas fa-trash trash-icon icon_supp me-3 mb-0"></i>
                                            <p class="mb-0">Supprimer</p>
                                        </span>
                                    </th>

                                <?php }
                                ?>

                            </tr>
                        <?php } ?>
                </tbody>
            </table>
            <div id="confirm" class="rounded-4 bg-white">
                <div class="d-flex justify-content-around align-items-center flex-column h-100">
                    <p class="text-blue text-center px-2">Voulez-vous supprimer cette information ? Cette action ne peut
                        pas être annulée.</p>
                    <div class="d-flex flex-row justify-content-around align-items-center w-100">
                        <p id="button_annul" onclick="annul()" class="px-2 py-1 rounded-3 bg-white">Annuler</p>

                        <p id="button_suppr" onclick="supression(this.value)" value="" class="px-2 py-1 rounded-3 text-white">Supprimer</p>

                    </div>
                </div>
            </div>
            <div id="overlay"></div>


    <?php



                                } catch (PDOException $e) {
                                    die($e->getMessage());
                                    header("Location: php_connexion.php");
                                }
                            } catch (PDOException $e) {
                                die($e->getMessage());
                                header("Location: php_connexion.php");
                            }
    ?>


<?php
                        } else {
                            header("Location: php_connexion.php");
                        }


                        if ($ligne["autorisation"] == 3) {
?>

    <div id="ajout_avion_form" class="bg-white rounded-3">
        <div class="d-flex justify-content-center align-items-center flex-column">
            <h2 class="mt-3 text-blue font-avion">Ajouter un Avion</h2>
            <form action="_AjoutAvion.php" method="POST" class="d-flex flex-column w-75 mt-5 mb-4 text-blue justify-content-center align-items-center">
                <div class="d-flex flex-column text-blue justify-content-end align-items-end">
                    <div class="width-custom d-flex flex-row">
                        <label for="Nom">Nom : </label>
                        <input type="texte" id="Nom" name="Nom" onkeyup="vérifiNom()" class="w-50 ms-5 mb-0 input_crea_avion rounded-3">
                    </div>
                    <div class="width-custom d-flex flex-row mt-3">
                        <label for="Class">Classe : </label>
                        <input type="texte" id="Class" onkeyup="vérifiClass()" name="Class" class="w-50 ms-5 mb-0 input_crea_avion rounded-3">
                    </div>
                    <div class="width-custom d-flex flex-row mt-3 mb-5">
                        <label for="Matricule">Matricule : </label>
                        <input type="texte" id="Matricule" onkeyup="vérifiMatricule()" name="Matricule" class="w-50 ms-5 mb-0 input_crea_avion rounded-3">
                    </div>
                </div>
                <div class="w-75 d-flex flex-row mt-4 justify-content-between">
                    <input onclick="annulCrea()" type="button" id="annul" value="Annuler" class="bouton_annul bg-white rounded-3 fs-5">
                    <input type="submit" id="push" value="Ajouter" disabled class="bouton_ajout rounded-3 bg-custom text-white fs-5">
                </div>
            </form>
        </div>
    </div>


<?php
                        }
                    }
                } catch (PDOException $e) {
                    die($e->getMessage());
                    header("Location: php_connexion.php");
                }


?>

        </section>
    </div>
    <script src="node_modules/jquery/dist/jquery.js?time=<?php 'UID.php';
                                                            echo UID(200) ?>"></script>
    <script src="js/gestionAvionsScript.js?time=<?php 'UID.php';
                                                echo UID(200) ?>"></script>
</body>

</html>