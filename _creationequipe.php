<?php


if (!empty($_FILES["images"]["name"]) && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["fonction"])){

   
    //Envoie Image
    require_once "UID.php";
    $folder = "ImagesEquipe";
    $img = $_FILES["images"]["tmp_name"];
    $uniqueFileName = UID(50);
    $destinationPath = "$folder/$uniqueFileName.png";
    move_uploaded_file($img, $destinationPath);
    $uniqueFileName="'".$uniqueFileName."'";

  
    $nom = "'".$_POST["nom"]."'";
    $prenom = "'".$_POST["prenom"]."'";
    $fonction = "'".$_POST["fonction"]."'";


//Recupération POO
require_once "poo_repository.php";
require_once "poo_models.php";

//Lancement de la requete
try{

   $modele = new Model("equipe");
  $Repository = new Repository($modele->getTable());
   $sql ="INSERT INTO ". $modele->getTable() ." (nom, prenom, fonction, image) VALUES ( $nom, $prenom, $fonction,$uniqueFileName)";
   $Repository->requete($sql);
   header("Location: php_equipe.php");

}
catch(PDOException $e){
   header("Location: php_equipe.php");
   die($e->getMessage());
}



}
else {
   header("Location:php_equipe.php");
}
 