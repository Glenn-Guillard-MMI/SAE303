<?php
require_once "poo_repository.php";
require_once "poo_models.php";

if (!empty($_POST["prix"])) {
    $nom = "'" . $_POST["nom"] . "'";
    $prix = $_POST["prix"];

    $formule = "";
    if (!empty($_POST["solo"]) or !empty($_POST["duo"])) {
        if (!empty($_POST["solo"])) {
            $formule .= "solo";
            if (!empty($_POST["duo"])) {
                $formule .= ";" . "duo";
            }
        } else
            if (!empty($_POST["duo"])) {
                $formule .= "duo";
            }
    } else
        header('location: php_offre.php');


    $temps = "";
    if (!empty($_POST["30"]) or !empty($_POST["20"])) {
        if (!empty($_POST["20"])) {
            $temps .= "20";
            if (!empty($_POST["30"])) {
                $temps .= ";" . "30";
            }
        } else
            if (!empty($_POST["30"])) {
                $temps .= "30";
            }
    } else
        header('location: php_offre.php');

    try {
        $formule = "'" . $formule . "'";
        $temps = "'" . $temps . "'";
        $modele = new Model("bapteme");
        $Repository = new Repository($modele->getTable());
        $sql = "UPDATE " . $modele->getTable() . " SET formule = $formule, temps = $temps, prix = $prix where nom = $nom";
        $Repository->requete($sql);
        header("Location: php_offre.php");

    } catch (PDOException $e) {
        die($e->getMessage());
    }


} else
    header('location: php_offre.php');

?>