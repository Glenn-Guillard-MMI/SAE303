<?php
session_start();


if (isset($_SESSION["mail"])) {
    $mail = "'" . $_SESSION["mail"] . "'";
    if (!empty($_POST["id"])) {

        require_once "poo_repository.php";
        require_once "poo_models.php";
        $id = $_POST["id"];
        $date_crea = "'" . date("Y-m-d H:i:s") . "'";   
        $modele = new Model("r_formation");
        $Repository = new Repository($modele->getTable());
        $sql = "INSERT INTO " . $modele->getTable() . " (mail, id, date_crea) VALUES ($mail, $id, $date_crea);";
        $Repository->requete($sql);
        $_SESSION["message_cor"] = "Inscription validée";
        header("Location:index.php#container_formation");
        exit();
    }
} else {
    $_SESSION["message_err"] = "Veuillez vous connecter pour vous inscrire";
    header("Location:index.php#container_formation");
}
?>