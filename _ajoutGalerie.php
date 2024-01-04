<?php


if (!empty($_FILES["photo"]["name"]) && !empty($_POST["titre"])){

    require_once "UID.php";
    $folder = "ImagesGalerie";
    $img = $_FILES["photo"]["tmp_name"];
    $uniqueFileName = UID(50);
    $destinationPath = "$folder/$uniqueFileName.png";
    move_uploaded_file($img, $destinationPath);
    
    
    
    
    $titre = "'".$_POST["titre"]."'";
    $uniqueFileName="'".$uniqueFileName."'";

    require_once "poo_repository.php";
    require_once "poo_models.php";
    try {
        $modele = new Model("galerie");

        $exemple1 = new Repository($modele->getTable());

        $sql = "INSERT INTO " . $modele->getTable() . "(image, Titre) VALUES ( $uniqueFileName,$titre)";

        $resultat = $exemple1->requete($sql);
        header("Location: php_Galerie.php");
    exit();
    }
        
        catch (PDOException $e) {
            die($e->getMessage());
        }

}
else{
    header("Location: php_Galerie.php");
}


    ?>