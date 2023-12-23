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
            if ($ligne["autorisation"] == 3){
                echo " Nom =". $ligne["nom"];
                echo " prenom =". $ligne["prenom"];
                echo " Status =". $ligne["autorisation"];
                echo " numéro =". $ligne["num_tel"];
                echo " e-mail =". $ligne["mail"];
                echo " date de naissance =". $ligne["date_naissance"];
                echo " adresse =". $ligne["adresse"];
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