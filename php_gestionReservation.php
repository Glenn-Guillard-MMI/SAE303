<?php
            //Lancement session
            session_start();

            //Vérification si quelq'un est connecter
            if (!isset($_SESSION['mail'])) {
                header("Location: php_connexion.php");
            }

            require_once "poo_repository.php";
            require_once "poo_models.php";

            //Vérification si la personne est admin
            try {
$mail = "'".$_SESSION['mail']."'";
                $modele = new Model("adherant");
                $exemple1 = new Repository($modele->getTable());
                $sql = "Select autorisation from " . $modele->getTable() . " where mail = $mail  ";
                $resultat = $exemple1->requete($sql);

                foreach ($resultat as $ligne) {
                    if ($ligne["autorisation"] != 3) {
                        header("Location: php_connexion.php");
                    }}}catch (PDOException $e) {
                        die($e->getMessage());
                    }

?>
<table border="1px">
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
$mailadherant = "'".$ligne2["mail"]."'";
    $modele3 = new Model("adherant");
    $exemple3 = new Repository($modele3->getTable());
    $sql3 = "Select * from " . $modele3->getTable() . " where mail = $mailadherant";
    $resultat3 = $exemple3->requete($sql3);

    foreach ($resultat3 as $ligne3) { 
        echo $ligne3["nom"] . " " . $ligne3["prenom"];
    }
}


catch (PDOException $e) {
        die($e->getMessage());
    }
            ?>
            </th>
            <th>
                <select onchange="SelectionBaptemeMatricule(<?=$ligne2['num_res']?>)"
                    id='Selection_matricule_bapteme_<?=$ligne2['num_res']?>'>
                    <option value="" selected disabled>
                        Selection</option>
                    <?php try {
    $modele4 = new Model("avion");
    $exemple4 = new Repository($modele4->getTable());
    $sql4 = "Select * from " . $modele4->getTable();
    $resultat4 = $exemple4->requete($sql4);

    foreach ($resultat4 as $ligne4) { 
       $matricule = $ligne4["matricule"];
       ?>

                    <option value="<?=$matricule?>" <?php if($ligne2["matricule"] == $matricule) {echo "selected";} ?>>
                        <?=$matricule?>
                    </option>

                    <?php
    }
}


catch (PDOException $e) {
        die($e->getMessage());
    }
?>
                </select>
            </th>
            <th>
                <select onchange="SelectionBaptemePilote(<?=$ligne2['num_res']?>)"
                    id='Selection_pilote_bapteme_<?=$ligne2['num_res']?>'>
                    <option value="" selected disabled>Selection</option>
                    <?php try {
    $modele5 = new Model("adherant");
    $exemple5 = new Repository($modele5->getTable());
    $sql5 = "Select * from " . $modele5->getTable(). " where autorisation = 1";
    $resultat5 = $exemple5->requete($sql5);

    foreach ($resultat5 as $ligne5) { 
       $id = $ligne5["mail"];
       ?>

                    <option value="<?=$id?>" <?php if($ligne2["pilote"] == $id) {echo "selected";} ?>>
                        <?=$ligne5["nom"]." ". $ligne5["prenom"]?></option>

                    <?php
    }
}


catch (PDOException $e) {
        die($e->getMessage());
    }
?>
                </select>
            </th>
            <th>
                <?= $ligne2["date_j"]." a ".$ligne2["date_h"] ?>
            </th>
            <th>
                <?= $ligne2["temps_presta"] ?>
            </th>

            <th>
                <button onclick="AccepterBaptemePilote(<?=$ligne2['num_res']?>)">Oui</button>
                <button onclick="RefuserBaptemePilote(<?=$ligne2['num_res']?>)">Non</button>
            </th>
        </tr>


        <?php


       }
       ?>

    </tbody>
</table>




<?php
    }
    
    
    catch (PDOException $e) {
            die($e->getMessage());
        }
       

        ?>

<table border="1px">
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
    $sql2 = "Select * from " . $modele2->getTable() . " where validation != 0 and matricule != '' and pilote != ''  ";
    $resultat2 = $exemple2->requete($sql2);

    foreach ($resultat2 as $ligne2) {
?>

        <tr>
            <th><?= $ligne2["num_res"] ?></th>
            <th>

                <?php
try {
$mailadherant = "'".$ligne2["mail"]."'";
    $modele3 = new Model("adherant");
    $exemple3 = new Repository($modele3->getTable());
    $sql3 = "Select * from " . $modele3->getTable() . " where mail = $mailadherant";
    $resultat3 = $exemple3->requete($sql3);

    foreach ($resultat3 as $ligne3) { 
        echo $ligne3["nom"] . " " . $ligne3["prenom"];
    }
}


catch (PDOException $e) {
        die($e->getMessage());
    }
            ?>
            </th>
            <th>
                <?= $ligne2["temps_presta"]?>

            </th>
            <th>

                <?php 

                    $mailPilote = "'". $ligne2["pilote"]."'";
                    
                    try {
    $modele5 = new Model("adherant");
    $exemple5 = new Repository($modele5->getTable());
    $sql5 = "Select * from " . $modele5->getTable(). " where mail = $mailPilote";
    $resultat5 = $exemple5->requete($sql5);

    foreach ($resultat5 as $ligne5) { 
       echo $ligne5["nom"]. " ".$ligne5["prenom"];
     
    }
}


catch (PDOException $e) {
        die($e->getMessage());
    }
?>

            </th>
            <th>
                <?= $ligne2["date_j"]." a ".$ligne2["date_h"] ?>
            </th>
            <th>
                <?= $ligne2["temps_presta"] ?>
            </th>

            <th>
                <?php if( $ligne2["temps_presta"]== 1){echo "accepter";}else{echo "refuser";} ?>
            </th>
        </tr>


        <?php


       }
       ?>

    </tbody>
</table>




<?php
    }
    
    
    catch (PDOException $e) {
            die($e->getMessage());
        }
       

        ?>

<script src="node_modules/jquery/dist/jquery.js?time=<?php require "UID.php";
                                                            echo UID(200) ?>"></script>
<script src="js/GestionReservation.js?time=<?php
                                                echo UID(200) ?>"></script>