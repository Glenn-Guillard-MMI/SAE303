<?php

session_start();


if (isset($_SESSION["mail"])) {
    $mail = "'" . $_SESSION["mail"] . "'";
    if (!empty($_POST["type"]) and !empty($_POST["commentaire"])) {

        if (!empty($_POST["star-5"])) {
            $note = 1;
        } elseif (!empty($_POST["star-4"])) {
            $note = 2;
        } elseif (!empty($_POST["star-3"])) {
            $note = 3;
        } elseif (!empty($_POST["star-2"])) {
            $note = 4;
        } elseif (!empty($_POST["star-1"])) {
            $note = 5;
        } else {
            $_SESSION["message_err"] = "Veuillez saisir une note";
            header("Location:index.php#avis");
        }
        require_once "poo_repository.php";
        require_once "poo_models.php";
        $type = htmlspecialchars($_POST["type"]);
        $commentaire = htmlspecialchars($_POST["commentaire"]);
        $type = "'" . $type . "'";
        $commentaire = "'" . $commentaire . "'";
        try {
            $modele = new Model("adherant");
            $exemple = new Repository($modele->getTable());
            $sql = "SELECT * FROM  " . $modele->getTable() . " WHERE (mail) = ($mail);";
            $resultat = $exemple->requete($sql);
            foreach ($resultat as $ligne) {
                $nom = $ligne["nom"];
                $prenom = $ligne["prenom"];
                $nom = "'" . $nom . "'";
                $prenom = "'" . $prenom . "'";
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        $modele2 = new Model("avis");
        $Repository = new Repository($modele2->getTable());
        $sql2 = "INSERT INTO " . $modele2->getTable() . " (type, prenom, nom, note, commentaire) VALUES ($type, $prenom, $nom, $note , $commentaire);";
        $Repository->requete($sql2);
        $_SESSION["message_cor"] = "Avis envoyé";
        header("Location:index.php#avis");
        exit();
    }
    $_SESSION["message_err"] = "Un champ n'a pas été remplis au moment de la saisie";
    header("Location:index.php#avis");
} else {
    $_SESSION["message_err"] = "Veuillez vous connecter pour laisser un avis";
    header("Location:index.php#avis");
}
?>