<?php

//Lancement session
session_start();

//Vérification si quelq'un est connecter
if (isset($_SESSION['mail'])) {
    $mail = "'" . $_SESSION['mail'] . "'";
    require_once "poo_repository.php";
    require_once "poo_models.php";
    require_once "UID.php";

    //Vérification si la personne est admin
    try {

        $modele = new Model("adherant");
        $exemple1 = new Repository($modele->getTable());
        $sql = "Select autorisation from " . $modele->getTable() . " where mail = $mail  ";
        $resultat = $exemple1->requete($sql);

        foreach ($resultat as $ligne) {
            if ($ligne["autorisation"] == 3) {
?><table border="1px">
    <thead>
        <tr>
            <th>Nom et Prénom</th>

            <th>Licence</th>
            <th>Plus d'action</th>
        </tr>
    </thead>
    <tbody>
        <?php
   try {

    $modele2 = new Model("adherant");
    $exemple2 = new Repository($modele2->getTable());
    $sql2 = "Select * from " . $modele2->getTable() . " where licence_valid = 1  ";
    $resultat2 = $exemple2->requete($sql2);

    foreach ($resultat2 as $ligne2) {
        $mail = "'".$ligne2["mail"]."'";
        ?>
        <tr>
            <th><?php echo $ligne2["nom"]. " ". $ligne2["prenom"]?></th>
            <th> <a href="PDFlicences/<?= $ligne2["licence"] ?>.pdf" target="_blank">licence</a></th>
            <th> <button onclick="accepter(<?= $mail ?>)">Acc</button><button
                    onclick="refuser(<?= $mail ?>)">supp</button></th>
        </tr>

        <?php
 }} catch (PDOException $e) {
    die($e->getMessage());
}
?>
    </tbody>
</table>

<table border="1px">
    <thead>
        <tr>
            <th>Nom et Prénom</th>

            <th>Licence</th>
            <th>Etat</th>
        </tr>
    </thead>
    <tbody>
        <?php
  try {

    $modele3 = new Model("adherant");
    $exemple3 = new Repository($modele3->getTable());
    $sql3 = "Select * from " . $modele3->getTable() . " where licence_valid = 2 or licence_valid = 3  ";
    $resultat3 = $exemple3->requete($sql3);

    foreach ($resultat3 as $ligne3) {
        
        ?>
        <tr>
            <th><?php echo $ligne3["nom"]. " ". $ligne3["prenom"]?></th>
            <th> <a href="PDFlicences/<?= $ligne3["licence"] ?>.pdf" target="_blank">licence</a></th>
            <th> <?php if($ligne3["licence_valid"] == 2){ echo "<p> validé </p>";} ?><?php if($ligne3["licence_valid"] == 3){ echo "<p>Refusée</p>";} ?>
            </th>
        </tr>



        <?php
}} catch (PDOException $e) {
    die($e->getMessage());
}
}}} catch (PDOException $e) {
    die($e->getMessage());
}} else {
    header("Location:php_login.php");
}
?>
        <script src="node_modules/jquery/dist/jquery.js?time=<?php
                                                            echo UID(200) ?>"></script>
        <script src="js/_AccETrefus.js?time=<?php
                                                            echo UID(200) ?>""></script>