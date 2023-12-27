<?php

//initialisation de données
if(!empty($_POST["nom"]) and !empty($_POST["prenom"]) and !empty($_POST["email"])and !empty($_POST["genre"] and !empty($_POST["birthday"])and !empty($_POST["code_addresse"])and !empty($_POST["physique_addresse"])and !empty($_POST["num"])and !empty($_POST["ville"])and !empty($_POST["password"]))){


//Recupération POO
require_once "poo_repository.php";
require_once "poo_models.php";


//Création variables
$nom = "'".($_POST["nom"])."'";
$prenom ="'".($_POST["prenom"])."'";
$mail ="'".($_POST["email"])."'";
$num ="'".substr($_POST["num"], 0, 2) . ' '.substr($_POST["num"], 2, 2) . ' '.substr($_POST["num"], 4, 2) . ' '.substr($_POST["num"], 6, 2) . ' '.substr($_POST["num"], 8, 2)."'";
$password = "'".password_hash(($_POST["password"]), PASSWORD_DEFAULT)."'";
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
    $sql ="INSERT INTO ". $modele->getTable() ." (nom, prenom, mail,civilite, mdp, date_naissance, adresse,num_tel,date_crea,code_postale,ville,licence) VALUES ($nom, $prenom, $mail,$genre,$password,$birthday,$addresse,$num,$now,$code,$ville,0)";
    $Repository->requete($sql);
    header("Location: index.html");

}
catch(PDOException $e){
    //header("Location: hello.php");
    die($e->getMessage());
}}
    else{
    header("Location: php_cree_compte.php");
    echo"ERROR";
    }