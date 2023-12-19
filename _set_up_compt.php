<?php

//initialisation de données
if(!empty($_POST["nom"]) and !empty($_POST["prenom"]) and !empty($_POST["email"])and !empty($_POST["genre"])){


//Recupération POO
require_once "poo_repository.php";
require_once "poo_models.php";


//Création variables
$nom = "'".($_POST["nom"])."'";
$prenom ="'".($_POST["prenom"])."'";
$mail ="'".($_POST["email"])."'";
$password = "'".password_hash(($_POST["password"]), PASSWORD_DEFAULT)."'";
$genre ="'".($_POST["genre"])."'";



//Lancement de la requete
try{

    $modele = new Model("adherant");
	$Repository = new Repository($modele->getTable());
    $sql ="INSERT INTO ". $modele->getTable() ." (autorisation, nom, prenom, mail,civilite, mdp) VALUES (0, $nom, $prenom, $mail,$genre,$password)";
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