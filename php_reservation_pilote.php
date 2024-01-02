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
                        if ($ligne["autorisation"] == 1) {  
                            
                            ?>

<h1>Nombre de vol</h1>
<p>
    <?php 
 try{
    $modele6 = new Model("reservation");
    $exemple6 = new Repository($modele6->getTable());
    $sql8 = "Select COUNT(*) from ".$modele6->getTable()." WHERE pilote = $mail";
    $resultat8= $exemple6->requete($sql8);

  foreach ($resultat8 as $ligne) {
      { echo  $ligne["COUNT(*)"];}
  }}

  catch(PDOException $e){
      die($e->getMessage());
  }
  ?>


</p>
<h1>Nombre d'heure de vol</h1>
<p>
    <?php 
 try{
    $modele6 = new Model("reservation");
    $exemple6 = new Repository($modele6->getTable());
    $sql8 = "Select SUM(temps_presta) from ".$modele6->getTable()." WHERE pilote = $mail";
    $resultat8= $exemple6->requete($sql8);

  foreach ($resultat8 as $ligne) {
      { echo  $ligne["SUM(temps_presta)"];}
  }}

  catch(PDOException $e){
      die($e->getMessage());
  }
  ?>


</p>
<table border="1px">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom et Prénom</th>
            <th>Type d'ULM</th>
            <th>Pilote</th>
            <th>Date</th>
            <th>Temps de prestation</th>

        </tr>
    </thead>
    <tbody>
        <?php 
 try{
    $modele9 = new Model("reservation");
    $exemple9 = new Repository($modele9->getTable());
    $sql9 = "Select * from ".$modele9->getTable()." WHERE pilote = $mail";
    $resultat9= $exemple9->requete($sql9);

  foreach ($resultat9 as $ligne2) {
       
       ?>
        <tr>
            <th>
                <?= $ligne2["num_res"]?>
            </th>
            <th>
                <?php
                $mailChecker = "'".$ligne2["mail"]."'";
                 try{
                    $modele1 = new Model("adherant");
                    $exemple1 = new Repository($modele1->getTable());
                    $sql1 = "Select * from ".$modele1->getTable()." WHERE mail = $mailChecker";
                    $resultat1= $exemple1->requete($sql1);
                
                  foreach ($resultat1 as $ligne3) {
                    echo $ligne3["nom"]." ".$ligne3["prenom"];
                  }}

                  catch(PDOException $e){
                      die($e->getMessage());
                  }
                ?>
            </th>
            <th>
                <?php
                $matriculeChecker = "'".$ligne2["matricule"]."'";
                 try{
                    $modele0 = new Model("avion");
                    $exemple0 = new Repository($modele0->getTable());
                    $sql0 = "Select * from ".$modele0->getTable()." WHERE matricule = $matriculeChecker";
                    $resultat0= $exemple0->requete($sql0);
                
                  foreach ($resultat0 as $ligne0) {
                    echo $ligne3["type"];
                  }}

                  catch(PDOException $e){
                      die($e->getMessage());
                  }
                ?>
            </th>
            <th>
                <?php
             
                 try{
                    $modele12 = new Model("adherant");
                    $exemple12 = new Repository($modele12->getTable());
                    $sql12 = "Select * from ".$modele12->getTable()." WHERE mail =  $mail";
                    $resultat12= $exemple12->requete($sql12);
                
                  foreach ($resultat12 as $ligne12) {
                    echo $ligne12["nom"]." ".$ligne12["prenom"];
                  }}

                  catch(PDOException $e){
                      die($e->getMessage());
                  }
                ?>
            </th>
            <th><?= $ligne2["date_j"]?> </th>
            <th><?= $ligne2["temps_presta"]?> </th>
        </tr>

        <?php
    
    
  }}

  catch(PDOException $e){
      die($e->getMessage());
  }
  ?>


        <?php
                        }}}catch(PDOException $e){
                            die($e->getMessage());
                        }}
                        else {

                            header("Location: php_connexion.php");
                        }  
?>