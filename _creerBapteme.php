<?php


if ((!empty($_POST["formule"]) || !empty($_POST["formule1"])) && (!empty($_POST["temps"]) || !empty($_POST["temps1"])) && !empty($_POST["nom"]) && !empty($_POST["prix"])) {
    require_once "poo_repository.php";
    require_once "poo_models.php";



    $nom = "'" . $_POST["nom"] . "'";
    $prix = $_POST["prix"];

    //Formulaire de solo et duo
    //Formulaire de solo et duo
    $formulaire = "";
    if (!empty($_POST["formule"])) {
        $formulaire .= "solo";
        if (!empty($_POST["formule1"])) {
            $formulaire .= ";duo";
        }
    } else {
        if (!empty($_POST["formule1"])) {
            $formulaire .= "duo";
        }
    }
    $formulaire = "'" . $formulaire . "'";


    //Formulaire de horaire
    $formulaire_horaire = "";
    if (!empty($_POST["temps"])) {
        $formulaire_horaire .= "20";
        if (!empty($_POST["temps1"])) {
            $formulaire_horaire .= ";30";
        }
    } else {
        if (!empty($_POST["temps1"])) {
            $formulaire_horaire .= "30";
        }
    }
    $formulaire_horaire = "'" . $formulaire_horaire . "'";

    //Déplacement de l'image
    require_once "UID.php";
    $folder = "ImageBapteme";
    $img = $_FILES["image"]["tmp_name"];
    $uniqueFileName = UID(50);
    $destinationPath = "$folder/$uniqueFileName.png";
    move_uploaded_file($img, $destinationPath);
    $uniqueFileName = "'" . $uniqueFileName . "'";

    //Modele
    $modele = new Model("bapteme");
    $Repository = new Repository($modele->getTable());
    $sql = "INSERT INTO " . $modele->getTable() . " (nom, formule, temps, prix, image) VALUES ($nom, $formulaire, $formulaire_horaire, $prix, $uniqueFileName)";
    $Repository->requete($sql);
    header("Location: php_offre.php");
    exit();

} else {
    session_start();
    $_SESSION['erreur'] = "Erreur";
    header("Location: php_offre.php");
    exit();
}



?>