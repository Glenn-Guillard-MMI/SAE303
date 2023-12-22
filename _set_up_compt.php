<?php

//initialisation de données
if(!empty($_POST["nom"]) and !empty($_POST["prenom"]) and !empty($_POST["email"])and !empty($_POST["genre"] and !empty($_POST["birthday"])and !empty($_POST["code_addresse"])and !empty($_POST["physique_addresse"])and !empty($_POST["num"]))){


//Recupération POO
require_once "poo_repository.php";
require_once "poo_models.php";


//Création variables
$nom = "'".($_POST["nom"])."'";
$prenom ="'".($_POST["prenom"])."'";
$mail ="'".($_POST["email"])."'";
$num ="'".($_POST["num"])."'";
$password = "'".password_hash(($_POST["password"]), PASSWORD_DEFAULT)."'";
$genre ="'".($_POST["genre"])."'";
$birthday ="'".($_POST["birthday"])."'";
$addresse = "'".($_POST["physique_addresse"]).",".($_POST["code_addresse"])."'";
$now  = "'".date("Y-m-d H:i:s")."'";


//Lancement de la requete
try{

    $modele = new Model("adherant");
	$Repository = new Repository($modele->getTable());
    $sql ="INSERT INTO ". $modele->getTable() ." (autorisation, nom, prenom, mail,civilite, mdp, date_naissance, adresse,num_tel,date_crea) VALUES (0, $nom, $prenom, $mail,$genre,$password,$birthday,$addresse,$num,$now)";
    $Repository->requete($sql);
    header("Location: php_cree_compte.php");

}
catch(PDOException $e){
    header("Location: php_cree_compte.php");
    die($e->getMessage());
}}
    else{
    header("Location: php_cree_compte.php");
    echo"ERROR";
    }