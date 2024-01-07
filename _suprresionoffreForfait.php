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

    $modele = new Model("forfait");
	$Repository = new Repository($modele->getTable());
    $sql ="UPDATE ". $modele->getTable() ." SET active = 1 WHERE id = $id";
    $Repository->requete($sql);
    

}
catch(PDOException $e){
   
    die($e->getMessage());
}}
    else{
    echo"ERROR";
    }