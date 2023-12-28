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
    foreach ($resultat as $ligne)
    {
    ?>


<table border="1px">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Class</th>
            <th>Matricule</th>
            <?php if ($ligne["autorisation"] == 3)  { echo" <th>Plus d'option</th>";} }?>


        </tr>
    </thead>
    <tbody>
        <?php
          try {
   $modele2 = new Model("avion");
   $exemple2 = new Repository($modele2->getTable());  
   $sql2 = "Select * from ".$modele2->getTable(). " WHERE Active = 1";
   $resultat2 = $exemple2->requete($sql2);
   foreach ($resultat2 as $ligne2)
   {


  


?>
        <tr id="<?php echo "Matricule_".$ligne2["matricule"] ?>">
            <th><?=$ligne2["nom"] ?></th>
            <th><?=$ligne2["type"] ?></th>
            <th><?= $ligne2["matricule"]?></th>
            <?php if ($ligne["autorisation"] == 3)  { 
                $supr = "'".$ligne2["matricule"]."'";
                ?>
            <th><button onclick="supression(<?= $supr ?>)">SUP</button></th>

            <?php }
                ?>

        </tr>
        <?php } ?>
    </tbody>
</table>


<?php
        
    
    
    }catch(PDOException $e){
        die($e->getMessage());
        header("Location: php_connexion.php");

}
  

     }catch(PDOException $e){
        die($e->getMessage());
        header("Location: php_connexion.php");

}
?>


<?php             
        }
        else{
            header("Location: php_connexion.php");

        }


        if($ligne["autorisation"] == 3){
?>

<div>
    <form action="_AjoutAvion.php" method="POST">
        <input type="texte" id="Nom" name="Nom">
        <input type="texte" id="Class" name="Class">
        <input type="texte" id="Matricule" name="Matricule">
        <input type="submit">


    </form>
</div>


<?php
        }

        }

        }catch(PDOException $e){
            die($e->getMessage());
            header("Location: php_connexion.php");

    }
    
        
        }
        else{
            header("Location: php_connexion.php");
        }
            
            ?>


<script src="node_modules/jquery/dist/jquery.js?time=<?php require 'UID.php'; echo UID(200)?>"></script>
<script src="js/gestionAvionsScript.js?time=<?php  'UID.php'; echo UID(200)?>"></script>