<?php


if((!empty($_POST["photo"]) && (!empty($_POST["titre"]) && !empty($_POST["date_une"])) && !empty($_POST["date_deux"] )&& !empty($_POST["localisation"]  && !empty($_POST["url"] )))){

    //Verfi date 1
    $dateUn = $_POST["date_une"];
    $dateTimeUn = DateTime::createFromFormat("Y-m-d", $dateUn); 
    if (!($dateTimeUn->format("Y-m-d") === $dateUn)) {
       header("Location:php_login.php");
       exit();
    }

    //Verfi date 2
    $dateUn = $_POST["date_deux"];
    $dateTimeUn = DateTime::createFromFormat("Y-m-d", $dateUn); 
    if (!($dateTimeUn->format("Y-m-d") === $dateUn)) {
       header("Location:php_login.php");
       exit();
    }

    //Envoie Image
    require_once "UID.php";
    $folder = "ImagesEvenement";
    $img = $_FILES["images"]["tmp_name"];
    $uniqueFileName = UID(50);
    $destinationPath = "$folder/$uniqueFileName.png";
    move_uploaded_file($img, $destinationPath);
    $uniqueFileName="'".$uniqueFileName."'";


    $titre = "'".$_POST["titre"]."'";
    $localisation = "'".$_POST["localisation"]."'";
    $url = "'".$_POST["url"]."'";






}
else {

   header("Location:php_evenement.php");

}
 