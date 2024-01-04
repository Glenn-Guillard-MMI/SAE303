<?php


if ( !empty($_POST["titre"]) && !empty($_POST["date_une"]) && !empty($_POST["date_deux"]) && !empty($_POST["localisation"]) && !empty($_POST["url"])){

    //Verfi date 1
    $dateUn = $_POST["date_une"];
    $dateTimeUn = DateTime::createFromFormat("Y-m-d", $dateUn); 
    if (!($dateTimeUn->format("Y-m-d") === $dateUn)) {
       header("Location:php_login.php");
       exit();
    }

    //Verfi date 2
    $datedeux = $_POST["date_deux"];
    $dateTimeUn = DateTime::createFromFormat("Y-m-d", $datedeux); 
    if (!($dateTimeUn->format("Y-m-d") === $datedeux)) {
       header("Location:php_login.php");
       exit();
    }

    if ($dateUn > $datedeux){
      header("Location:php_login.php");
       exit();
    }


   

    $dateUn = "'".$dateUn."'";
    $datedeux = "'".$datedeux."'";
    $titre = "'".$_POST["titre"]."'";
    $localisation = "'".$_POST["localisation"]."'";
    $url = "'".$_POST["url"]."'";


//Recupération POO
require_once "poo_repository.php";
require_once "poo_models.php";

//Lancement de la requete
try{

   $modele = new Model("evenement");
  $Repository = new Repository($modele->getTable());
   $sql ="UPDATE ". $modele->getTable() ." SET nom = $titre, lieu = $localisation, date_debut = $dateUn, date_fin = $datedeux, lien = $url where image = ". $_POST['id'];
   $Repository->requete($sql);
   header("Location: php_evenement.php");

}
catch(PDOException $e){
   header("Location: php_Gestion_avions.php");
   die($e->getMessage());
}



}
else {

   header("Location:php_evenement.php");

}
 