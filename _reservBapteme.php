<?php
session_start();


if (isset($_SESSION["mail"])) {
    $mail = "'" . $_SESSION["mail"] . "'";
    if (!empty($_POST["temps"]) and !empty($_POST["date"]) and !empty($_POST["heure"]) and !empty($_POST["formule"])) {

        require_once "poo_repository.php";
        require_once "poo_models.php";
        $date_j = $_POST["date"];
        $date_h = $_POST["heure"];
        $temps_presta = $_POST["temps"];
        $formule = $_POST["formule"];
        $id = $_POST["id"];
        $formule = "'" . $formule . "'";
        $date_j = "'" . $date_j . "'";
        $date_h = "'" . $date_h . "'";
        $date_crea = "'" . date("Y-m-d H:i:s") . "'";   
        $modele = new Model("reservation");
        $Repository = new Repository($modele->getTable()); 
        $sql = "INSERT INTO " . $modele->getTable() . " (mail, matricule, id, date_j, date_h, date_crea, temps_presta, formule) VALUES ($mail, '', $id, $date_j, $date_h, $date_crea, $temps_presta, $formule);";
        $Repository->requete($sql);
        $_SESSION["message_cor"] = "Reservation validée";
        header("Location:index.php#margin_top_bapteme");
        exit();
    }
} else {
    $_SESSION["message_err"] = "Veuillez vous connecter pour réserver";
    header("Location:index.php#margin_top_bapteme");
}
?>