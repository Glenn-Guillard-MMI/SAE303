<?php
if (!isset($_COOKIE['ACF2L'])) {
$arr_cookie_options = array (
                'expires' => time() + 60*60*24*30, 
                'path' => '/', 
                'secure' => false,     // or false
                'httponly' => true,    // or false
                );
setcookie('ACF2L', 'vu', $arr_cookie_options);  



$date = "'".date("Y-m")."'";
require_once "poo_repository.php";
require_once "poo_models.php";
try {
    $modele = new Model("vu");
    $exemple1 = new Repository($modele->getTable());
    $sql = "Select sum(compteur) from " . $modele->getTable() . " where date = $date  ";
    $resultat = $exemple1->requete($sql);

    foreach ($resultat as $ligne) { 
          if ($ligne["sum(compteur)"] == ""){
            try {
                $modele2 = new Model("vu");
                $exemple2 = new Repository($modele2->getTable());
                $sql2 = "INSERT INTO " . $modele2->getTable() . " VALUE ($date, 1)  ";
                $exemple2->requete($sql2);}
                catch (PDOException $e) {
                    die($e->getMessage());
                }
          }
          else{
            try {
                $newCompteur = $ligne["sum(compteur)"] + 1;
                $modele3 = new Model("vu");
                $exemple3 = new Repository($modele3->getTable());
                $sql3 = "UPDATE " . $modele3->getTable() . " SET compteur = $newCompteur where date = $date";
                $exemple3->requete($sql3);}
                catch (PDOException $e) {
                    die($e->getMessage());
                }
          };          
        }
        } catch (PDOException $e) {
                die($e->getMessage());
            }



header('location: index.php');
} else {
    header('location: index.php');
}
?>