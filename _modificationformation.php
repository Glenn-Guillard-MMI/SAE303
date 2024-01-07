<?php
require_once "poo_repository.php";
require_once "poo_models.php";

if (!empty($_POST["prix"]) and !empty($_POST["nom"] and !empty($_POST["titre_0"]))) {
    $nom = "'" . $_POST["nom"] . "'";
    $prix = $_POST["prix"];
    $id = $_POST["id"];
    
    $n = 0;
    $a = 1;
    $des = "";
    while (!empty($_POST["titre_" . $n])) {
        $des .= $_POST["titre_" . $n];
        $n++;

        if (!empty($_POST["titre_" . $a])) {
            $des .= ";";
            $a++;
        }
    }

    $des = "'" . $des . "'";

    try {
        $modele = new Model("formation");
        $Repository = new Repository($modele->getTable());
        $sql = "UPDATE " . $modele->getTable() . " SET nom = $nom, description = $des, prix = $prix where id = $id";
        $Repository->requete($sql);
        header('location: php_offre.php');

    } catch (PDOException $e) {
        die($e->getMessage());
    }


} else
    echo "Error";

?>