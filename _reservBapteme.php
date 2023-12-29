<?php
session_start();


if (isset($_SESSION["mail"])) {
    $mail = "'" . $_SESSION["mail"] . "'";
    if (!empty($_POST["temps"]) and !empty($_POST["date"]) and !empty($_POST["heure"]) and !empty($_POST["formule"]));
    require_once "poo_repository.php";
    require_once "poo_models.php";
    $date_j = $_POST["date"];
    $date_h = $_POST["heure"];
    $temps_presta = $_POST["temps"];
    $formule = $_POST["formule"];
    $nom = $_POST["nom"];
    $nom = "'" . $nom . "'";
    $formule = "'" . $formule . "'";
    $date_j = "'" . $date_j . "'";
    $date_h = "'" . $date_h . "'";
    $modele = new Model("reservation");
	$Repository = new Repository($modele->getTable());
    $sql ="INSERT INTO ". $modele->getTable() ." (mail, nom, date_j, date_h, temps_presta, formule) VALUES ($mail, $nom, $date_j , $date_h , $temps_presta, $formule);";
    $Repository->requete($sql);
    $_SESSION["message_cor"] = "Reservation valider";
    header("Location:index.php#margin_top_bapteme");
    exit();
} else {
    $_SESSION["message_err"] = "Veuillez vous connecter pour réserver";
    header("Location:index.php#margin_top_bapteme");
}
?>