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
                            if ($sauvegarde != 3) {    header("Location:php_login.php");
                                exit();}}} catch (PDOException $e) {
                                die($e->getMessage());
                            }}else{
                                header("Location:php_login.php");
                                exit();
                            }
            ?>

<form action="_ajoutEvenement.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="images">
    <input type="text" name="titre">
    <input type="date" name="date_une">
    <input type="date" name="date_deux">
    <input type="text" name="localisation">
    <input type="text" name="url">
    <input type="submit">
</form>
L'image choisi sera permanant et ne pourras pas être modifier par la suite

<?php


//Recupération POO
require_once "poo_repository.php";
require_once "poo_models.php";

//Lancement de la requete
try{

   $modele = new Model("evenement");
   $Repository = new Repository($modele->getTable());
   $sql ="SELECT * FROM ". $modele->getTable() ;
   $resultat =$Repository->requete($sql);
   foreach ($resultat as $ligne)  {
    
$img="ImagesEvenement/".$ligne["image"].".png";
$id= "'".$ligne["image"]."'"
    ?>
<a href="<?=$ligne["lien"]?>" id="url_<?=$id?>" target="_blank">
    <img src="<?=$img?>">
    <h1 id="nom_<?=$id?>"><?=$ligne["nom"]?></h1>
    <P id="localisation_<?=$id?>"><?=$ligne["lieu"]?></P>
    <P id="dateUne_<?=$id?>"><?=$ligne["date_debut"]?></P>
    <P id="dateDeux_<?=$id?>"><?=$ligne["date_fin"]?></P>
</a>
<button onclick="supprimer(<?= $id ?>)">Poubelle</button>
<button onclick="modifier(<?= $id ?>)">Modification</button>
<?php
}
   

}
catch(PDOException $e){
   die($e->getMessage());
}
require_once "UID.php";

?>
<form action="_modificationevenement.php" method="POST">
    <input type="text" name="titre" id="newtitre">
    <input type="date" name="date_une" id="newDateUne">
    <input type="date" name="date_deux" id="newDateDeux">
    <input type="text" name="localisation" id="newlocalisation">
    <input type="text" name="url" id="newurl">
    <input type="text" name="id" id="newid" style="display: none;">
    <input type="submit">
</form>
<script src="node_modules/jquery/dist/jquery.js?time=<?php echo UID(200) ?>"></script>
<script src="js/evenement.js?time=<?php echo UID(200) ?>"></script>