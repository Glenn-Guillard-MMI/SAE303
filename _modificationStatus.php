<?php

if(isset($_POST['mailSuprresion'] ) && isset($_POST['NouveauStatus'])){

    $mailSupression = "'".$_POST['mailSuprresion']."'";
    
    require_once "poo_repository.php";
    require_once "poo_models.php";

    //Lancement de la requete
try{
    $modele = new Model("adherant");
	$Repository = new Repository($modele->getTable());

switch($_POST['NouveauStatus']){
    case 'admin':
        $sql ="UPDATE ". $modele->getTable() . " SET autorisation = 3 WHERE mail = $mailSupression";
        break;
    case 'staff':
        $sql ="UPDATE ". $modele->getTable() . " SET autorisation = 2 WHERE mail = $mailSupression";
        break;
    case 'pilote':
        $sql ="UPDATE ". $modele->getTable() . " SET autorisation = 1 WHERE mail = $mailSupression";
        break;
    default:
        $sql ="UPDATE ". $modele->getTable() . " SET autorisation = 0 WHERE mail = $mailSupression";

}

    $Repository->requete($sql);
    exit();

}
catch(PDOException $e){

    die($e->getMessage());
     

}
}



?>