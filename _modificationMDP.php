<?php

//initialisation de données
if(!empty($_POST["password"])){

//Recupération POO
session_start();
$mail_secu = "'".$_SESSION["mail"]."'";
require_once "poo_repository.php";
require_once "poo_models.php";


//Création variables
$newPassword = "'".password_hash(($_POST["password"]), PASSWORD_DEFAULT)."'";


//Lancement de la requete
try{
    $modele = new Model("adherant");
	$Repository = new Repository($modele->getTable());
    $sql ="UPDATE ". $modele->getTable() . " SET mdp = $newPassword WHERE mail = $mail_secu";
    $Repository->requete($sql);
    session_destroy();
    header("Location: php_connexion.php");
    exit();

}
catch(PDOException $e){

    die($e->getMessage());
    header("Location: php_modifier_compte.php");
    exit();


}}
    else{
    header("Location: php_cree_compte.php");
    echo"ERROR";
    }