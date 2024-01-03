<?php

//initialisation de données
if(!empty($_POST["accepter"])){
//Recupération POO
require_once "poo_repository.php";
require_once "poo_models.php";


//Création variables
$mail = "'".($_POST["accepter"])."'";





//Lancement de la requete
try{
    $modele = new Model("adherant");
	$Repository = new Repository($modele->getTable());
    $sql ="UPDATE ". $modele->getTable() . " SET licence_valid = 2 WHERE mail = $mail";
    $Repository->requete($sql);
    header("Location: php_Gestion_avions.php");

}
catch(PDOException $e){
    header("Location: php_Gestion_avions.php");
    die($e->getMessage());
}}