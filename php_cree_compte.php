<?php
require_once "poo_repository.php";
require_once "poo_models.php";

try {
	$modele = new Model("adherant");

	$exemple1 = new Repository($modele->getTable());

	$sql = "Select * from ".$modele->getTable().";";

	$resultat = $exemple1->requete($sql);

	foreach ($resultat as $ligne) {
		echo '<table border=\'1\' width=\'35%\'>';
		echo '<tr>';
		echo '<td>';
		echo $ligne['nom'];
		echo '</td>';
		echo '<td>';
		echo $ligne['prenom'];
		echo '</td>';
		echo '<td>';		
		echo $ligne['mail'];
		echo '</td>';	
		echo '</tr>';
		echo '</table>';
	}
	} catch(PDOException $e){
           die($e->getMessage());
   }

   ?>
<form action="_set_up_compt.php" method="post">
    <input type="text" name="nom" required id="nom" onkeyup="verification_nom()">
    <input type="text" name="prenom" required id='prenom' onkeyup="verification_prenom()">
    <input type="mail" name="email" required id="email">
    <!-- <input type="password" name="mdp"> !-->
    <input type="submit" disabled id="push">
</form>

<script src="script_cree_compte.js"></script>