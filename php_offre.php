<!--

  Copyright by Thomas Henry, Valentin Lamour, Jérôme Fabre et Glenn Guillard.
  Tous droits réservés sur le site par ces membres.

-->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/offre.css?time=<?php require 'UID.php';
    echo UID(200) ?>">
    <link rel="stylesheet" href="css/bootstrap.min.css?time=<?php echo UID(200) ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="node_modules/jquery/dist/jquery.js"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap"
        rel="stylesheet">
    <link rel="icon" href="img/SVG/logo.svg">
    <title>ACF2L</title>
</head>

<body class="font-normal text-blue overflow-x-hidden">
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
            <nav
                class="text-center bg-custom text-white d-flex justify-content-around flex-column align-items-center font-avion">
                <a class="exclu" href="index.php">
                    <img class="w-50 logo-shadow" src="img/SVG/logo.svg" alt="logo aero club">
                </a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_login.php">Accueil</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3"
                    href="php_gestionnaireUtilisateur.php">Gestion des utilisateurs</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Gestion des réservations</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_analytique.php">Analytiques</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Demande de licence</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_Gestion_avions.php">Avions</a>
                <a class="text-blue bg-white text-decoration-none py-1 px-2 rounded-3 exclu"
                    href="php_offre.php">Offres</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Liste équipe</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_evenement.php">Événement</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_galerie.php">Galerie</a>
            </nav>
            <?php

                            }
                            if ($sauvegarde == 2) {
                                ?>
            <nav
                class="text-center bg-custom text-white d-flex justify-content-around flex-column align-items-center font-avion">
                <a class="exclu" href="index.php">
                    <img class="w-50 logo-shadow" src="img/SVG/logo.svg" alt="logo aero club">
                </a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_login.php">Accueil</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_analytique.php">Analytiques</a>
                <a class="text-blue bg-white text-decoration-none py-1 px-2 rounded-3 exclu"
                    href="php_Gestion_avions.php">Avions</a>
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
                    <a class="text-blue bg-white text-decoration-none py-1 px-2 rounded-3 exclu"
                        href="">Réservations</a>
                    <a class="text-white text-decoration-none py-1 px-2 rounded-3"
                        href="php_Gestion_avions.php">Avions</a>
                </div>
            </nav>
            <?php

                            }




                            if ($sauvegarde == 0) {
                                ?>
            <nav
                class="text-center bg-custom text-white d-flex justify-content-around flex-column align-items-center font-avion">
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
            <h1 class="text-blue mt-3">Offres</h1>
            <p class="fs-4">Liste des batêmes de l'air disponible</p>

            <article class="w-100 d-flex flex-row">
                <div class="d-flex flex-row card-container bapteme-container">
                    <?php
                    try {

                        $model = new Model("bapteme");
                        $ex = new Repository($model->getTable());
                        $sql = "Select * from " . $model->getTable(). " WHERE active = 0";
                        $result = $ex->requete($sql);
                        foreach ($result as $lign) {
                            $nom = $lign["nom"];
                            ?>
                    <div class="carte text-center px-2 py-3 rounded-3 d-flex flex-column justify-content-around">
                        <img class="img-bapteme rounded-3 mx-auto h-25 object-fit-cover"
                            src="ImageBapteme/<?= $lign["image"] ?>.png" alt="<?= $nom ?>">
                        <p id="nom_<?= $nom ?>" class="fs-4 fw-medium">
                            <?= $nom ?>
                        </p>
                        <p>
                            <?php
                                    $n = 0;
                                    $f = $lign["formule"];
                                    $formule = explode(";", $f);
                                    foreach ($formule as $f) {
                                        if ($n == 0) {
                                            echo "Formule " . $f;
                                        }
                                        if ($n == 1) {
                                            echo " et " . $f;
                                        }
                                        $n++;
                                    }
                                    ?>
                        </p>
                        <p>
                            <?php
                                    $a = 0;
                                    $min = $lign["temps"];
                                    $imagePourSuprr= "'".$lign["image"]."'";
                                    $temps = explode(";", $min);
                                    foreach ($temps as $min) {
                                        if ($a == 0) {
                                            echo $min;
                                        }
                                        if ($a == 1) {
                                            echo " ou " . $min;
                                        }
                                        $a++;
                                    }
                                    ?>
                            minutes de prestations
                        </p>
                        <input type="hidden" id="prix_<?= $nom ?>" value="<?= $lign["prix"] ?>">
                        <p>
                            <?= $lign["prix"] ?>€
                        </p>

                        <div class="d-flex flex-row justify-content-around">

                            <i onclick="modifBapt('<?= $nom ?>')" class="fas fa-pen p-2 fs-5 icon-event rounded-3"></i>
                            <i onclick="supprBapt(<?=$imagePourSuprr?>)"
                                class="fas fa-trash text-danger p-2 fs-5 icon-event rounded-3"></i>
                        </div>
                    </div>
                    <?php
                        }
                    } catch (PDOException $e) {
                        die($e->getMessage());
                    }
                    ?>
                </div>
                <div class="d-flex text-center align-items-center">
                    <p onclick="ajoutBapt()" class="fs-1 px-3 py-1 icon-event ms-5 rounded-4 plus-icon">+</p>
                </div>
            </article>


            <p class="mt-5 fs-4">Liste des formations disponibles</p>
            <article class="w-100 d-flex flex-row mt-3">
                <div class="d-flex flex-row card-container formation-container">
                    <?php
                    try {

                        $model1 = new Model("formation");
                        $ex1 = new Repository($model1->getTable());
                        $sql1 = "Select * from " . $model1->getTable(). " WHERE active = 0";
                        $result1 = $ex1->requete($sql1);
                        foreach ($result1 as $lign1) {
                            $nom1 = $lign1["nom"];
                            $id = $lign1["id"];
                            ?>
                    <input type="hidden" id="id_<?= $nom1 ?>" value="<?= $lign1["id"] ?>">

                    <div class="carte text-center px-2 py-3 rounded-3 d-flex flex-column justify-content-around">
                        <p id="nom_<?= $nom1 ?>" class="fs-3 fw-medium">
                            <?= $nom1 ?>
                        </p>
                        <ul>
                            <?php
                                    $des = $lign1["description"];
                                    $description = explode(";", $des);
                                    foreach ($description as $des) {
                                        echo "<li>" . $des . "</li>";
                                    }
                                    ?>
                        </ul>
                        <input type="hidden" id="prix_<?= $nom1 ?>" value="<?= $lign1["prix"] ?>">
                        <p class="text-center">
                            <?= $lign1["prix"] ?>€
                        </p>
                        <div class="d-flex flex-row justify-content-around">
                            <i onclick="modifForm('<?= $nom1 ?>', '<?= $n ?>')"
                                class="fas fa-pen p-2 fs-5 icon-event rounded-3"></i>
                            <i onclick="supprForm(<?= $id ?>)"
                                class="fas fa-trash text-danger p-2 fs-5 icon-event rounded-3"></i>
                        </div>
                    </div>
                    <?php
                        }
                    } catch (PDOException $e) {
                        die($e->getMessage());
                    }
                    ?>

                </div>
                <div class="d-flex text-center align-items-center">
                    <p onclick="ajoutForm()" class="fs-1 px-3 py-1 icon-event ms-5 rounded-4 plus-icon">+</p>
                </div>
            </article>


            <p class="mt-5 fs-4">Liste des forfaits disponibles</p>
            <article class="w-100 d-flex flex-row mt-3">
                <div class="d-flex flex-row card-container forfait-container">
                    <?php
                    try {

                        $model2 = new Model("forfait");
                        $ex2 = new Repository($model2->getTable());
                        $sql2 = "Select * from " . $model2->getTable(). " WHERE active = 0";
                        $result2 = $ex2->requete($sql2);
                        foreach ($result2 as $lign2) {
                            $nom2 = $lign2["nom"];
                            $id = $lign2["id"];
                            ?>
                    <div class="carte text-center px-2 py-3 rounded-3 d-flex flex-column justify-content-around">
                        <p class="fs-3 fw-medium">
                            <?= $nom2 ?>
                        </p>
                        <ul>
                            <?php
                                    $des = $lign2["description"];
                                    $description = explode(";", $des);
                                    foreach ($description as $des) {
                                        echo "<li>" . $des . "</li>";
                                    }
                                    ?>
                        </ul>
                        <p class="text-center">
                            <?= $lign2["prix"] ?>€
                        </p>
                        <div class="d-flex flex-row justify-content-around">
                            <i onclick="modifForfait()" class="fas fa-pen p-2 fs-5 icon-event rounded-3"></i>
                            <i onclick="supprForfait(<?=$id ?>)"
                                class="fas fa-trash text-danger p-2 fs-5 icon-event rounded-3"></i>
                        </div>
                    </div>
                    <?php
                        }
                    } catch (PDOException $e) {
                        die($e->getMessage());
                    }
                    ?>
                </div>
                <div class="d-flex text-center align-items-center">
                    <p onclick="ajoutForfait()" class="fs-1 px-3 py-1 icon-event ms-5 rounded-4 plus-icon">+</p>
                </div>
            </article>



        </section>
    </div>

    <!--  SECTION DE 3 FORM POUR LES MODIFICATIONS DE FORFAITS/BAPTEMES/FORMATIONS  -->

    <section id="modif-bapteme" class="position-fixed bg-white py-4 w-50 rounded-4">
        <h1 class="font-avion text-center">Modifier un baptême de l'air</h1>
        <form method="post" action="_modificationbapteme.php" id="form-modif-bapteme"
            class="text-blue w-50 mx-auto mt-5">
            <span class="d-flex flex-row mt-3">
                <label for="titre">Nom : </label>
                <input id="newnom" type="text" class="ms-4 mb-0" disabled>
                <input id="newnom1" type="hidden" name="nom" class="ms-4 mb-0">
            </span>
            <span class="d-flex flex-row justify-content-start mt-3">
                <label for="formule">Formule :</label>
                <div class="ms-3 mb-0">
                    <label for="solo">Solo</label>
                    <input type="checkbox" name="solo" id="solo" checked>
                    <label for="duo" class="ms-2 mb-0">Duo</label>
                    <input type="checkbox" name="duo" id="duo">
                </div>
            </span>
            <span class="d-flex flex-row mt-3">
                <label for="formule">Temps :</label>
                <div class="ms-3 mb-0">
                    <label for="20">20 min</label>
                    <input type="checkbox" name="20" id="20" checked>
                    <label for="30" class="ms-2 mb-0">30 min</label>
                    <input type="checkbox" name="30" id="30">
                </div>
            </span>
            <span class="d-flex flex-row mt-3">
                <label for="prix">Prix :</label>
                <input id="newprix" type="number" name="prix" class="ms-4 mb-0">
            </span>
            <span class="d-flex flex-row justify-content-around mt-5">
                <p onclick="annModBapt()" class="annul_buton bg-white rounded-3 py-1 px-2 mb-0 text-blue fs-5">Annuler
                </p>
                <input type="submit" value="Modifier" class="suppr_buton bg-custom text-white rounded-3 py-1 px-2 fs-5">
            </span>
        </form>
    </section>

    <section id="modif-formation" class="position-fixed bg-white py-4 w-50 rounded-4">
        <h1 class="font-avion text-center">Modifier une formation</h1>
        <form method="post" action="_modificationformation.php" id="form-modif-formation"
            class="text-blue w-75 mt-5 mx-auto">
            <span class="d-flex flex-row mt-3">
                <label for="titre">Titre : </label>
                <input id="newnom2" type="text" name="nom" class="ms-4 mb-0 w-50">
                <input type="hidden" id="newid2" name="id">
            </span>
            <div>
                <div class="d-flex flex-row mt-3">
                    <label for="temps">Détails :</label>
                    <p class="ms-4 mb-0 cursor text-decoration-underline"
                        onclick="ajouterInfo('modif-info-form','input-modif-formation')">Ajouter Info</p>
                    <p class="ms-4 mb-0 cursor text-decoration-underline"
                        onclick="supprInfo('modif-info-form','input-modif-formation')">Supprimer Info</p>
                </div>
                <span id='modif-info-form' class="d-flex flex-column mt-3">
                    <input type="text" name="titre_0" class="ms-4 w-75 mb-0 input-modif-formation">
                </span>
            </div>
            <span class="d-flex flex-row mt-3">
                <label for="prix">Prix :</label>
                <input id="newprix2" type="number" name="prix" class="ms-4 mb-0">
            </span>
            <span class="d-flex flex-row justify-content-around mt-5">
                <p onclick="annModForm()" class="annul_buton bg-white rounded-3 py-1 px-2 mb-0 text-blue fs-5">Annuler
                </p>
                <input type="submit" value="Modifier" class="suppr_buton bg-custom text-white rounded-3 py-1 px-2 fs-5">
            </span>
        </form>
    </section>

    <section id="modif-forfait" class="position-fixed bg-white py-4 w-50 rounded-4">
        <h1 class="font-avion text-center">Modifier un forfait</h1>
        <form method="post" action="" id="form-modif-forfait" class="text-blue w-75 mx-auto mt-5">
            <span class="d-flex flex-row mt-3">
                <label for="titre">Titre : </label>
                <input type="text" name="titre" class="ms-4 mb-0">
            </span>
            <div>
                <div class="d-flex flex-row mt-3">
                    <label for="temps">Détails :</label>
                    <p class="ms-4 mb-0 cursor text-decoration-underline"
                        onclick="ajouterInfo('modif-info-forfait','input-modif-forfait')">Ajouter Info</p>
                    <p class="ms-4 mb-0 cursor text-decoration-underline"
                        onclick="supprInfo('modif-info-forfait','input-modif-forfait')">Supprimer Info</p>
                </div>
                <span id='modif-info-forfait' class="d-flex flex-column mt-3">
                    <input type="text" name="titre" class="ms-4 w-75 mb-0 input-modif-forfait">
                </span>
            </div>
            <span class="d-flex flex-row mt-3">
                <label for="prix">Prix :</label>
                <input type="number" name="prix" class="ms-4 mb-0">
            </span>
            <span class="d-flex flex-row mt-3">
                <label for="prix">Prix :</label>
                <div>
                    <label for="prix_h" class="ms-4 mb-0">Fixe :</label>
                    <input type="radio" name="prix_h">
                    <label for="prix_h" class="ms-3 mb-0">Par heure :</label>
                    <input type="radio" name="prix_h">
                </div>
            </span>
            <span class="d-flex flex-row justify-content-around mt-5">
                <p onclick="annModForfait()" class="annul_buton bg-white rounded-3 py-1 px-2 mb-0 text-blue fs-5">
                    Annuler</p>
                <input type="submit" value="Modifier" class="suppr_buton bg-custom text-white rounded-3 py-1 px-2 fs-5">
            </span>
        </form>
    </section>

    <!--  SECTION DE 3 FORM POUR LES AJOUTS DE FORFAITS/BAPTEMES/FORMATIONS  -->

    <section id="ajout-bapteme" class="position-fixed bg-white py-4 w-50 rounded-4">
        <h1 class="font-avion text-center">Ajouter un baptême de l'air</h1>
        <form method="post" action="" id="form-ajout-bapteme" class="text-blue w-50 mx-auto mt-5">
            <span class="d-flex flex-row">
                <input type="file" name="image" class="ms-4 mb-0">
            </span>
            <span class="d-flex flex-row mt-3">
                <label for="titre">Titre : </label>
                <input type="text" name="titre" class="ms-4 mb-0">
            </span>
            <span class="d-flex flex-row justify-content-start mt-3">
                <label for="formule">Formule :</label>
                <div class="ms-3 mb-0">
                    <label for="solo">Solo</label>
                    <input type="radio" name="formule" id="solo" checked>
                    <label for="duo" class="ms-2 mb-0">Duo</label>
                    <input type="radio" name="formule" id="duo">
                </div>
            </span>
            <span class="d-flex flex-row mt-3">
                <label for="temps">Temps :</label>
                <input type="number" name="temps" class="ms-4 mb-0">
            </span>
            <span class="d-flex flex-row mt-3">
                <label for="prix">Prix :</label>
                <input type="number" name="prix" class="ms-4 mb-0">
            </span>
            <span class="d-flex flex-row justify-content-around mt-5">
                <p onclick="annAjoutBapt()" class="annul_buton bg-white rounded-3 py-1 px-2 mb-0 text-blue fs-5">Annuler
                </p>
                <input type="submit" value="Modifier" class="suppr_buton bg-custom text-white rounded-3 py-1 px-2 fs-5">
            </span>
        </form>
    </section>

    <section id="ajout-formation" class="position-fixed  bg-white py-4 w-50 rounded-4">
        <h1 class="font-avion text-center">Ajouter une formation</h1>
        <form method="post" action="" id="form-ajout-formation" class="text-blue w-75 mx-auto mt-5">
            <span class="d-flex flex-row mt-3">
                <label for="titre">Titre : </label>
                <input type="text" name="titre" class="ms-4 mb-0">
            </span>
            <div>
                <div class="d-flex flex-row mt-3">
                    <label for="temps">Détails :</label>
                    <p class="ms-4 mb-0 cursor text-decoration-underline"
                        onclick="ajouterInfo('ajout-info-formation','input-ajout-formation')">Ajouter Info</p>
                    <p class="ms-4 mb-0 cursor text-decoration-underline"
                        onclick="supprInfo('ajout-info-formation','input-ajout-formation')">Supprimer Info</p>
                </div>
                <span id='ajout-info-formation' class="d-flex flex-column mt-3">
                    <input type="text" name="titre" class="ms-4 w-75 mb-0 input-ajout-formation">
                </span>
            </div>
            <span class="d-flex flex-row mt-3">
                <label for="prix">Prix :</label>
                <input type="number" name="prix" class="ms-4 mb-0">
            </span>
            <span class="d-flex flex-row justify-content-around mt-5">
                <p onclick="annAjoutForm()" class="annul_buton bg-white rounded-3 py-1 px-2 mb-0 text-blue fs-5">Annuler
                </p>
                <input type="submit" value="Modifier" class="suppr_buton bg-custom text-white rounded-3 py-1 px-2 fs-5">
            </span>
        </form>
    </section>

    <section id="ajout-forfait" class="position-fixed  bg-white py-4 w-50 rounded-4">
        <h1 class="font-avion text-center">Ajouter un forfait</h1>
        <form method="post" action="" id="form-ajout-forfait" class="text-blue w-75 mx-auto mt-5">
            <span class="d-flex flex-row mt-3">
                <label for="titre">Titre : </label>
                <input type="text" name="titre" class="ms-4 mb-0">
            </span>
            <div>
                <div class="d-flex flex-row mt-3">
                    <label for="temps">Détails :</label>
                    <p class="ms-4 mb-0 cursor text-decoration-underline"
                        onclick="ajouterInfo('ajout-info-forfait','input-ajout-forfait')">Ajouter Info</p>
                    <p class="ms-4 mb-0 cursor text-decoration-underline"
                        onclick="supprInfo('ajout-info-forfait','input-ajout-forfait')">Supprimer Info</p>
                </div>
                <span id='ajout-info-forfait' class="d-flex flex-column mt-3">
                    <input type="text" name="titre" class="ms-4 w-75 mb-0 input-ajout-forfait">
                </span>
            </div>
            <span class="d-flex flex-row mt-3">
                <label for="prix">Prix :</label>
                <input type="number" name="prix" class="ms-4 mb-0">
            </span>
            <span class="d-flex flex-row justify-content-around mt-5">
                <p onclick="annAjoutForfait()" class="annul_buton bg-white rounded-3 py-1 px-2 mb-0 text-blue fs-5">
                    Annuler</p>
                <input type="submit" value="Modifier" class="suppr_buton bg-custom text-white rounded-3 py-1 px-2 fs-5">
            </span>
        </form>
    </section>

    <div id="confirmBapt" class="rounded-4 bg-white">
        <div class="d-flex justify-content-around align-items-center flex-column h-100">
            <p class="text-blue text-center px-2">Voulez-vous supprimer cette information ? Cette action ne peut
                pas être annulée.</p>
            <div class="d-flex flex-row justify-content-around align-items-center w-100">
                <p id="button_annul" onclick="annulSupp()" class="px-2 py-1 rounded-3 bg-white">Annuler</p>
                <p id="button_suppr" onclick="confirmSuppBapt(this.value)" value=""
                    class="px-2 py-1 rounded-3 text-white">Supprimer</p>
            </div>
        </div>
    </div>
    <div id="confirmForm" class="rounded-4 bg-white">
        <div class="d-flex justify-content-around align-items-center flex-column h-100">
            <p class="text-blue text-center px-2">Voulez-vous supprimer cette information ? Cette action ne peut
                pas être annulée.</p>
            <div class="d-flex flex-row justify-content-around align-items-center w-100">
                <p id="button_annul" onclick="annulSupp()" class="px-2 py-1 rounded-3 bg-white">Annuler</p>
                <p id="button_suppr" onclick="confirmSuppForm(this.value)" value=""
                    class="px-2 py-1 rounded-3 text-white">Supprimer</p>
            </div>
        </div>
    </div>
    <div id="confirmForfait" class="rounded-4 bg-white">
        <div class="d-flex justify-content-around align-items-center flex-column h-100">
            <p class="text-blue text-center px-2">Voulez-vous supprimer cette information ? Cette action ne peut
                pas être annulée.</p>
            <div class="d-flex flex-row justify-content-around align-items-center w-100">
                <p id="button_annul" onclick="annulSupp()" class="px-2 py-1 rounded-3 bg-white">Annuler</p>
                <p id="button_suppr" onclick="confirmSuppForfait(this.value)" value=""
                    class="px-2 py-1 rounded-3 text-white">Supprimer</p>
            </div>
        </div>
    </div>
    <section id="overlay"></section>
    <script src="node_modules/jquery/dist/jquery.js?time=<?php echo UID(200) ?>"></script>
    <script src="js/offre.js?time=<?php echo UID(200) ?>"></script>
</body>

</html>