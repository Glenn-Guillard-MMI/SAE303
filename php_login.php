<!--

  Copyright by Thomas Henry, Valentin Lamour, Jérôme Fabre et Glenn Guillard.
  Tous droits réservés sur le site par ces membres.

-->

<!DOCTYPE html>
<html lang=fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profil.css?time=<?php require 'UID.php';
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

<body class="font-normal text-white">
    <div class="d-flex flex-row w-100 h-100">
        <section class="w-25 h-100 position-fixed start-0">
            <nav
                class="text-center bg-custom text-white d-flex justify-content-around flex-column align-items-center font-avion">
                <img class="w-50 logo-shadow" src="img/SVG/logo.svg" alt="logo aero club">
                <a class="text-blue bg-white text-decoration-none py-1 px-2 rounded-3 exclu"
                    href="php_login.php">Accueil</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3"
                    href="php_gestionnaireUtilisateur.php">Gestion des utilisateurs</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Gestion des réservations</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_analytique.php">Analytiques</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Demande de licence</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_Gestion_avions.php">Avions</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Offres</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Liste équipe</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Événement</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Galerie</a>
            </nav>
        </section>
        <section class="w-75 ml-custom d-flex flex-row mt-3 justify-content-between mb-5">
            <article class="width-custom-article">
                <div class="bg-custom-2 p-4 rounded-4">
                    <h2 class="font-avion text-center mb-5">Profil</h2>
                    <?php
                    session_start();
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
                                    echo "<div class='d-flex flex-row'>";
                                    echo "<div class='w-50'>";

                                    echo "<div class='mb-5'>";
                                    echo "<h5>Informations personnelles</h5>";
                                    echo "<div class='ms-4'";
                                    echo "<p> Nom : " . $ligne["nom"] . "</p>";
                                    echo "<p> Prénom : " . $ligne["prenom"] . "</p>";
                                    echo "<p> Date de naissance : " . $ligne["date_naissance"] . "</p>";
                                    echo "</div>";
                                    echo "</div>";

                                    echo "<div class=''>";
                                    echo "<h5>Coordonnées</h5>";
                                    echo "<div class='ms-4'>";
                                    echo "<p>  Adresse : " . $ligne["adresse"] . "</p>";
                                    echo "<p>  Code postale : " . $ligne["code_postale"] . "</p>";
                                    echo "<p>  Ville : " . $ligne["ville"] . "</p>";
                                    echo "<p>  E-mail : " . $ligne["mail"] . "</p>";
                                    echo "<p>  Téléphone : " . $ligne["num_tel"] . "</p>";
                                    echo "</div>";
                                    echo "</div>";

                                    echo "</div>";

                                    echo "<div class='w-50 d-flex flex-column align-items-end fs-5'>";
                                    if ($ligne["autorisation"] == 1) {
                                        echo "<p>  Status : Pilote</p>";
                                    } elseif ($ligne["autorisation"] == 2) {
                                        echo "<p>  Status : Staff</p>";
                                    } elseif ($ligne["autorisation"] == 3) {
                                        echo "<p>  Status : Admin</p>";
                                    } elseif ($ligne["autorisation"] == 0) {
                                        echo "<p>  Status : adhérant</p>";
                                    }

                                    if ($ligne["licence_valid"] == 0) {
                                        echo "<p>  Licence : Non remise</p>";
                                    } elseif ($ligne["licence_valid"] == 1) {
                                        echo "<p> Licence : Reçu</p>";
                                    } elseif ($ligne["licence_valid"] == 2) {
                                        echo "<p> Licence : Accepté</p>";
                                    }elseif ($ligne["licence_valid"] == 3) {
                                        echo "<p> Licence : Refusée</p>";
                                    }
                                    $sauvegarde = $ligne["autorisation"];
                                    echo "</div></div>";
                    ?>
                    <div class="d-flex flex-row justify-content-around mt-4 align-items-center">
                        <?php if($ligne["autorisation"] == 0 and ( $ligne["licence_valid"] == 0 or $ligne["licence_valid"] == 3)) { 
                                        ?><div id="disparition">

                            <label for="licence">Teste</label>
                            <input type="file" id="licence" style="display:none" name="licence" accept="application/pdf"
                                onchange="pushlicence()" />
                        </div><?php
                                        } ?>

                        <p onclick="modifCompte()" class="fs-4 mb-0 text-white rounded-4 bouton_modif px-2 py-1">
                            Modifier</p>
                        <a href="_deconnexion.php"
                            class="buton_deco rounded-4 text-decoration-none text-white text-center py-1 px-2 fs-4">Déconnexion</a>



                    </div>
                </div>
                <div class="bg-custom-2 mt-4 p-4 rounded-4">
                    <h2>Sécurité</h2>
                    <div class="d-flex flex-row justify-content-around mt-4">
                        <p>Mot de passe : ***************</p>
                        <p onclick="modifMdp()" class="fs-5 lien mdp_modif">Modifier</p>
                    </div>
                </div>
            </article>
            <form id="modif_compte" class="position-absolute bg-white text-blue w-50 p-4 rounded-4"
                action="_modification_compte.php" method="post">
                <h2 class="font-avion text-center mb-5 text-blue">Profil</h2>
                <article class="d-flex flex-row mb-5">
                    <div>
                        <div>
                            <h5>Informations personnelles</h5>
                            <div class="d-flex align-items-start flex-column">
                                <span class="d-flex flex-row justify-content-center align-items-center">
                                    <p class="mb-0 me-4">Nom : </p>
                                    <input name="nom" class="input_modif rounded-3" type="text"
                                        value="<?php echo $ligne["nom"]; ?>">
                                </span>
                                <span class="d-flex flex-row justify-content-center align-items-center mt-2">
                                    <p class="mb-0 me-4">Prénom : </p>
                                    <input name="prenom" class="input_modif rounded-3" type="text"
                                        value="<?php echo $ligne["prenom"]; ?>">
                                </span>
                                <span class="d-flex flex-row mt-2">
                                    <p class="mb-0 me-4">Nom : </p>
                                    <p><?php echo $ligne["date_naissance"]; ?>
                                    <p>
                                </span>
                            </div>
                        </div>
                        <div>
                            <h5>Coordonnées</h5>
                            <div>
                                <span class="d-flex flex-row justify-content-center align-items-center">
                                    <p class="mb-0 me-4">Adresse : </p>
                                    <input name="physique_addresse" class="input_modif rounded-3" type="text"
                                        value="<?php echo $ligne["adresse"]; ?>">
                                </span>
                                <span class="d-flex flex-row justify-content-center align-items-center mt-2">
                                    <p class="mb-0 me-4">Code postale : </p>
                                    <input name="code_addresse" class="input_modif rounded-3" type="text"
                                        value="<?php echo $ligne["code_postale"]; ?>">
                                </span>
                                <span class="d-flex flex-row justify-content-center align-items-center mt-2">
                                    <p class="mb-0 me-4">Ville : </p>
                                    <input name="ville" class="input_modif rounded-3" type="text"
                                        value="<?php echo $ligne["ville"]; ?>">
                                </span>
                                <span class="d-flex flex-row justify-content-center align-items-center mt-2">
                                    <p class="mb-0 me-4">E-mail : </p>
                                    <input name="email" class="input_modif rounded-3" type="text"
                                        value="<?php echo $ligne["mail"]; ?>">
                                </span>
                                <span class="d-flex flex-row justify-content-center align-items-center mt-2">
                                    <p class="mb-0 me-4">Téléphone : </p>
                                    <input name="num" class="input_modif rounded-3" type="text"
                                        value="<?php echo str_replace(' ','',$ligne["num_tel"]); ?>">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class='w-50 d-flex flex-column align-items-end fs-5'>
                        <?php
                                    if ($ligne["autorisation"] == 1) {
                                        echo "<p>  Status : Pilote</p>";
                                    } elseif ($ligne["autorisation"] == 2) {
                                        echo "<p>  Status : Staff</p>";
                                    } elseif ($ligne["autorisation"] == 3) {
                                        echo "<p>  Status : Admin</p>";
                                    } elseif ($ligne["autorisation"] == 0) {
                                        echo "<p>  Status : adhérant</p>";
                                    }

                                    if ($ligne["licence_valid"] == 0) {
                                        echo "<p>  Licence : Non remise</p>";
                                    } elseif ($ligne["licence_valid"] == 1) {
                                        echo "<p> Licence : Reçu</p>";
                                    } elseif ($ligne["licence_valid"] == 2) {
                                        echo "<p> Licence : Accepté</p>";
                                    }elseif ($ligne["licence_valid"] == 3) {
                                        echo "<p> Licence : Refusée</p>";
                                    }
                        ?>
                    </div>
                </article>
                <p class="text-center">Après la modification de vos informations, vous serez automatiquement déconnecté.
                </p>
                <article class="d-flex flex-row align-items-center justify-content-around">
                    <p onclick="annulModif()" class="mb-0 buton_annul text-blue bg-white px-2 py-1 fs-5 rounded-3">
                        Annuler</p>
                    <input type="submit" value="Enregistrer"
                        class="buton_enregistre text-white bg-custom fs-5 rounded-3">
                </article>
            </form>
            <form id="modif_mdp" class="position-absolute bg-white text-blue px-5 py-4 rounded-4"
                action="_modificationMDP.php" method="POST">
                <h4>Sécurité</h4>
                <p>Créez un mot de passe sécurisé avec des lettres, des chiffres et des symboles.</p>
                <div>
                    <label for="password">Nouveau mot de passe :</label>
                    <input type="password" name="password" class="input_modif rounded-3">
                </div>
                <div class="mt-3">
                    <label for="confirmation">Confirmation mot de passe :</label>
                    <input type="password" name="confirmation" class="input_modif rounded-3">
                </div>
                <article class="mt-5">
                    <p>Après la modification de vos informations, vous serez automatiquement déconnecté.</p>
                    <div class="d-flex flex-row align-items-center justify-content-around">
                        <p onclick="annulMdp()" class="mb-0 buton_annul text-blue bg-white px-2 py-1 fs-5 rounded-3">
                            Annuler</p>
                        <input type="submit" value="Enregistrer"
                            class="buton_enregistre text-white bg-custom fs-5 rounded-3">
                    </div>
                </article>
            </form>
            <article class="w-25 d-flex flex-column justify-content-around mb-0 me-4 text-center">
                <?php
                                    if ($sauvegarde == 3) {
                ?>
                <div
                    class="bg-custom-3 d-flex flex-column justify-content-center align-items-center rounded-3 p-2 shadow-box-stat mb-4">
                    <p class="fs-5">Nombre de réservation</p>
                    <p class="fs-1">
                        <?php
                                        try {
                                            $modele2 = new Model("reservation");
                                            $exemple2 = new Repository($modele2->getTable());
                                            $sql2 = "Select COUNT(*) from " . $modele2->getTable() . " where validation = 0  ";
                                            $resultat2 = $exemple2->requete($sql2);

                                            foreach ($resultat2 as $ligne) { {
                                                    echo  $ligne["COUNT(*)"];
                                                }
                                            }
                                        } catch (PDOException $e) {
                                            die($e->getMessage());
                                        }
                            ?>


                    </p>
                    <p class="fs-5">En attente</p>
                </div>
                <div
                    class="bg-custom-3 d-flex flex-column justify-content-center align-items-center rounded-3 p-2 shadow-box-stat mb-4">
                    <p class="fs-5">Demande de licence</p>
                    <p class="fs-1">
                        <?php
                                        try {
                                            $sql3 = "Select COUNT(*) from " . $modele->getTable() . " where licence = 0  ";
                                            $resultat3 = $exemple1->requete($sql3);

                                            foreach ($resultat3 as $ligne) { {
                                                    echo $ligne["COUNT(*)"];
                                                }
                                            }
                                        } catch (PDOException $e) {
                                            die($e->getMessage());
                                        }


                            ?>
                    </p>
                    <p class="fs-5">En attente</p>
                </div>
                <div
                    class="bg-custom-3 d-flex flex-column justify-content-center align-items-center rounded-3 p-2 shadow-box-stat mb-4">
                    <p class="fs-5">Nombre de réservation</p>
                    <p class="fs-1">
                        <?php

                                        $date = "'" . date("Y-m") . "%'";
                                        try {
                                            $sql4 = "Select COUNT(*) from " . $modele2->getTable() . " WHERE date_crea like $date";
                                            $resultat4 = $exemple2->requete($sql4);

                                            foreach ($resultat4 as $ligne) { {
                                                    echo $ligne["COUNT(*)"];
                                                }
                                            }
                                        } catch (PDOException $e) {
                                            die($e->getMessage());
                                        }


                            ?>
                    </p>
                    <p class="fs-5">Ce mois ci</p>
                </div>
                <div
                    class="bg-custom-3 d-flex flex-column justify-content-center align-items-center rounded-3 p-2 shadow-box-stat">

                    <p class="fs-5">Moyenne avis</p>
                    <p class="fs-1">
                        <?php
                                        try {
                                            $modele3 = new Model("avis");
                                            $exemple3 = new Repository($modele3->getTable());
                                            $sql5 = "Select AVG(note) from " . $modele3->getTable();
                                            $resultat5 = $exemple3->requete($sql5);

                                            foreach ($resultat5 as $ligne) { {
                                                    echo  $ligne["AVG(note)"];
                                                }
                                            }
                                        } catch (PDOException $e) {
                                            die($e->getMessage());
                                        }

                            ?>


                    </p>
                </div>
                <?php
                                    }
                ?>

                <?php
                                    if ($sauvegarde == 2) {
                ?>
                <div
                    class="bg-custom-3 d-flex flex-column justify-content-center align-items-center rounded-3 p-2 shadow-box-stat">
                    <p>Nombre d'adhérant</p>
                    <p>
                        <?php
                                        try {

                                            $sql2 = "Select COUNT(*) from " . $modele->getTable();
                                            $resultat6 = $exemple1->requete($sql2);

                                            foreach ($resultat6 as $ligne) { {
                                                    echo  $ligne["COUNT(*)"];
                                                }
                                            }
                                        } catch (PDOException $e) {
                                            die($e->getMessage());
                                        }
                            ?>


                    </p>
                </div>
                <div
                    class="bg-custom-3 d-flex flex-column justify-content-center align-items-center rounded-3 p-2 shadow-box-stat">

                    <p>Nombre de réservation</p>
                    <p>
                        <?php
                                        $date = "'" . date("Y-m") . "%'";
                                        try {
                                            $modele2 = new Model("reservation");
                                            $exemple2 = new Repository($modele2->getTable());
                                            $sql4 = "Select COUNT(*) from " . $modele2->getTable() . " WHERE date_crea like $date";
                                            $resultat4 = $exemple2->requete($sql4);

                                            foreach ($resultat4 as $ligne) { {
                                                    echo $ligne["COUNT(*)"];
                                                }
                                            }
                                        } catch (PDOException $e) {
                                            die($e->getMessage());
                                        }
                            ?>


                    </p>
                    <p>Ce mois ci</p>
                </div>
                <div
                    class="bg-custom-3 d-flex flex-column justify-content-center align-items-center rounded-3 p-2 shadow-box-stat">
                    <p>Moyenne avis</p>
                    <p>
                        <?php
                                        try {
                                            $modele3 = new Model("avis");
                                            $exemple3 = new Repository($modele3->getTable());
                                            $sql5 = "Select AVG(note) from " . $modele3->getTable();
                                            $resultat5 = $exemple3->requete($sql5);

                                            foreach ($resultat5 as $ligne) { {
                                                    echo  $ligne["AVG(note)"];
                                                }
                                            }
                                        } catch (PDOException $e) {
                                            die($e->getMessage());
                                        }
                            ?>


                    </p>
                </div>
                <div
                    class="bg-custom-3 d-flex flex-column justify-content-center align-items-center rounded-3 p-2 shadow-box-stat">
                    <p>Nombre de vue du site</p>
                    <p>
                        <?php

                                        try {
                                            $modele4 = new Model("vu");
                                            $exemple7 = new Repository($modele2->getTable());
                                            $sql7 = "Select COUNT(*) from " . $modele2->getTable();
                                            $resultat7 = $exemple7->requete($sql7);

                                            foreach ($resultat7 as $ligne) { {
                                                    echo $ligne["COUNT(*)"];
                                                }
                                            }
                                        } catch (PDOException $e) {
                                            die($e->getMessage());
                                        }
                            ?>


                    </p>
                    <p>Ce mois ci</p>
                </div>



                <?php
                                    }
                ?>



                <?php
                                    if ($sauvegarde == 1) {
                ?>
                <div
                    class="bg-custom-3 d-flex flex-column justify-content-center align-items-center rounded-3 p-2 shadow-box-stat">
                    <p>Nombre de vol</p>
                    <p>
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
                <div
                    class="bg-custom-3 d-flex flex-column justify-content-center align-items-center rounded-3 p-2 shadow-box-stat">
                    <p>Nombre d'heure de vol</p>
                    <p>
                        <?php
                                        try {
                                            $modele6 = new Model("reservation");
                                            $exemple6 = new Repository($modele6->getTable());
                                            $sql8 = "Select SUM(temps_presta) from " . $modele6->getTable() . " WHERE pilote = $mail";
                                            $resultat8 = $exemple6->requete($sql8);

                                            foreach ($resultat8 as $ligne) { {
                                                    echo  $ligne["SUM(temps_presta)"];
                                                }
                                            }
                                        } catch (PDOException $e) {
                                            die($e->getMessage());
                                        }
                            ?>


                    </p>
                    <p>Ce mois ci</p>
                </div>

                <?php
                                    }
                ?>

                <?php
                                    if ($sauvegarde == 0) {
                ?>
                <div
                    class="bg-custom-3 d-flex flex-column justify-content-center align-items-center rounded-3 p-2 shadow-box-stat">
                    <p>Nombre de vol</p>
                    <p>
                        <?php
                                        try {
                                            $modele6 = new Model("reservation");
                                            $exemple6 = new Repository($modele6->getTable());
                                            $sql8 = "Select COUNT(*) from " . $modele6->getTable() . " WHERE mail = $mail";
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
                <div
                    class="bg-custom-3 d-flex flex-column justify-content-center align-items-center rounded-3 p-2 shadow-box-stat">
                    <p>Nombre d'heure de vol</p>
                    <p>
                        <?php
                                        try {
                                            $modele6 = new Model("reservation");
                                            $exemple6 = new Repository($modele6->getTable());
                                            $sql8 = "Select SUM(temps_presta) from " . $modele6->getTable() . " WHERE mail = $mail";
                                            $resultat8 = $exemple6->requete($sql8);

                                            foreach ($resultat8 as $ligne) { {
                                                    echo  $ligne["SUM(temps_presta)"];
                                                }
                                            }
                                        } catch (PDOException $e) {
                                            die($e->getMessage());
                                        }
                            ?>


                    </p>
                </div>

                <?php
                                    }
                ?>
                <?php
                                };
                            }
                        } catch (PDOException $e) {
                            die($e->getMessage());
                        }
                    } else {
                        header("Location: php_connexion.php");
                    }

?>
            </article>
        </section>
    </div>
    <div id="overlay"></div>
    <script src="js/login.js?time=<?php echo UID(200) ?>"></script>
</body>

</html>