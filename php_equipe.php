<?php
            //Lancement session
            session_start();

            //Vérification si quelq'un est connecter
            if (isset($_SESSION['mail'])) {
                $mail = "'" . $_SESSION['mail'] . "'";
                require_once "poo_repository.php";
                require_once "poo_models.php";
                try {
                    $modele = new Model("adherant");

                    $exemple1 = new Repository($modele->getTable());

                    $sql = "Select * from " . $modele->getTable() . " where mail = $mail  ";

                    $resultat = $exemple1->requete($sql);

                    foreach ($resultat as $ligne) {
                        $sauvegarde = $ligne["autorisation"];
                        if ($sauvegarde != 3) {
                            header("Location:php_login.php");
                            exit();
                        }
                    }
                } catch (PDOException $e) {
                    die($e->getMessage());
                }
            } else {
                header("Location:php_login.php");
                exit();
            }
            ?>



<form action="_creationequipe.php" enctype="multipart/form-data" method="POST">
    <input type="file" name="images" accept="image/*">
    <input type="text" name="nom">
    <input type="text" name="prenom">
    <input type="text" name="fonction">
    <input type="submit">
</form>


<?php

try {
    $modele = new Model("equipe");

    $exemple1 = new Repository($modele->getTable());

    $sql = "Select * from " . $modele->getTable();

    $resultat = $exemple1->requete($sql);

    foreach ($resultat as $ligne2) {
       $img = $ligne2['image'];
       $id = "'".$img."'";
       $idModification = $ligne2['id'];
       ?>

<h1 id='nom_<?=$idModification?>'><?=$ligne2['nom']?></h1>
<p id='prenom_<?=$idModification?>'><?=$ligne2['prenom']?></p>
<p id='fonction_<?=$idModification?>'><?=$ligne2['fonction']?></p>
<img src="ImagesEquipe/<?=$img?>.png">
<button onclick="supprimeequipe(<?=$id ?>)">sup</button>
<button onclick="modifequipe(<?= $idModification ?>)">modifier</button>
<?php


    }
} catch (PDOException $e) {
    die($e->getMessage());
}

require "UID.php"
?>

<form action="_modificationequipe.php" method="POST">
    <input type="text" name="nom" id="newnom">
    <input type="text" name="prenom" id="newprenom">
    <input type="text" name="fonction" id="newfonction">
    <input type="hidden" name="id" id="id">
    <input type="submit">
</form>
<script src="node_modules/jquery/dist/jquery.js?time=<?php echo UID(200) ?>"></script>
<script src="js/equipe.js?time=<?php echo UID(200) ?>"></script>