<!--

  Copyright by Thomas Henry, Valentin Lamour, Jérôme Fabre et Glenn Guillard.
  Tous droits réservés sur le site par ces membres.

-->

<!DOCTYPE html>
<html lang=fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/event.css?time=<?php require 'UID.php';
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
    <title>ACF2L - Analytique</title>
</head>

<body class="font-normal text-blue">
    <div id="overlay"></div>
    <div class="d-flex flex-row w-100 h-100 mb-5">
        <section class="w-25 h-100 position-fixed start-0">
            <nav class="text-center bg-custom text-white d-flex justify-content-around flex-column align-items-center font-avion">
                <a class="exclu" href="index.php">
                    <img class="w-50 logo-shadow" src="img/SVG/logo.svg" alt="logo aero club">
                </a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_login.php">Accueil</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_gestionnaireUtilisateur.php">Gestion des utilisateurs</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Gestion des réservations</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_analytique.php">Analytiques</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_DemandeLicence.php">Demande de licence</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_Gestion_avions.php">Avions</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_offre.php">Offres</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Liste équipe</a>
                <a class="text-blue text-decoration-none py-1 px-2 rounded-3 exclu bg-white" href="php_evenement.php">Événement</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_galerie.php">Galerie</a>
            </nav>
        </section>
        <section class="ml-custom w-75">
            <article class="d-flex flex-row align-items-center mt-4">
                <h1 class="text-blue m-0 me-5">Événements</h1>
                <p onclick="ajoutEvent()" class="fs-4 text-blue bg-white ajout_event rounded-3 mb-0">+</p>
            </article>
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

            <form action="_ajoutEvenement.php" method="POST" enctype="multipart/form-data" id="ajout-event" class="position-fixed w-50 bg-white p-3 rounded-3">
                <div class="d-flex flex-column">
                    <h1 class="font-avion text-center">Ajouter un événement</h1>
                    <input id="test" class="ajout_input w-50 mx-auto exclus" type="file" name="images" accept=".png">
                    <span class="d-flex flex-row justify-content-start align-items-center w-50 mx-auto mt-3">
                        <label for="titre">Titre :</label>
                        <input class="ajout_input w-50 mx-auto rounded-3 p-1" type="text" name="titre" placeholder="Événement">
                    </span>
                    <span class="d-flex flex-row justify-content-start align-items-center w-50 mx-auto mt-3">
                        <label for="date">Date de début :</label>
                        <input class="ajout_input w-50 mx-auto rounded-3 p-1" type="date" name="date_une">
                    </span>
                    <span class="d-flex flex-row justify-content-start align-items-center w-50 mx-auto mt-3">
                        <label for="date">Date de fin :</label>
                        <input class="ajout_input w-50 mx-auto rounded-3 p-1" type="date" name="date_deux">
                    </span>
                    <span class="d-flex flex-row justify-content-start align-items-center w-50 mx-auto mt-3">
                        <label for="localisation">Lieu :</label>
                        <input class="ajout_input w-50 mx-auto rounded-3 p-1" type="text" name="localisation" placeholder="Paris, France">
                    </span>
                    <span class="d-flex flex-row justify-content-start align-items-center w-50 mx-auto mt-3">
                        <label for="url">URL :</label>
                        <input class="ajout_input w-50 mx-auto rounded-3 p-1" type="text" name="url" placeholder="google.com">
                    </span>
                    <div class="d-flex flex-row w-50 mx-auto justify-content-around align-items-center mt-5">
                        <p onclick="anulAjout()" class="annul_buton bg-white rounded-3 py-1 px-2 mb-0 text-blue fs-5">Annuler</p>
                        <input class="suppr_buton bg-custom text-white rounded-3 py-1 px-2 fs-5" type="submit" value="Ajouter">
                    </div>
                </div>
            </form>
            <p class="mt-3 fs-5">L'image choisi sera permanant et ne pourras pas être modifier par la suite.</p>

            <?php


            //Recupération POO
            require_once "poo_repository.php";
            require_once "poo_models.php";

            //Lancement de la requete
            try {

                $modele = new Model("evenement");
                $Repository = new Repository($modele->getTable());
                $sql = "SELECT * FROM " . $modele->getTable();
                $resultat = $Repository->requete($sql);
                foreach ($resultat as $ligne) {

                    $img = "ImagesEvenement/" . $ligne["image"] . ".png";
                    $id = "'" . $ligne["image"] . "'"
            ?>
                    <div class="d-flex flex-row mb-5">
                        <div class="w-25 img-shadow rounded-4 d-flex justify-content-center align-items-center">
                            <img class="w-75 h-75 rounded-4" src="<?= $img ?>">
                        </div>
                        <div class="w-75 ps-4 d-flex flex-column justify-content-center align-items-start">
                            <a class="text-blue text-decoration-none mb-3 lien-event" href="<?= $ligne["lien"] ?>" id="url_<?= $id ?>" target="_blank">
                                <p class="fs-1 fw-medium mb-0" id="nom_<?= $id ?>"><?= $ligne["nom"] ?></p>
                                <div class="ligne bg-custom w-100 rounded-4"></div>
                            </a>
                            <p id="localisation_<?= $id ?>"><?= $ligne["lieu"] ?></p>
                            <div class="d-flex flex-row">
                                <p id="dateUne_<?= $id ?>"><?= $ligne["date_debut"] ?></p>
                                <p class="mx-2"> - </p>
                                <p id="dateDeux_<?= $id ?>"><?= $ligne["date_fin"] ?></p>
                            </div>
                            <div class="d-flex flex-row">
                                <p class="me-4"><i onclick="modifier(<?= $id ?>)" class="fas fa-pen p-2 fs-4 icon-event rounded-3"></i></p>
                                <p><i onclick="suppr(<?= $id ?>)" class="fas fa-trash text-danger p-2 fs-4 icon-event rounded-3"></i></p>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } catch (PDOException $e) {
                die($e->getMessage());
            }
            require_once "UID.php";

            ?>
            <form action="_modificationevenement.php" method="POST" class="position-fixed w-50 bg-white p-3 rounded-3" id="modif-event">
                <div class="d-flex flex-column">
                    <h1 class="font-avion text-center">Ajouter un événement</h1>
                    <span class="d-flex flex-row justify-content-start align-items-center w-50 mx-auto mt-3">
                        <label for="titre">Titre :</label>
                        <input class="ajout_input w-50 mx-auto rounded-3 p-1" type="text" name="titre" id="newtitre">
                    </span>
                    <span class="d-flex flex-row justify-content-start align-items-center w-50 mx-auto mt-3">
                        <label for="date">Date de début :</label>
                        <input class="ajout_input w-50 mx-auto rounded-3 p-1" type="date" name="date_une" id="newDateUne">
                    </span>
                    <span class="d-flex flex-row justify-content-start align-items-center w-50 mx-auto mt-3">
                        <label for="date">Date de début :</label>
                        <input class="ajout_input w-50 mx-auto rounded-3 p-1" type="date" name="date_deux" id="newDateDeux">
                    </span>
                    <span class="d-flex flex-row justify-content-start align-items-center w-50 mx-auto mt-3">
                        <label for="localisation">Lieu :</label>
                        <input class="ajout_input w-50 mx-auto rounded-3 p-1" type="text" name="localisation" id="newlocalisation">
                    </span>
                    <span class="d-flex flex-row justify-content-start align-items-center w-50 mx-auto mt-3">
                        <label for="url">URL :</label>
                        <input class="ajout_input w-50 mx-auto rounded-3 p-1" type="text" name="url" id="newurl">
                    </span>
                    <input type="text" name="id" id="newid" style="display: none;">

                    <div class="d-flex flex-row w-50 mx-auto justify-content-around align-items-center mt-5">
                        <p onclick="anulModif()" class="annul_buton bg-white rounded-3 py-1 px-2 mb-0 text-blue fs-5">Annuler</p>
                        <input class="suppr_buton bg-custom text-white rounded-3 py-1 px-2 fs-5" type="submit">
                    </div>
                </div>
            </form>

        </section>
    </div>
    <div id="confirm" class="rounded-4 bg-white position-fixed">
        <div class="d-flex justify-content-around align-items-center flex-column h-100">
            <p class="text-blue text-center px-2">Voulez-vous supprimer cette information ? Cette action ne peut
                pas être annulée.</p>
            <div class="d-flex flex-row justify-content-around align-items-center w-100">
                <p id="button_annul" onclick="annul()" class="px-2 py-1 rounded-3 bg-white">Annuler</p>
                <p id="button_suppr" onclick="confirmSupp(this.value)" value="" class="px-2 py-1 rounded-3 text-white">Supprimer</p>
            </div>
        </div>
    </div>
    <script src="node_modules/jquery/dist/jquery.js?time=<?php echo UID(200) ?>"></script>
    <script src="js/evenement.js?time=<?php echo UID(200) ?>"></script>
</body>

</html>