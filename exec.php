<?php
require_once "poo_repository.php";
require_once "poo_models.php";

try {
	$modele = new Model("personne");

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
		echo $ligne['adresse'];
		echo '</td>';
		echo '<td>';		
		echo $ligne['tel'];
		echo '</td>';	
		echo '</tr>';
		echo '</table>';
	}
	} catch(PDOException $e){
           die($e->getMessage());
   }