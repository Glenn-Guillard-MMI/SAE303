  <!--

  Copyright by Thomas Henry, Valentin Lamour, Jérôme Fabre et Glenn Guillard.
  Tous droits réservés sur le site par ces membres.

-->

  <!DOCTYPE html>
  <html lang=fr">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/gestion_reservation.css?time=<?php require 'UID.php';
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
                                      <a class="text-blue bg-white text-decoration-none py-1 px-2 rounded-3 exclu" href="">Gestion des
                                          réservations</a>
                                      <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_analytique.php">Analytiques</a>
                                      <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_DemandeLicence.php">Demande
                                          de licence</a>
                                      <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_Gestion_avions.php">Avions</a>
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
              <h1 class="mt-3">Gestion des réservations</h1>
              <article class="d-flex flex-row">
                  <p onclick="affAttente()" id="attente-button" class="rounded-3 px-2 fs-4 me-4">En attente</p>
                  <p onclick="affValid()" id="valid-button" class="rounded-3 px-2 fs-4">Acceptées/Refusées</p>
              </article>


              <?php

                //Vérification si quelq'un est connecter
                if (!isset($_SESSION['mail'])) {
                    header("Location: php_connexion.php");
                }

                require_once "poo_repository.php";
                require_once "poo_models.php";

                //Vérification si la personne est admin
                try {
                    $mail = "'" . $_SESSION['mail'] . "'";
                    $modele = new Model("adherant");
                    $exemple1 = new Repository($modele->getTable());
                    $sql = "Select autorisation from " . $modele->getTable() . " where mail = $mail  ";
                    $resultat = $exemple1->requete($sql);

                    foreach ($resultat as $ligne) {
                        if ($ligne["autorisation"] != 3) {
                            header("Location: php_connexion.php");
                        }
                    }
                } catch (PDOException $e) {
                    die($e->getMessage());
                }

                ?>
              <div id="bapteme-attente">
                  <p class="fs-4">Liste d'attente pour les baptêmes de l'air</p>
                  <table>
                      <thead class="">
                          <tr class="text-white">
                              <th>Id</th>
                              <th>Nom et Prénom</th>
                              <th>Type d'ULM</th>
                              <th>pilote</th>
                              <th>Date</th>
                              <th>Temps de prestation</th>
                              <th>Plus d'action</th>
                          </tr>
                      </thead>
                      <tbody>

                          <?php

                            try {

                                $modele2 = new Model("reservation");
                                $exemple2 = new Repository($modele2->getTable());
                                $sql2 = "Select * from " . $modele2->getTable() . " where validation = 0 or matricule = '' or pilote = ''  ";
                                $resultat2 = $exemple2->requete($sql2);

                                foreach ($resultat2 as $ligne2) {
                            ?>

                                  <tr>
                                      <th><?= $ligne2["num_res"] ?></th>
                                      <th>

                                          <?php
                                            try {
                                                $mailadherant = "'" . $ligne2["mail"] . "'";
                                                $modele3 = new Model("adherant");
                                                $exemple3 = new Repository($modele3->getTable());
                                                $sql3 = "Select * from " . $modele3->getTable() . " where mail = $mailadherant";
                                                $resultat3 = $exemple3->requete($sql3);

                                                foreach ($resultat3 as $ligne3) {
                                                    echo $ligne3["nom"] . " " . $ligne3["prenom"];
                                                }
                                            } catch (PDOException $e) {
                                                die($e->getMessage());
                                            }
                                            ?>
                                      </th>
                                      <th>
                                          <select onchange="SelectionBaptemeMatricule(<?= $ligne2['num_res'] ?>)" id='Selection_matricule_bapteme_<?= $ligne2['num_res'] ?>'>
                                              <option value="" selected disabled>
                                                  Matricule</option>
                                              <?php try {
                                                    $modele4 = new Model("avion");
                                                    $exemple4 = new Repository($modele4->getTable());
                                                    $sql4 = "Select * from " . $modele4->getTable();
                                                    $resultat4 = $exemple4->requete($sql4);

                                                    foreach ($resultat4 as $ligne4) {
                                                        $matricule = $ligne4["matricule"];
                                                ?>

                                                      <option value="<?= $matricule ?>" <?php if ($ligne2["matricule"] == $matricule) {
                                                                                            echo "selected";
                                                                                        } ?>>
                                                          <?= $matricule ?>
                                                      </option>

                                              <?php
                                                    }
                                                } catch (PDOException $e) {
                                                    die($e->getMessage());
                                                }
                                                ?>
                                          </select>
                                      </th>
                                      <th>
                                          <select onchange="SelectionBaptemePilote(<?= $ligne2['num_res'] ?>)" id='Selection_pilote_bapteme_<?= $ligne2['num_res'] ?>'>
                                              <option value="" selected disabled>Pilote</option>
                                              <?php try {
                                                    $modele5 = new Model("adherant");
                                                    $exemple5 = new Repository($modele5->getTable());
                                                    $sql5 = "Select * from " . $modele5->getTable() . " where autorisation = 1";
                                                    $resultat5 = $exemple5->requete($sql5);

                                                    foreach ($resultat5 as $ligne5) {
                                                        $id = $ligne5["mail"];
                                                ?>

                                                      <option value="<?= $id ?>" <?php if ($ligne2["pilote"] == $id) {
                                                                                        echo "selected";
                                                                                    } ?>>
                                                          <?= $ligne5["nom"] . " " . $ligne5["prenom"] ?></option>

                                              <?php
                                                    }
                                                } catch (PDOException $e) {
                                                    die($e->getMessage());
                                                }
                                                ?>
                                          </select>
                                      </th>
                                      <th>
                                          <?= $ligne2["date_j"] . " à " . $ligne2["date_h"] ?>
                                      </th>
                                      <th>
                                          <?= $ligne2["temps_presta"] . " min" ?>
                                      </th>

                                      <th>

                                          <span class="d-flex flex-row align-items-center justify-content-around">
                                              <p class="p-2 icon-shadow rounded-3 mb-0 icon_confirm" onclick="AccepterBaptemePilote(<?= $ligne2['num_res'] ?>)">
                                                  <i class="fas fa-check text-success px-1"></i>
                                              </p>
                                              <p class="p-2 icon-shadow rounded-3 mb-0 icon_confirm" onclick="RefuserBaptemePilote(<?= $ligne2['num_res'] ?>)">
                                                  <i class="fas fa-times text-danger px-1"></i>
                                              </p>
                                          </span>
                                      </th>
                                  </tr>


                              <?php


                                }
                                ?>

                      </tbody>
                  </table>
              </div>




          <?php
                            } catch (PDOException $e) {
                                die($e->getMessage());
                            }


            ?>
          <article class="d-flex flex-row mt-4">
              <div id="formation-attente" class="w-50">
                  <p class="fs-4">Liste d'attente pour les formations</p>
                  <table>
                      <thead class="">
                          <tr class="text-white">
                              <th>Id</th>
                              <th>Nom et Prénom</th>
                              <th>Type</th>
                              <th>Plus d'action</th>
                          </tr>
                      </thead>
                      <tbody>

                          <?php

                            try {

                                $modele2 = new Model("r_formation");
                                $exemple2 = new Repository($modele2->getTable());
                                $sql2 = "Select * from " . $modele2->getTable() . " where validation = 0 ";
                                $resultat2 = $exemple2->requete($sql2);

                                foreach ($resultat2 as $ligne2) {
                            ?>

                                  <tr>
                                      <th><?= $ligne2["num_res"] ?></th>
                                      <th>

                                          <?php
                                            try {
                                                $mailadherant = "'" . $ligne2["mail"] . "'";
                                                $modele3 = new Model("adherant");
                                                $exemple3 = new Repository($modele3->getTable());
                                                $sql3 = "Select * from " . $modele3->getTable() . " where mail = $mailadherant";
                                                $resultat3 = $exemple3->requete($sql3);

                                                foreach ($resultat3 as $ligne3) {
                                                    echo $ligne3["nom"] . " " . $ligne3["prenom"];
                                                }
                                            } catch (PDOException $e) {
                                                die($e->getMessage());
                                            }
                                            ?>
                                      </th>
                                      <th>


                                          <?php try {
                                                $type = $ligne2["id"];
                                                $modele3 = new Model("formation");
                                                $exemple3 = new Repository($modele3->getTable());
                                                $sql3 = "Select * from " . $modele3->getTable() . " where id = $type";
                                                $resultat3 = $exemple3->requete($sql3);

                                                foreach ($resultat3 as $ligne3) {
                                                    echo $ligne3["nom"];
                                                }
                                            } catch (PDOException $e) {
                                                die($e->getMessage());
                                            }
                                            ?>

                                      </th>


                                      <th>

                                          <span class="d-flex flex-row align-items-center justify-content-around">
                                              <p class="p-2 icon-shadow rounded-3 mb-0 icon_confirm" onclick="AccepterFormation(<?= $ligne2['num_res'] ?>)">
                                                  <i class="fas fa-check text-success px-1"></i>
                                              </p>
                                              <p class="p-2 icon-shadow rounded-3 mb-0 icon_confirm" onclick="RefuserFormation(<?= $ligne2['num_res'] ?>)">
                                                  <i class="fas fa-times text-danger px-1"></i>
                                              </p>
                                          </span>
                                      </th>
                                  </tr>


                              <?php


                                }
                                ?>

                      </tbody>
                  </table>
              </div>




          <?php
                            } catch (PDOException $e) {
                                die($e->getMessage());
                            }


            ?>
          <div id="forfait" class="w-50">
              <p class="fs-4">Liste d'attente pour les forfaits</p>
              <table>
                  <thead class="">
                      <tr class="text-white">
                          <th>Id</th>
                          <th>Nom et Prénom</th>
                          <th>Type</th>
                          <th>Plus d'action</th>
                      </tr>
                  </thead>
                  <tbody>

                      <?php

                        try {

                            $modele2 = new Model("r_forfait");
                            $exemple2 = new Repository($modele2->getTable());
                            $sql2 = "Select * from " . $modele2->getTable() . " where validation = 0 ";
                            $resultat2 = $exemple2->requete($sql2);

                            foreach ($resultat2 as $ligne2) {
                        ?>

                              <tr>
                                  <th><?= $ligne2["num_res"] ?></th>
                                  <th>

                                      <?php
                                        try {
                                            $mailadherant = "'" . $ligne2["mail"] . "'";
                                            $modele3 = new Model("adherant");
                                            $exemple3 = new Repository($modele3->getTable());
                                            $sql3 = "Select * from " . $modele3->getTable() . " where mail = $mailadherant";
                                            $resultat3 = $exemple3->requete($sql3);

                                            foreach ($resultat3 as $ligne3) {
                                                echo $ligne3["nom"] . " " . $ligne3["prenom"];
                                            }
                                        } catch (PDOException $e) {
                                            die($e->getMessage());
                                        }
                                        ?>
                                  </th>
                                  <th>


                                      <?php try {
                                            $type = $ligne2["id"];
                                            $modele3 = new Model("forfait");
                                            $exemple3 = new Repository($modele3->getTable());
                                            $sql3 = "Select * from " . $modele3->getTable() . " where id = $type";
                                            $resultat3 = $exemple3->requete($sql3);

                                            foreach ($resultat3 as $ligne3) {
                                                echo $ligne3["nom"];
                                            }
                                        } catch (PDOException $e) {
                                            die($e->getMessage());
                                        }
                                        ?>

                                  </th>


                                  <th>

                                      <span class="d-flex flex-row align-items-center justify-content-around">
                                          <p class="p-2 icon-shadow rounded-3 mb-0 icon_confirm" onclick="AccepterForfait(<?= $ligne2['num_res'] ?>)">
                                              <i class="fas fa-check text-success px-1"></i>
                                          </p>
                                          <p class="p-2 icon-shadow rounded-3 mb-0 icon_confirm" onclick="RefuserForfait(<?= $ligne2['num_res'] ?>)">
                                              <i class="fas fa-times text-danger px-1"></i>
                                          </p>
                                      </span>
                                  </th>
                              </tr>


                          <?php


                            }
                            ?>

                  </tbody>
              </table>
          </div>
          </article>




      <?php
                        } catch (PDOException $e) {
                            die($e->getMessage());
                        }


        ?>




      <div id="bapteme-valid">
          <p class="fs-4">Liste de réservation pour les baptêmes de l'air</p>
          <table>
              <thead class="">
                  <tr class="text-white">
                      <th>Id</th>
                      <th>Nom et Prénom</th>
                      <th>Type d'ULM</th>
                      <th>pilote</th>
                      <th>Date</th>
                      <th>Temps de prestation</th>
                      <th>État</th>
                  </tr>
              </thead>
              <tbody>

                  <?php

                    try {

                        $modele2 = new Model("reservation");
                        $exemple2 = new Repository($modele2->getTable());
                        $sql2 = "Select * from " . $modele2->getTable() . " where validation != 0 and matricule != '' and pilote != ''  ";
                        $resultat2 = $exemple2->requete($sql2);

                        foreach ($resultat2 as $ligne2) {
                    ?>

                          <tr>
                              <th><?= $ligne2["num_res"] ?></th>
                              <th>

                                  <?php
                                    try {
                                        $mailadherant = "'" . $ligne2["mail"] . "'";
                                        $modele3 = new Model("adherant");
                                        $exemple3 = new Repository($modele3->getTable());
                                        $sql3 = "Select * from " . $modele3->getTable() . " where mail = $mailadherant";
                                        $resultat3 = $exemple3->requete($sql3);

                                        foreach ($resultat3 as $ligne3) {
                                            echo $ligne3["nom"] . " " . $ligne3["prenom"];
                                        }
                                    } catch (PDOException $e) {
                                        die($e->getMessage());
                                    }
                                    ?>
                              </th>
                              <th>
                                  <?= $ligne2["temps_presta"] ?>

                              </th>
                              <th>

                                  <?php

                                    $mailPilote = "'" . $ligne2["pilote"] . "'";

                                    try {
                                        $modele5 = new Model("adherant");
                                        $exemple5 = new Repository($modele5->getTable());
                                        $sql5 = "Select * from " . $modele5->getTable() . " where mail = $mailPilote";
                                        $resultat5 = $exemple5->requete($sql5);

                                        foreach ($resultat5 as $ligne5) {
                                            echo $ligne5["nom"] . " " . $ligne5["prenom"];
                                        }
                                    } catch (PDOException $e) {
                                        die($e->getMessage());
                                    }
                                    ?>

                              </th>
                              <th>
                                  <?= $ligne2["date_j"] . " à " . $ligne2["date_h"] ?>
                              </th>
                              <th>
                                  <?= $ligne2["temps_presta"] ?>
                              </th>

                              <th>
                                  <?php if ($ligne2["validation"] == 1) {
                                        echo "<span class='d-flex flex-row justify-content-start align-items-center ms-3 mb-0 text-success w-custom px-3 py-1 rounded-4 statu-shadow'>";
                                        echo "<i class='fas fa-circle me-2 mb-0'></i>";
                                        echo "<p class='m-0'> Acceptée </p>";
                                    } ?><?php if ($ligne2["validation"] == 2) {
                                            echo "<span class='d-flex flex-row justify-content-start align-items-center ms-3 mb-0 text-danger w-custom px-3 py-1 rounded-4 statu-shadow'>";
                                            echo "<i class='fas fa-circle me-2 mb-0'></i>";
                                            echo "<p class='m-0'>Refusée</p>";
                                        } ?>
                                  </span>
                              </th>
                          </tr>


                      <?php


                        }
                        ?>

              </tbody>
          </table>
      </div>



  <?php
                    } catch (PDOException $e) {
                        die($e->getMessage());
                    }


    ?>
  <div id="forfait_form_valid" class="mt-4">
      <p class="fs-4">Liste de réservation pour les forfaits et les formations</p>
      <table>
          <thead class="">
              <tr class="text-white">
                  <th>Id</th>
                  <th>Nom et Prénom</th>
                  <th>Type</th>
                  <th>Etat</th>
              </tr>
          </thead>
          <tbody>

              <?php

                try {

                    $modele2 = new Model("r_forfait");
                    $exemple2 = new Repository($modele2->getTable());
                    $sql2 = "Select * from " . $modele2->getTable() . " where validation != 0 ";
                    $resultat2 = $exemple2->requete($sql2);

                    foreach ($resultat2 as $ligne2) {
                ?>

                      <tr>
                          <th><?= $ligne2["num_res"] ?></th>
                          <th>

                              <?php
                                try {
                                    $mailadherant = "'" . $ligne2["mail"] . "'";
                                    $modele3 = new Model("adherant");
                                    $exemple3 = new Repository($modele3->getTable());
                                    $sql3 = "Select * from " . $modele3->getTable() . " where mail = $mailadherant";
                                    $resultat3 = $exemple3->requete($sql3);

                                    foreach ($resultat3 as $ligne3) {
                                        echo $ligne3["nom"] . " " . $ligne3["prenom"];
                                    }
                                } catch (PDOException $e) {
                                    die($e->getMessage());
                                }
                                ?>
                          </th>
                          <th>


                              <?php try {
                                    $type = $ligne2["id"];
                                    $modele3 = new Model("forfait");
                                    $exemple3 = new Repository($modele3->getTable());
                                    $sql3 = "Select * from " . $modele3->getTable() . " where id = $type";
                                    $resultat3 = $exemple3->requete($sql3);

                                    foreach ($resultat3 as $ligne3) {
                                        echo $ligne3["nom"];
                                    }
                                } catch (PDOException $e) {
                                    die($e->getMessage());
                                }
                                ?>

                          </th>


                          <th>

                              <?php if ($ligne2["validation"] == 1) {
                                    echo "<span class='d-flex flex-row justify-content-start align-items-center ms-3 mb-0 text-success w-custom px-3 py-1 rounded-4 statu-shadow'>";
                                    echo "<i class='fas fa-circle me-2 mb-0'></i>";
                                    echo "<p class='m-0'> Acceptée </p>";
                                } ?><?php if ($ligne2["validation"] == 2) {
                                        echo "<span class='d-flex flex-row justify-content-start align-items-center ms-3 mb-0 text-danger w-custom px-3 py-1 rounded-4 statu-shadow'>";
                                        echo "<i class='fas fa-circle me-2 mb-0'></i>";
                                        echo "<p class='m-0'>Refusée</p>";
                                    } ?>
                              </span>
                              </span>
                          </th>
                      </tr>


                  <?php


                    }
                    ?>
                  <?php

                    try {

                        $modele2 = new Model("r_formation");
                        $exemple2 = new Repository($modele2->getTable());
                        $sql2 = "Select * from " . $modele2->getTable() . " where validation != 0 ";
                        $resultat2 = $exemple2->requete($sql2);

                        foreach ($resultat2 as $ligne2) {
                    ?>

                          <tr>
                              <th><?= $ligne2["num_res"] ?></th>
                              <th>

                                  <?php
                                    try {
                                        $mailadherant = "'" . $ligne2["mail"] . "'";
                                        $modele3 = new Model("adherant");
                                        $exemple3 = new Repository($modele3->getTable());
                                        $sql3 = "Select * from " . $modele3->getTable() . " where mail = $mailadherant";
                                        $resultat3 = $exemple3->requete($sql3);

                                        foreach ($resultat3 as $ligne3) {
                                            echo $ligne3["nom"] . " " . $ligne3["prenom"];
                                        }
                                    } catch (PDOException $e) {
                                        die($e->getMessage());
                                    }
                                    ?>
                              </th>
                              <th>


                                  <?php try {
                                        $type = $ligne2["id"];
                                        $modele3 = new Model("formation");
                                        $exemple3 = new Repository($modele3->getTable());
                                        $sql3 = "Select * from " . $modele3->getTable() . " where id = $type";
                                        $resultat4 = $exemple3->requete($sql3);

                                        foreach ($resultat4 as $ligne4) {
                                            echo $ligne4["nom"];
                                        }
                                    } catch (PDOException $e) {
                                        die($e->getMessage());
                                    }
                                    ?>

                              </th>


                              <th>

                                  <?php if ($ligne2["validation"] == 1) {
                                        echo "<span class='d-flex flex-row justify-content-start align-items-center ms-3 mb-0 text-success w-custom px-3 py-1 rounded-4 statu-shadow'>";
                                        echo "<i class='fas fa-circle me-2 mb-0'></i>";
                                        echo "<p class='m-0'> Acceptée </p>";
                                    } ?><?php if ($ligne2["validation"] == 2) {
                                            echo "<span class='d-flex flex-row justify-content-start align-items-center ms-3 mb-0 text-danger w-custom px-3 py-1 rounded-4 statu-shadow'>";
                                            echo "<i class='fas fa-circle me-2 mb-0'></i>";
                                            echo "<p class='m-0'>Refusée</p>";
                                        } ?>
                                  </span>

                              </th>
                          </tr>


                      <?php


                        }
                        ?>
          </tbody>
      </table>
  </div>

          </section>




  <?php
                    } catch (PDOException $e) {
                        die($e->getMessage());
                    }
                } catch (PDOException $e) {
                    die($e->getMessage());
                }


    ?>

      </div>

      <script src="node_modules/jquery/dist/jquery.js?time=<?php
                                                            echo UID(200) ?>"></script>
      <script src="js/GestionReservation.js?time=<?php
                                                    echo UID(200) ?>"></script>

  </body>

  </html>