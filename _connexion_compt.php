<?php
if(!empty($_POST["email"]) and !empty($_POST["password"])){

    require_once "poo_repository.php";
    require_once "poo_models.php";

    $password = ($_POST["password"]);
    $email = "'".($_POST["email"])."'";

    $modele = new Model("adherant");
	$exemple1 = new Repository($modele->getTable());
	$sql = "Select * from ".$modele->getTable()." where mail = $email;";
	$resultat = $exemple1->requete($sql);
    $mail_co=false;

    foreach ($resultat as $ligne) {
        $mail_co = true;
        if ($mail_co) {
            $recup_pass = $ligne['mdp'];
        }
	}

    if($mail_co){
        if(password_verify($password,$recup_pass))
    {
        session_start();
        $_SESSION['mail'] = $_POST["email"];
        header("Location: index.html");

    }
        else{header("Location: php_connexion.php");}
    }
    else {
    header("Location: php_connexion.php");
    
    }

}
else{
    header("Location: php_connexion.php");
    
}

?>