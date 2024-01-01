<!--

  Copyright by Thomas Henry, Valentin Lamour, Jérôme Fabre et Glenn Guillard.
  Tous droits réservés sur le site par ces membres.

-->

<!DOCTYPE html>
<html lang=fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/analytique.css?time=<?php require 'UID.php';
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

<body class="font-normal">
    <div class="d-flex flex-row w-100 h-100 mb-5">
        <section class="w-25 h-100 position-fixed start-0">
            <nav class="text-center bg-custom text-white d-flex justify-content-around flex-column align-items-center font-avion">
                <img class="w-50 logo-shadow" src="img/SVG/logo.svg" alt="logo aero club">
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_login.php">Accueil</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_gestionnaireUtilisateur.php">Gestion des utilisateurs</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Gestion des réservations</a>
                <a class="text-blue text-decoration-none py-1 px-2 rounded-3 exclu bg-white" href="php_analytique.php">Analytiques</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Demande de licence</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="php_Gestion_avions.php">Avions</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Offres</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Liste équipe</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Événement</a>
                <a class="text-white text-decoration-none py-1 px-2 rounded-3" href="">Galerie</a>
            </nav>
        </section>
        <section class="ml-custom w-75">
            <h1 class="text-blue mt-4">Analytiques</h1>
            <article class="d-flex flex-row justify-content-around mt-5">
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
                            if ($ligne["autorisation"] == 3 || $ligne["autorisation"] == 2) {



                ?>


                                <div class="bg-custom-2 rounded-3 text-white shadow-2 box-size-analysis text-center">
                                    <p class="mt-3">Nombre de réservation</p>
                                    <p class="fs-1">
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
                                    <p>ce mois ci</p>
                                </div>
                                <div class="bg-custom-2 rounded-3 text-white shadow-2 box-size-analysis text-center">
                                    <p class="mt-3">Moyenne avis</p>
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
                                <div class="bg-custom-2 rounded-3 text-white shadow-2 box-size-analysis text-center">
                                    <p class="mt-3">Nombre d'adhérant</p>
                                    <p class="fs-1">
                                        <?php

                                        try {

                                            $sql2 = "Select COUNT(*) from " . $modele->getTable() . " WHERE compte_actif = 1";
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
                                <div class="bg-custom-2 rounded-3 text-white shadow-2 box-size-analysis text-center">
                                    <p class="mt-3">Nombre de vue du site</p>
                                    <p class="fs-1">
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
                                    <p>ce mois ci</p>
                                </div>
            </article>
            <div class="shadow mt-5 rounded-3 p-3 w-75 mx-auto">
                <canvas id="myChart"></canvas>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


            <?php
                                $date = date('Y');

                                $mountExist = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
                                $result = [];
                                for ($i = 0; $i < count($mountExist); $i++) {
                                    $creationReservation = "'" . $date . "-" . $mountExist[$i] . "%'";
                                    try {

                                        $modele10 = new Model("reservation");
                                        $exemple10 = new Repository($modele10->getTable());
                                        $sql10 = "Select COUNT(*) from " . $modele10->getTable() . " where date_crea like $creationReservation";
                                        $resultat10 = $exemple10->requete($sql10);
                                        foreach ($resultat10 as $ligne) { {
                                                array_push($result, $ligne["COUNT(*)"]);
                                            }
                                        }
                                    } catch (PDOException $e) {
                                        die($e->getMessage());
                                    }
                                }
            ?>



            <script>
                const ctx = document.getElementById('myChart');

                new Chart(ctx, {
                    type: 'bar',

                    data: {
                        labels: <?php echo json_encode($mountExist) ?>,
                        datasets: [{
                            label: 'NOMBRE DE RÉSERVATION',
                            data: <?php echo json_encode($result) ?>,
                            backgroundColor: '#6AB04E',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>



            <div class="shadow mt-5 rounded-3 p-3 w-75 mx-auto">
                <canvas id="nbrvue"></canvas>
            </div>




            <?php
                                $date = date('Y');

                                $mountExistVu = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
                                $resultVu = [];
                                for ($i = 0; $i < count($mountExistVu); $i++) {
                                    $creationVu = "'" . $date . "-" . $mountExistVu[$i] . "'";
                                    try {

                                        $modele11 = new Model("vu");
                                        $exemple11 = new Repository($modele11->getTable());
                                        $sql11 = "Select compteur from " . $modele11->getTable() . " where date = $creationVu";
                                        $resultat11 = $exemple11->requete($sql11);
                                        foreach ($resultat11 as $ligne) { {

                                                array_push($resultVu, $ligne["compteur"]);
                                            }
                                        }
                                    } catch (PDOException $e) {
                                        die($e->getMessage());
                                    }
                                }
            ?>



            <script>
                const nbrvue = document.getElementById('nbrvue');

                new Chart(nbrvue, {
                    type: 'bar',

                    data: {
                        labels: <?php echo json_encode($mountExistVu) ?>,
                        datasets: [{
                            label: 'NOMBRE DE VUE',
                            data: <?php echo json_encode($resultVu) ?>,
                            backgroundColor: '#6AB04E',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>


            <div class="shadow mt-5 rounded-3 p-3 w-75 mx-auto">
                <canvas id="MoyennAvis"></canvas>
            </div>




            <?php
                                $date = date('Y');

                                $mountExistAvis = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
                                $resultAvis = [];
                                for ($i = 0; $i < count($mountExistAvis); $i++) {
                                    $creationAvis = "'" . $date . "-" . $mountExistAvis[$i] . "%'";
                                    try {

                                        $modele11 = new Model("avis");
                                        $exemple11 = new Repository($modele11->getTable());
                                        $sql11 = "Select AVG(note) from " . $modele11->getTable() . " where date like $creationAvis";
                                        $resultat11 = $exemple11->requete($sql11);
                                        foreach ($resultat11 as $ligne) { {

                                                array_push($resultAvis, $ligne["AVG(note)"]);
                                            }
                                        }
                                    } catch (PDOException $e) {
                                        die($e->getMessage());
                                    }
                                }
            ?>



            <script>
                const MoyennAvis = document.getElementById('MoyennAvis');

                new Chart(MoyennAvis, {
                    type: 'line',

                    data: {
                        labels: <?php echo json_encode($mountExistAvis) ?>,
                        datasets: [{
                            label: 'MOYENNE AVIS',
                            data: <?php echo json_encode($resultAvis) ?>,
                            backgroundColor: '#CE2A96',
                            borderColor: '#CE2A96',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                            }
                        }
                    }
                });
            </script>

<?php
                            } else {
                                header("Location: php_connexion.php");
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