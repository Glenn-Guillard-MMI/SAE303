<?php

//Lancement session
session_start();

//Vérification si quelq'un est connecter
if(isset($_SESSION['mail'])){
    $mail = "'".$_SESSION['mail']."'";
    require_once "poo_repository.php";
    require_once "poo_models.php";

    //Vérification si la personne est admin
    try {

        $modele = new Model("adherant");
        $exemple1 = new Repository($modele->getTable());  
        $sql = "Select autorisation from ".$modele->getTable()." where mail = $mail  ";
        $resultat = $exemple1->requete($sql);
    
        foreach ($resultat as $ligne)
        {
            if ($ligne["autorisation"] == 3 || $ligne["autorisation"] == 2){
               
           

            ?>



<h1>Nombre de réservation (ce mois ci)</h1>
<p>
    <?php 

                $date = "'".date("Y-m")."%'";
                try{
                    $modele2 = new Model("reservation");
                    $exemple2 = new Repository($modele2->getTable());
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
<h1>Nombre d'adhérant</h1>
<p>
    <?php 
                        
                            try{
                          
                            $sql2 = "Select COUNT(*) from ".$modele->getTable(). " WHERE compte_actif = 1";
                            $resultat6 = $exemple1->requete($sql2);
                          
                            foreach ($resultat6 as $ligne) {
                                { echo  $ligne["COUNT(*)"];}
                            }}
                          
                            catch(PDOException $e){
                                die($e->getMessage());
                            }
                            ?>


</p>
<h1>Nombre de vue du site</h1>
<p>
    <?php 
       
  try{
  $modele4 = new Model("vu");
  $exemple7 = new Repository($modele2->getTable());
  $sql7 = "Select COUNT(*) from ".$modele2->getTable();
  $resultat7 = $exemple7->requete($sql7);

  foreach ($resultat7 as $ligne) {
      { echo $ligne["COUNT(*)"];}
  }}

  catch(PDOException $e){
      die($e->getMessage());
  }
  ?>


</p>

<?php
 }
            else{
                header("Location: php_connexion.php");
            }
        }
    }   catch(PDOException $e){
        die($e->getMessage());
}

}
else{
    header("Location: php_connexion.php");
}


?>