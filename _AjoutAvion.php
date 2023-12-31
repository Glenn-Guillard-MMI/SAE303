<?php

//initialisation de données
if(!empty($_POST["Nom"]) and !empty($_POST["Class"]) and !empty($_POST["Matricule"])){


//Recupération POO
require_once "poo_repository.php";
require_once "poo_models.php";


//Création variables
$nom = "'".($_POST["Nom"])."'";
$Class ="'".($_POST["Class"])."'";
$Matricule ="'".($_POST["Matricule"])."'";



//Lancement de la requete
try{

    $modele = new Model("avion");
	$Repository = new Repository($modele->getTable());
    $sql ="INSERT INTO ". $modele->getTable() ." (nom, matricule, type) VALUES ( $nom, $Class, $Matricule)";
    $Repository->requete($sql);
    header("Location: php_Gestion_avions.php");

}
catch(PDOException $e){
    header("Location: php_Gestion_avions.php");
    die($e->getMessage());
}}
    else{
    header("Location: php_Gestion_avions.php");
    echo"ERROR";
    }