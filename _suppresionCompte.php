<?php

if(isset($_POST['mailSuprresion'])){

    $mailSupression = "'".$_POST['mailSuprresion']."'";
    require_once "poo_repository.php";
    require_once "poo_models.php";

    //Lancement de la requete
try{
    $modele = new Model("adherant");
	$Repository = new Repository($modele->getTable());
    $sql ="DELETE FROM ". $modele->getTable() . " WHERE mail = $mailSupression";
    $Repository->requete($sql);
    exit();

}
catch(PDOException $e){

    die($e->getMessage());
     

}
}



?>