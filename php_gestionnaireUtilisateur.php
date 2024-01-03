<!--

  Copyright by Thomas Henry, Valentin Lamour, Jérôme Fabre et Glenn Guillard.
  Tous droits réservés sur le site par ces membres.

-->

<!DOCTYPE html>
<html lang=fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/gestionUtil.css?time=<?php require 'UID.php';
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
            <nav class="text-center bg-custom text-white d-flex justify-content-around flex-column align-items-center font-avion">
                <img class="w-50 logo-shadow" src="img/SVG/logo.svg" alt="logo aero club">
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_login.php">Accueil</a>
                <a class="text-blue bg-white text-decoration-none py-1 px-2 rounded-3 exclu" href="php_gestionnaireUtilisateur.php">Gestion des utilisateurs</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Gestion des réservations</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_analytique.php">Analytiques</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_DemandeLicence.php">Demande de licence</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_Gestion_avions.php">Avions</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Offres</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Liste équipe</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Événement</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Galerie</a>
            </nav>
        </section>
        <section class="w-75 ml-custom">
            <h1 class="text-blue mt-4">Gestion des utilisateurs</h1>
            <h2 class="text-blue fw-normal mb-4">Trier</h2>

            <?php
            //Lancement session
            session_start();

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
                        if ($ligne["autorisation"] == 3) {
                            try {
                                $sql2 = "SELECT * FROM " . $modele->getTable() . " WHERE compte_actif = 1 ";
                                $sql3 = "SELECT mail FROM " . $modele->getTable() . " WHERE mail = $mail";
                                $sql4 = "$sql2 AND mail NOT IN ($sql3)";
                                $resultat2 = $exemple1->requete($sql4);
            ?>
                                <article class="d-flex justify-content-between w-75">
                                    <div class="w-50 d-flex justify-content-around">
                                        <input type="button" id="all" name="Search_Status" checked onclick="all_status()" value="Tout" class="bg-white text-blue button-custom px-3 rounded-4 fw-medium">

                                        <input type="button" id="staff" name="Search_Status" onclick="status_staff()" value="Staff" class="bg-white text-blue button-custom px-3 rounded-4 fw-medium">

                                        <input type="button" id="pilote" name="Search_Status" onclick="status_pilote()" value="Pilote" class="bg-white text-blue button-custom px-3 rounded-4 fw-medium">

                                        <input type="button" id="adherant" name="Search_Status" onclick="status_adheran()" value="Adhérant" class="bg-white text-blue button-custom px-3 rounded-4 fw-medium">
                                    </div>
                                    <input type="texte" id="search" onkeyup="search()" placeholder="Rechercher" class="bg-white text-blue input-custom rounded-3">
                                </article>
                                <table class="mt-5 fw-light text-blue">
                                    <thead class="">
                                        <tr class="text-white">
                                            <th>Nom et Prénom</th>
                                            <th>status</th>
                                            <th>Téléphone</th>
                                            <th>E-mail</th>
                                            <th>Adresse</th>
                                            <th>Plus d'action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <script>
                                            let name_classe_search = [];
                                        </script>
                                        <?php
                                        foreach ($resultat2 as $ligne2) {
                                        ?>
                                            <script>
                                                name_classe_search.push(<?php echo "'" . "Aff_" . $ligne2["nom"] . "'" ?>)
                                            </script>

                                            <?php
                                            $mailJqierry = "'" . $ligne2["mail"] . "'";
                                            echo "<tr id='Utilisateur_" . str_replace(".", "", str_replace('@', '', $ligne2["mail"])) . "' class='affiche Aff_" . $ligne2["nom"] . " statusAll status_" . $ligne2["autorisation"] . "'>";
                                            echo "<td>";
                                            echo $ligne2["nom"] . " " . $ligne2["prenom"];
                                            echo "</td>";
                                            echo "<td>";


                                            ?>
                                            <select class="rounded-3" onchange="ModificationStatus(<?php echo $mailJqierry ?>,this.value)" id=<?php echo "Changement_" . str_replace(".", "", str_replace('@', '', $ligne2["mail"])) ?>>
                                                <?php


                                                echo "<option value='adhéran'";
                                                if ($ligne2["autorisation"] == 0) {
                                                    echo "selected";
                                                }
                                                echo ">adhérant</option>";


                                                echo "<option value='pilote'";
                                                if ($ligne2["autorisation"] == 1) {
                                                    echo "selected";
                                                }
                                                echo ">pilote</option>";


                                                echo "<option value='staff'";
                                                if ($ligne2["autorisation"] == 2) {
                                                    echo "selected";
                                                }
                                                echo ">staff</option>";
                                                echo "<option value='admin'";
                                                if ($ligne2["autorisation"] == 3) {
                                                    echo "selected";
                                                }
                                                echo ">admin</option>";

                                                echo "</select>";

                                                echo "</td>";

                                                echo "<td>";
                                                echo $ligne2["num_tel"];
                                                echo "</td>";

                                                echo "<td>";
                                                echo $ligne2["mail"];
                                                echo "</td>";

                                                echo "<td>";
                                                echo $ligne2["adresse"] . "," . $ligne2["ville"] . "," . $ligne2["code_postale"];
                                                echo "</td>";

                                                echo "<td class='d-flex flex-row justify-content-between align-items-center w-75 mx-auto'>";
                                                if ($ligne2["licence_valid"] == 2) { ?>
                                                    <a href="PDFlicences/<?= $ligne2["licence"] ?>.pdf" target="_blank" class="icon-shadow py-1 px-2 rounded-3">
                                                        <i class="far fa-file text-blue my-auto"></i>
                                                    </a>

                                                <?php } ?>
                                                <div class="icon-shadow py-1 px-2 rounded-3">
                                                    <i onclick="test(<?php echo $mailJqierry ?>)" class="fas fa-trash trash-icon icon_supp text-danger"></i>
                                                </div>
                                        <?php
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    } catch (PDOException $e) {
                                        die($e->getMessage());
                                    }


                                        ?>
                                    </tbody>
                                </table>
                                <div id="confirm" class="rounded-4 bg-white">
                                    <div class="d-flex justify-content-around align-items-center flex-column h-100">
                                        <p class="text-blue text-center px-2">Voulez-vous supprimer cette information ? Cette action ne peut
                                            pas être annulée.</p>
                                        <div class="d-flex flex-row justify-content-around align-items-center w-100">
                                            <p id="button_annul" onclick="annul()" class="px-2 py-1 rounded-3 bg-white">Annuler</p>
                                            <p id="button_suppr" onclick="suppresion(this.value)" value="" class="px-2 py-1 rounded-3 text-white">Supprimer</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="overlay"></div>
                <?php

                        } else {
                            header("Location: index.php");
                        }
                    }
                } catch (PDOException $e) {
                    die($e->getMessage());
                }
            } else {
                header("Location: index.php");
            }


                ?>

        </section>
    </div>
    <script src="node_modules/jquery/dist/jquery.js?time=<?php 'UID.php';
                                                            echo UID(200) ?>"></script>
    <script src="js/gestionnaireScript.js?time=<?php 'UID.php';
                                                echo UID(200) ?>"></script>

</body>

</html>