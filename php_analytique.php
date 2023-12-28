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

<div>
    <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<?php 
$date = date('Y');

$mountExist =["01","02","03","04","05","06","07","08","09","10","11","12"];
$result = [];
for ($i=0;$i<count($mountExist);$i++) 
{
$creationReservation = "'".$date."-".$mountExist[$i]."%'";
  try{
    
    $modele10 = new Model("reservation");
    $exemple10 = new Repository($modele10->getTable());
    $sql10 = "Select COUNT(*) from ".$modele10->getTable(). " where date_crea like $creationReservation";
    $resultat10 = $exemple10->requete($sql10);
    foreach ($resultat10 as $ligne) {
        { array_push($result,$ligne["COUNT(*)"]);}
    }}
  
    catch(PDOException $e){
        die($e->getMessage());
    }  
}
    ?>



<script>
const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'bar',

    data: {
        labels: <?php echo json_encode($mountExist)?>,
        datasets: [{
            label: '# of Votes',
            data: <?php echo json_encode($result) ?>,
            backgroundColor: '#4B0A19',
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



<div>
    <canvas id="nbrvue"></canvas>
</div>




<?php 
$date = date('Y');

$mountExistVu =["01","02","03","04","05","06","07","08","09","10","11","12"];
$resultVu = [];
for ($i=0;$i<count($mountExistVu);$i++) 
{
$creationVu = "'".$date."-".$mountExistVu[$i]."'";
  try{
    
    $modele11 = new Model("vu");
    $exemple11 = new Repository($modele11->getTable());
    $sql11 = "Select compteur from ".$modele11->getTable(). " where date = $creationVu";
    $resultat11 = $exemple11->requete($sql11);
    foreach ($resultat11 as $ligne) {
       
        
        { 
         
                 array_push($resultVu,$ligne["compteur"]);
            }
           
    }}
  
    catch(PDOException $e){
        die($e->getMessage());
    }  
}
    ?>



<script>
const nbrvue = document.getElementById('nbrvue');

new Chart(nbrvue, {
    type: 'bar',

    data: {
        labels: <?php echo json_encode($mountExistVu)?>,
        datasets: [{
            label: '# of Votes',
            data: <?php echo json_encode($resultVu) ?>,
            backgroundColor: '#4B0A19',
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


<div>
    <canvas id="MoyennAvis"></canvas>
</div>




<?php 
$date = date('Y');

$mountExistAvis =["01","02","03","04","05","06","07","08","09","10","11","12"];
$resultAvis = [];
for ($i=0;$i<count($mountExistAvis);$i++) 
{
$creationAvis = "'".$date."-".$mountExistAvis[$i]."%'";
  try{
    
    $modele11 = new Model("avis");
    $exemple11 = new Repository($modele11->getTable());
    $sql11 = "Select AVG(note) from ".$modele11->getTable(). " where date like $creationAvis";
    $resultat11 = $exemple11->requete($sql11);
    foreach ($resultat11 as $ligne) {
       
        
        { 
           
                 array_push($resultAvis,$ligne["AVG(note)"]);
            
           }
    }}
  
    catch(PDOException $e){
        die($e->getMessage());
    }  
}
    ?>



<script>
const MoyennAvis = document.getElementById('MoyennAvis');

new Chart(MoyennAvis, {
    type: 'line',

    data: {
        labels: <?php echo json_encode($mountExistAvis)?>,
        datasets: [{
            label: '# of Votes',
            data: <?php echo json_encode($resultAvis) ?>,
            backgroundColor: '#4B0A19',
            borderColor: '#4B0A19',
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