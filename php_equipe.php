<!--

  Copyright by Thomas Henry, Valentin Lamour, Jérôme Fabre et Glenn Guillard.
  Tous droits réservés sur le site par ces membres.

-->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/equipe.css?time=<?php require 'UID.php';
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
                <a href="index.php" class="w-50 exclu mt-3">
                    <img class="logo-shadow" src="img/SVG/logo.svg" alt="logo aero club">
                </a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_login.php">Accueil</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_gestionnaireUtilisateur.php">Gestion des utilisateurs</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_gestionReservation.php">Gestion des réservations</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_analytique.php">Analytiques</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_DemandeLicence.php">Demande de licence</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_Gestion_avions.php">Avions</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_offre.php">Offres</a>
                <a class="text-blue text-decoration-none py-1 px-2 rounded-3 exclu bg-white" href="php_equipe.php">Liste équipe</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_evenement.php">Événement</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_galerie.php">Galerie</a>
            </nav>
        </section>
        <section class="ml-custom w-75">
            <article class="d-flex flex-row align-items-center mt-4">
                <h1 class="text-blue m-0 me-5">Équipe</h1>
                <p onclick="ajoutEquipe()" class="fs-4 text-blue bg-white ajout_event rounded-3 mb-0">+</p>
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



            <form action="_creationequipe.php" enctype="multipart/form-data" id="ajout-equipe" method="POST" class="position-fixed bg-white p-5 text-blue rounded-4">
                <div class="d-flex flex-column">
                    <h1 class="text-center font-avion">Ajouter un membre</h1>
                    <input type="file" name="images" accept="image/*" class="mt-5">
                    <span class="d-flex flex-row mt-4">
                        <label for="nom">Nom :</label>
                        <input class="ms-4 mb-0 rounded-3 input-custom" type="text" name="nom">
                    </span>
                    <span class="d-flex flex-row mt-3">
                        <label for="prenom">Prénom :</label>
                        <input class="ms-4 mb-0 rounded-3 input-custom" type="text" name="prenom">
                    </span>
                    <span class="d-flex flex-row mt-3">
                        <label for="fonction">Fonction :</label>
                        <input class="ms-4 mb-0 rounded-3 input-custom" type="text" name="fonction">
                    </span>
                    <span class="d-flex flex-row mt-5 justify-content-around align-items-center">
                        <p class="annul_buton bg-white rounded-3 py-1 px-2 mb-0 text-blue fs-5" onclick="anulAjout()">Annuler</p>
                        <input class="suppr_buton bg-custom text-white rounded-3 py-1 px-2 fs-5" type="submit">
                    </span>
                </div>
            </form>

            <article class="d-flex flex-row flex-wrap justify-content-start">

                <?php
                try {
                    $modele = new Model("equipe");

                    $exemple1 = new Repository($modele->getTable());

                    $sql = "Select * from " . $modele->getTable();

                    $resultat = $exemple1->requete($sql);

                    foreach ($resultat as $ligne2) {
                        $img = $ligne2['image'];
                        $id = "'" . $img . "'";
                        $idModification = $ligne2['id'];
                ?>
                        <div class="equipe-container me-4 mb-0 mt-5" style="background-image: url('ImagesEquipe/<?= $img ?>.png');">
                            <div class="content text-white p-3">
                                <div class="d-flex justify-content-around flex-wrap fs-2 fw-medium">
                                    <p class="mb-0" id='nom_<?= $idModification ?>'><?= $ligne2['nom'] ?></p>
                                    <p class="mb-0" id='prenom_<?= $idModification ?>'><?= $ligne2['prenom'] ?></p>
                                </div>
                                <p class="mb-0 text-center fs-4" id='fonction_<?= $idModification ?>'><?= $ligne2['fonction'] ?></p>
                                <div class="d-flex flex-row justify-content-between px-2 mt-3">
                                    <i class="fas fa-pen text-blue p-2 fs-4 bg-white icon-event rounded-3" onclick="modifequipe(<?= $idModification ?>)"></i>
                                    <i class="fas fa-trash text-danger p-2 fs-4 bg-white icon-event rounded-3" onclick="confirm(<?=$id ?>)"></i>
                                </div>
                            </div>
                        </div>
                <?php


                    }
                } catch (PDOException $e) {
                    die($e->getMessage());
                }

                ?>
            </article>
            <form action="_modificationequipe.php" method="POST" id="modif-equipe" class="position-fixed bg-white p-5 text-blue rounded-4">
                <div class="d-flex flex-column">
                    <h1 class="text-center font-avion">Modifier un membre</h1>
                    <span class="d-flex flex-row mt-4">
                        <label for="nom">Nom :</label>
                        <input class="ms-4 mb-0 rounded-3 input-custom" type="text" name="nom" id="newnom">
                    </span>
                    <span class="d-flex flex-row mt-3">
                        <label for="prenom">Prénom :</label>
                        <input class="ms-4 mb-0 rounded-3 input-custom" type="text" name="prenom" id="newprenom">
                    </span>
                    <span class="d-flex flex-row mt-3">
                        <label for="fonction">Fonction :</label>
                        <input class="ms-4 mb-0 rounded-3 input-custom" type="text" name="fonction" id="newfonction">
                    </span>
                    <input type="hidden" name="id" id="id">
                    <span class="d-flex flex-row mt-5 justify-content-around align-items-center">
                        <p class="annul_buton bg-white rounded-3 py-1 px-2 mb-0 text-blue fs-5" onclick="anulModif()">Annuler</p>
                        <input class="suppr_buton bg-custom text-white rounded-3 py-1 px-2 fs-5" type="submit">
                    </span>
            </form>

        </section>
    </div>
    <div id="confirm" class="rounded-4 bg-white position-fixed">
        <div class="d-flex justify-content-around align-items-center flex-column h-100">
            <p class="text-blue text-center px-2">Voulez-vous supprimer cette information ? Cette action ne peut
                pas être annulée.</p>
            <div class="d-flex flex-row justify-content-around align-items-center w-100">
                <p id="button_annul" onclick="annul()" class="px-2 py-1 rounded-3 bg-white">Annuler</p>
                <p id="button_suppr" onclick="supprimeequipe(this.value)" value="" class="px-2 py-1 rounded-3 text-white">Supprimer</p>
            </div>
        </div>
    </div>

    <script src="node_modules/jquery/dist/jquery.js?time=<?php echo UID(200) ?>"></script>
    <script src="js/equipe.js?time=<?php echo UID(200) ?>"></script>

</body>

</html>