<form action="_ajoutGalerie.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="photo">
    <input type="text" name="titre">
    <input type="submit">
</form>

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


<?php
 try {
     $modele2 = new Model("galerie");
     $exemple2 = new Repository($modele2->getTable());
     $sql2 = "SELECT * FROM " . $modele2->getTable(); 
     $resultat2 = $exemple2->requete($sql2);
     foreach ($resultat2 as $ligne2) {
$img = $ligne2["image"];
$alt =$ligne2["Titre"];
$id="'".$img."'"
        ?>
<img src="ImagesGalerie/<?=$img?>.png" alt="<?=$alt?>">
<button onclick="supprime(<?=$id?>)">Supp</button>

<?php
     }
 }
     
     catch (PDOException $e) {
         die($e->getMessage());
     }
require_once "UID.php"
?>
<script src="node_modules/jquery/dist/jquery.js?time=<?php echo UID(200) ?>"></script>
<script src="js/galerie.js?time=<?php echo UID(200) ?>"></script>