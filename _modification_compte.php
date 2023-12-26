<?php

//initialisation de données
if(!empty($_POST["nom"]) and !empty($_POST["prenom"]) and !empty($_POST["email"])and !empty($_POST["genre"] and !empty($_POST["birthday"])and !empty($_POST["code_addresse"])and !empty($_POST["physique_addresse"])and !empty($_POST["num"])and !empty($_POST["ville"]))){


//Recupération POO
session_start();
$mail_secu = "'".$_SESSION["mail"]."'";
require_once "poo_repository.php";
require_once "poo_models.php";


//Création variables
$nom = "'".($_POST["nom"])."'";
$prenom ="'".($_POST["prenom"])."'";
$mail ="'".($_POST["email"])."'";
$num ="'".($_POST["num"])."'";
$genre ="'".($_POST["genre"])."'";
$birthday ="'".($_POST["birthday"])."'";
$addresse = "'".($_POST["physique_addresse"])."'";
$ville = "'".($_POST["ville"])."'";
$code = "'".($_POST["code_addresse"])."'";
$now  = "'".date("Y-m-d H:i:s")."'";


//Lancement de la requete
try{
    $modele = new Model("adherant");
	$Repository = new Repository($modele->getTable());
    $sql ="UPDATE ". $modele->getTable() . " SET nom = $nom, prenom = $prenom, civilite = $genre, mail = $mail, code_postale = $code, ville = $ville, adresse = $addresse, num_tel = $num, date_naissance = $birthday, date_update = $now WHERE mail = $mail_secu";
    $Repository->requete($sql);
    session_destroy();
    header("Location: php_modifier_compte.php");
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