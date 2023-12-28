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
            if ($ligne["autorisation"] == 3 || $ligne["autorisation"] == 2|| $ligne["autorisation"] == 1){
                if ($ligne["autorisation"] == 3){
?>
<a href="ajouter_avion.php">Ajouter un avions</a>
<?php                  
                }

?>
<h1>Liste des avions disponible</h1>
<?php
  try {

    $modele = new Model("adherant");
    $exemple1 = new Repository($modele->getTable());  
    $sql = "Select autorisation from ".$modele->getTable()." where mail = $mail  ";
    $resultat = $exemple1->requete($sql);
    ?>


<table border="1px">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Class</th>
            <th>Matricule</th>
            <th>E-mail</th>


        </tr>
    </thead>
    <tbody>
        <?php
    foreach ($resultat as $ligne)
    {
?>

        <?php


    }}catch(PDOException $e){
        die($e->getMessage());
}
?>

        <?php
            ?>










        <?php             
        }

        }

        }catch(PDOException $e){
            die($e->getMessage());
    }
    
        
        }
        else{
            //erreur
        }
            
            ?>