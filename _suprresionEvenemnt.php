<?php

if(isset($_POST['supp'])){

    $Suprresion = $_POST['supp'];
    require_once "poo_repository.php";
    require_once "poo_models.php";
    unlink("ImagesEvenement/$Suprresion.png");
    $Suprresion = "'".$_POST['supp']."'";


    //Lancement de la requete
try{
    $modele = new Model("evenement");
	$Repository = new Repository($modele->getTable());
    $sql ="UPDATE ". $modele->getTable() . " SET active = 1 where image = $Suprresion";
    echo $sql;
    $Repository->requete($sql);
    exit();

}
catch(PDOException $e){
    die($e->getMessage());
}
    }



?>