<?php

//initialisation de données
if(!empty($_POST["id"]) ){


//Recupération POO
require_once "poo_repository.php";
require_once "poo_models.php";


//Création variables

$id =($_POST["id"]);





//Lancement de la requete
try{

    $modele = new Model("reservation");
	$Repository = new Repository($modele->getTable());
    $sql ="UPDATE ". $modele->getTable() ." SET validation = 2 WHERE num_res = $id";
    $Repository->requete($sql);
    

}
catch(PDOException $e){
   
    die($e->getMessage());
}}
    else{
    header("Location: php_Gestion_avions.php");
    echo"ERROR";
    }