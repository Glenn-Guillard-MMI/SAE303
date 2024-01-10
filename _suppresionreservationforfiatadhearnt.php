<?php

if(isset($_POST['id'])){

    $Suprresion = $_POST['id'];
    require_once "poo_repository.php";
    require_once "poo_models.php";
   
 


    //Lancement de la requete
try{
    $modele = new Model("r_forfait");
	$Repository = new Repository($modele->getTable());
    $sql ="DELETE FROM ". $modele->getTable() . " where num_res = $Suprresion";
    $Repository->requete($sql);
    exit();

}
catch(PDOException $e){
    die($e->getMessage());
}
    }



?>