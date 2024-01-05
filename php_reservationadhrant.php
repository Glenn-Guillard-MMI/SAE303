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
             if ($sauvegarde != 0) {
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


<div
    class="bg-custom-3 d-flex flex-column justify-content-center align-items-center rounded-3 p-2 shadow-box-stat mb-4 h-25">
    <p class="fs-5">Nombre de vol</p>
    <p class="fs-1">
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
    class="bg-custom-3 d-flex flex-column justify-content-center align-items-center rounded-3 p-2 shadow-box-stat mb-4 h-25">
    <p class="fs-5">Nombre d'heure de vol</p>
    <p class="fs-1">
        <?php
                                        try {
                                            $modele6 = new Model("reservation");
                                            $exemple6 = new Repository($modele6->getTable());
                                            $sql8 = "Select SUM(temps_presta) from " . $modele6->getTable() . " WHERE mail = $mail";
                                            $resultat8 = $exemple6->requete($sql8);

                                            foreach ($resultat8 as $ligne) { {
                                                    if ($ligne["SUM(temps_presta)"] == '') {
                                                        echo '0';
                                                    } else {
                                                        echo  $ligne["SUM(temps_presta)"];
                                                    }
                                                }
                                            }
                                        } catch (PDOException $e) {
                                            die($e->getMessage());
                                        }
                            ?>


    </p>
</div>


<table>
    <thead class="">
        <tr class="text-white">
            <th>Id</th>
            <th>Nom et Prénom</th>
            <th>matricule</th>
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
                            $sql2 = "Select * from " . $modele2->getTable() . " where mail = $mail";
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
                <?= $ligne2["matricule"] ?>

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
                                        } ?><?php if ($ligne2["validation"] == 0) {
                                            echo "<span class='d-flex flex-row justify-content-start align-items-center ms-3 mb-0 text-danger w-custom px-3 py-1 rounded-4 statu-shadow'>";
                                            echo "<i class='fas fa-circle me-2 mb-0'></i>";
                                            echo "<p class='m-0'>En attente</p>";
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
                                $sql2 = "Select * from " . $modele2->getTable() . " where mail = $mail ";
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


                <?php  try {
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
                                        } ?><?php if ($ligne2["validation"] == 0) {
                                            echo "<span class='d-flex flex-row justify-content-start align-items-center ms-3 mb-0 text-danger w-custom px-3 py-1 rounded-4 statu-shadow'>";
                                            echo "<i class='fas fa-circle me-2 mb-0'></i>";
                                            echo "<p class='m-0'>En attente</p>";
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
    $sql2 = "Select * from " . $modele2->getTable() . " where mail = $mail ";
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


                <?php  try {
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
            } ?><?php if ($ligne2["validation"] == 0) {
                echo "<span class='d-flex flex-row justify-content-start align-items-center ms-3 mb-0 text-danger w-custom px-3 py-1 rounded-4 statu-shadow'>";
                echo "<i class='fas fa-circle me-2 mb-0'></i>";
                echo "<p class='m-0'>En attente</p>";
            } ?>
                </span>
                </span>
            </th>
        </tr>


        <?php


    }
    ?>
    </tbody>
</table>

<?php
                        } catch (PDOException $e) {
                            die($e->getMessage());
                        }

                    } catch (PDOException $e) {
                        die($e->getMessage());
                    }

                } catch (PDOException $e) {
                    die($e->getMessage());
                }


        ?>