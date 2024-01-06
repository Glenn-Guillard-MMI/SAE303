<?php


if ( !empty($_POST["nom"]) && !empty($_POST["fonction"]) && !empty($_POST["prenom"]) && !empty($_POST["id"])){

   
    $nom = "'".$_POST["nom"]."'";
    $fonction = "'".$_POST["fonction"]."'";
    $prenom = "'".$_POST["prenom"]."'";



//Recupération POO
require_once "poo_repository.php";
require_once "poo_models.php";

//Lancement de la requete
try{

   $modele = new Model("equipe");
  $Repository = new Repository($modele->getTable());
   $sql ="UPDATE ". $modele->getTable() ." SET nom = $nom, fonction = $fonction, prenom = $prenom  where id = ". $_POST['id'];
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
 