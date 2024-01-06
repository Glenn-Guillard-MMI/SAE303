<?php

if(isset($_POST['supp'])){

    $Suprresion = $_POST['supp'];
    require_once "poo_repository.php";
    require_once "poo_models.php";
    unlink("ImagesEquipe/$Suprresion.png");
    $Suprresion = "'".$_POST['supp']."'";


    //Lancement de la requete
try{
    $modele = new Model("equipe");
	$Repository = new Repository($modele->getTable());
    $sql ="DELETE FROM ". $modele->getTable() . " where image = $Suprresion";
    $Repository->requete($sql);
    exit();

}
catch(PDOException $e){
    die($e->getMessage());
}
    }



?>