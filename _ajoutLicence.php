<?php

session_start();
    require_once "poo_repository.php";
    require_once "poo_models.php";

    $mail = "'".$_SESSION["mail"]."'";
    require_once "UID.php";
    $folder = "PDFlicences";
    $pdf = $_FILES["licence"]["tmp_name"];
    $uniqueFileName = UID(50);
    $destinationPath = "$folder/$uniqueFileName.pdf";
    move_uploaded_file($pdf, $destinationPath);
    $UID ="'".$uniqueFileName."'";
    
    try{
        $modele = new Model("adherant");
        $Repository = new Repository($modele->getTable());
        $sql ="UPDATE ". $modele->getTable() . " SET licence = $UID, licence_valid = 1 WHERE mail = $mail";
        $Repository->requete($sql);
    }

    catch(PDOException $e){
         die($e->getMessage());      
    }

?>