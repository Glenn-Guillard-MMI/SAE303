<?php
session_start();


if (isset($_SESSION["mail"])) {
    $mail = "'" . $_SESSION["mail"] . "'";
    if (!empty($_POST["id"])) {

        require_once "poo_repository.php";
        require_once "poo_models.php";
        $id = $_POST["id"];
        $modele = new Model("r_forfait");
        $Repository = new Repository($modele->getTable());
        $sql = "INSERT INTO " . $modele->getTable() . " (mail, id) VALUES ($mail, $id);";
        $Repository->requete($sql);
        $_SESSION["message_cor"] = "Inscription valider";
        header("Location:index.php#formation2");
        exit();
    }
} else {
    $_SESSION["message_err"] = "Veuillez vous connecter pour vous inscrire";
    header("Location:index.php#formation2");
}
?>