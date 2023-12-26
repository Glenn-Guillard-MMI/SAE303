<?php
//Lancement session
session_start();

//Vérification si quelq'un est connecter
if(isset($_SESSION['mail'])){
    $mail = "'".$_SESSION['mail']."'";
    require_once "poo_repository.php";
    require_once "poo_models.php";

    //Vérification si la personne est admin
    try {

        $modele = new Model("adherant");
        $exemple1 = new Repository($modele->getTable());  
        $sql = "Select autorisation from ".$modele->getTable()." where mail = $mail  ";
        $resultat = $exemple1->requete($sql);
    
        foreach ($resultat as $ligne)
        {
            if ($ligne["autorisation"] == 3){
                try {
                $sql2 = "Select * from ".$modele->getTable();
                $sql3 = "Select * from ".$modele->getTable()." where mail = $mail  ";
                $sql4 ="$sql2 EXCEPT $sql3";
                $resultat2 = $exemple1->requete($sql4);
                ?>
<table border="1px">
    <thead>
        <tr>
            <th>Nom et Prénom</th>
            <th>status</th>
            <th>Téléphone</th>
            <th>E-mail</th>
            <th>Adresse</th>
            <th>Plus d'action</th>

        </tr>
    </thead>
    <tbody>
        <?php
                foreach ($resultat2 as $ligne2)
                {

                    $mailJqierry = "'".$ligne2["mail"]."'";
                    echo "<tr id='Utilisateur_".str_replace(".","",str_replace('@','',$ligne2["mail"]))."'>";
                    echo "<td>";
                    echo $ligne2["nom"] ." ".$ligne2["prenom"];
                    echo "</td>";
                    echo "<td>";

                    
?>
        <select onchange="ModificationStatus(<?php echo $mailJqierry ?>)"
            id=<?php echo "Changement_".str_replace(".","",str_replace('@','',$ligne2["mail"])) ?>>
            <?php
                   

                    echo "<option value='adhéran'";
                    if ($ligne2["autorisation"] == 0){echo "selected";}
                    echo ">adhéran</option>";


                    echo "<option value='pilote'";
                    if ($ligne2["autorisation"] == 1){echo "selected";}
                    echo ">pilote</option>";


                    echo "<option value='staff'";
                    if ($ligne2["autorisation"] == 2){echo "selected";}
                    echo ">staff</option>";
                    echo "<option value='admin'";
                    if ($ligne2["autorisation"] == 3){echo "selected";}
                    echo ">admin</option>";

                    echo "</select>";
                 
                    echo "</td>";

                    echo "<td>";
                    echo $ligne2["num_tel"];
                    echo "</td>";

                    echo "<td>";
                    echo $ligne2["mail"];
                    echo "</td>";

                    echo "<td>";
                    echo $ligne2["adresse"]. ",".$ligne2["ville"]. ",".$ligne2["code_postale"];
                    echo "</td>";

                    echo "<td>";
                    ?>
            <button onclick="suppresion(<?php echo $mailJqierry ?>)">Sup</button>
            <?php
                    
                    echo "</td>";
                    echo "</tr>";


                }
            
                } 
                
                catch(PDOException $e){
                    die($e->getMessage());
                        }


                        ?>
    </tbody>
</table>
<?php

            }



            else{
                //Return
            }

        }
    } 

    catch(PDOException $e){
    die($e->getMessage());
        }

}
else{
    //return
}


?>
<script src="node_modules/jquery/dist/jquery.js?time=<?php require 'UID.php'; echo UID(200)?>"></script>
<script src="js/gestionnaireScript.js?time=<?php  'UID.php'; echo UID(200)?>"></script>