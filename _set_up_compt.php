<?php

//initialisation de données
$nom = "'".($_POST["nom"])."'";
$prenom ="'".($_POST["prenom"])."'";
$mail ="'".($_POST["email"])."'";

    
require_once "poo_repository.php";
require_once "poo_models.php";


try{

    $modele = new Model("adherant");
	$Repository = new Repository($modele->getTable());
    $sql ="INSERT INTO ". $modele->getTable() ." (autorisation, nom, prenom, mail) VALUES (0, $nom, $prenom, $mail)";
    $Repository->requete($sql);
header("Location: php_cree_compte.php");

}
catch(PDOException $e){
    die($e->getMessage());}