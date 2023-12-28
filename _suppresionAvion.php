<?php

if(isset($_POST['Suprresion'])){

    $Suprresion = "'".$_POST['Suprresion']."'";
    require_once "poo_repository.php";
    require_once "poo_models.php";

    //Lancement de la requete
try{
    $modele = new Model("avion");
	$Repository = new Repository($modele->getTable());
    $sql ="UPDATE ". $modele->getTable() . " SET Active = 0 WHERE matricule = $Suprresion";
    $Repository->requete($sql);
    exit();

}
catch(PDOException $e){
    die($e->getMessage());
}
    }



?>