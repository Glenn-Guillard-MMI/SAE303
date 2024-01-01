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
      { 
       ?>
        <tr>
            <th>
                <?= $ligne2["num_res"]?>
            </th>
            <th>
                <?php
                
                ?>
            </th>
        </tr>

        <?php
    
    }
  }}

  catch(PDOException $e){
      die($e->getMessage());
  }
  ?>


        <?php
                        }}}catch(PDOException $e){
                            die($e->getMessage());
                        }}            
?>