<?php
session_start();
if (isset($_SESSION['mail'])){
    $mail = "'".$_SESSION['mail']."'";
    require_once "poo_repository.php";
    require_once "poo_models.php";
    try {
        $modele = new Model("adherant");
    
        $exemple1 = new Repository($modele->getTable());
    
        $sql = "Select * from ".$modele->getTable()." where mail = $mail  ";
    
        $resultat = $exemple1->requete($sql);
    
        foreach ($resultat as $ligne) {

    ?>

<form action="_modification_compte.php" method="post">
    <label for="genre">Genre</label>
    <input type="radio" id="Homme" name="genre" value="Homme"
        <?php if($ligne['civilite']=="Homme"){echo "checked";} ?> /><label for="Homme">Homme</label>
    <input type="radio" id="Femme" name="genre" value="Femme"
        <?php if($ligne['civilite']=="Femme"){echo "checked";} ?> /><label for="Femme">Femme</label>
    <input type="radio" id="Autre" name="genre" value="Autre"
        <?php if($ligne['civilite']=="Autre"){echo "checked";} ?> /><label for="Autre">Autre</label>
    <br>
    <label for="Nom">Nom</label>
    <input type="text" name="nom" required id="nom" value="<?php echo $ligne['nom'] ?>" onkeyup="verification_nom()">
    <br>

    <label for="prenom">prenom</label>
    <input type="text" name="prenom" required id='prenom' value="<?php echo $ligne['prenom'] ?>"
        onkeyup="verification_prenom()">
    <br>

    <label for="email">email</label>
    <input type="mail" name="email" required id="email" value="<?php echo $ligne['mail'] ?>"
        onkeyup="verification_mail()">
    <br>

    <label for="num">num</label>
    <input type="text" name="num" required id="num" value="<?php echo $ligne['num_tel'] ?>"
        onkeyup="verification_num()">
    <br>

    <label for="birthday">birthday</label>
    <input type="date" name="birthday" required id="birthday" value="<?php echo $ligne['date_naissance'] ?>"
        onchange="Vbirthday()">
    <br>

    <label for="code_addresse">code postale</label>
    <input type="number" name="code_addresse" require id="code_addresse" value="<?php echo $ligne['code_postale'] ?>"
        onkeyup="verif_code()">
    <br>

    <label for="physique_addresse">physique_addresse</label>
    <input type="text" name="physique_addresse" require id="physique_addresse" value="<?php echo $ligne['adresse'] ?>"
        onkeyup="verif_physique()">
    <br>

    <label for="ville">ville</label>
    <input type="text" name="ville" require id="ville" value="<?php echo $ligne['ville'] ?>"
        onkeyup="verification_ville()">
    <br>

    <!-- <label for="password">password</label>
    <input type="password" name="password" required id="password" onkeyup="verification_password()">
    <br> -->
    <b>Après avoir modifier vos informations, vous serez déconnecter automatiquement</b>
    <input type="submit" id="pushe">
</form>

<?php
        }
        } catch(PDOException $e){
               die($e->getMessage());
       }

?>


<script src="js/script_cree_compte.js?time=<?php require 'UID.php'; echo UID(200)?>"></script>

<?php } 
else{
    header("Location: php_connexion.php");
}
?>