<?php
session_start();
if (isset($_SESSION['mail'])){

    $mail = "'".$_SESSION['mail']."'";
    require_once "poo_repository.php";
    require_once "poo_models.php";
    
    try {
        $modele = new Model("adherant");
    
        $exemple1 = new Repository($modele->getTable());
    
        $sql = "Select * from ".$modele->getTable()." where mail = $mail  ";
    
        $resultat = $exemple1->requete($sql);
    
        foreach ($resultat as $ligne) {
           {
                echo " Nom =". $ligne["nom"];
                echo " prenom =". $ligne["prenom"];
                echo " Status =". $ligne["autorisation"];
                echo " numéro =". $ligne["num_tel"];
                echo " e-mail =". $ligne["mail"];
                echo " date de naissance =". $ligne["date_naissance"];
                echo " adresse =". $ligne["adresse"];
            ?>
<a href="_deconnexion.php">Déconnexion</a>
<?php
                if($ligne["autorisation"] == 3){
            ?>

<h1>Nombre de réservation en attente</h1>
<p>
    <?php 
                try{
                $modele2 = new Model("reservation");
                $exemple2 = new Repository($modele2->getTable());
                $sql2 = "Select COUNT(*) from ".$modele2->getTable()." where validation = 0  ";
                $resultat2 = $exemple2->requete($sql2);

                foreach ($resultat2 as $ligne) {
                    { echo  $ligne["COUNT(*)"];}
                }}

                catch(PDOException $e){
                    die($e->getMessage());
                }
                ?>


</p>

<h1>Demande de licence (en attente)</h1>
<p>
    <?php 
                try{
                    $sql3 = "Select COUNT(*) from ".$modele->getTable()." where licence = 0  ";
                    $resultat3 = $exemple1->requete($sql3);

                    foreach ($resultat3 as $ligne) {
                        { echo $ligne["COUNT(*)"];}
                    }}

                    catch(PDOException $e){
                        die($e->getMessage());
                    }
                
                
                ?>
</p>
<h1>Nombre de réservation (ce moi ci)</h1>
<p>
    <?php 

                $date = "'".date("Y-m")."%'";
                try{
                    $sql4 = "Select COUNT(*) from ".$modele2->getTable()." WHERE date_crea like $date";
                    $resultat4 = $exemple2->requete($sql4);

                    foreach ($resultat4 as $ligne) {
                        { echo $ligne["COUNT(*)"];}
                    }}

                    catch(PDOException $e){
                        die($e->getMessage());
                    }
                
                
                ?>
</p>

<h1>Moyenne avis</h1>
<p>
    <?php 
                            try{
                            $modele3 = new Model("avis");
                            $exemple3 = new Repository($modele3->getTable());
                            $sql5 = "Select AVG(note) from ".$modele3->getTable();
                            $resultat5= $exemple3->requete($sql5);

                            foreach ($resultat5 as $ligne) {
                                { echo  $ligne["AVG(note)"];}
                            }}

                            catch(PDOException $e){
                                die($e->getMessage());
                            }
                            ?>


</p>
<?php
                            }
            ?>

<?php
  if($ligne["autorisation"] == 2){
?>

<h1>Nombre de réservation en attente</h1>
<p>
    <?php 
  try{
  $modele2 = new Model("reservation");
  $exemple2 = new Repository($modele2->getTable());
  $sql2 = "Select COUNT(*) from ".$modele2->getTable()." where validation = 0  ";
  $resultat2 = $exemple2->requete($sql2);

  foreach ($resultat2 as $ligne) {
      { echo  $ligne["COUNT(*)"];}
  }}

  catch(PDOException $e){
      die($e->getMessage());
  }
  ?>


</p>






<?php
  }
?>













<?php

            };


        }
        
        } catch(PDOException $e){
               die($e->getMessage());
       }
}
else{
    header("Location: php_connexion.php");
}

?>