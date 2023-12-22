<?php


if((!empty($_POST["solo"]) || !empty($_POST["duo"])) && (!empty($_POST["20"]) || !empty($_POST["30"])) && !empty($_POST["nom_card"] )&& !empty($_POST["prix"] )){
    require_once "poo_repository.php";
    require_once "poo_models.php";


    
    $nom ="'".$_POST["nom_card"]."'";
    $prix ="'".$_POST["prix"]."'";

    //Formulaire de solo et duo
    $formulaire ="";
    if (!empty($_POST["solo"])){
        $formulaire.="solo";
    if(!empty($_POST["duo"])){
        $formulaire.=";"."duo";
    }
    }
    else{
        if(!empty($_POST["duo"])){
            $formulaire.="duo";
        }
    }

    // Création erreur
    if($formulaire ==""){
        session_start();
        $_SESSION['erreur']= "Erreur";
        header("Location: php_creaBapteme.php");
        exit();
    }
    else{
        $formulaire ="'".$formulaire."'";
    }

    
    //Formulaire de horaire
    $formulaire_horaire ="";
    if (!empty($_POST["20"])){
        $formulaire_horaire.="20";
    if(!empty($_POST["30"])){
        $formulaire_horaire.=";"."30";
    }
    }
    else{
        if(!empty($_POST["30"])){
            $formulaire_horaire.="30";
        }
    }
  
    // Création erreur
    if($formulaire_horaire ==""){
        session_start();
        $_SESSION['erreur']= "Erreur";
        header("Location: php_creaBapteme.php");
        exit();

    }
    else{
        $formulaire_horaire ="'".$formulaire_horaire."'";
    }

    //Déplacement de l'image
    require_once "UID.php";
    $folder = "ImageBapteme";
    $img = $_FILES["images"]["tmp_name"];
    $uniqueFileName = UID(50);
    $destinationPath = "$folder/$uniqueFileName.png";
    move_uploaded_file($img, $destinationPath);
    $uniqueFileName="'".$uniqueFileName."'";
    
    //Modele
    $modele = new Model("bapteme");
	$Repository = new Repository($modele->getTable());
    $sql ="INSERT INTO ". $modele->getTable() ." (nom, formule, temps, prix,image) VALUES ($nom, $formulaire, $formulaire_horaire,$prix,$uniqueFileName)";
    $Repository->requete($sql);
    header("Location: php_creaBapteme.php");
    exit();

}
else {
    session_start();
    $_SESSION['erreur']= "Erreur";
    header("Location: php_creaBapteme.php");
    exit();
}



?>