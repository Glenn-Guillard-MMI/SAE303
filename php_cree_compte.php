<form action="_set_up_compt.php" method="post">
    <label for="genre">Genre</label>
    <input type="radio" id="Homme" name="genre" value="Homme" checked /><label for="Homme">Homme</label>
    <input type="radio" id="Femme" name="genre" value="Femme" /><label for="Femme">Femme</label>
    <input type="radio" id="Autre" name="genre" value="Autre" /><label for="Autre">Autre</label>
    <br>
    <label for="Nom">Nom</label>
    <input type="text" name="nom" required id="nom" onkeyup="verification_nom()">
    <br>

    <label for="prenom">prenom</label>
    <input type="text" name="prenom" required id='prenom' onkeyup="verification_prenom()">
    <br>

    <label for="email">email</label>
    <input type="mail" name="email" required id="email" onkeyup="verification_mail()">
    <br>

    <label for="num">num</label>
    <input type="text" name="num" required id="num" onkeyup="verification_num()">
    <br>

    <label for="birthday">birthday</label>
    <input type="date" name="birthday" required id="birthday" onchange="Vbirthday()">
    <br>

    <label for="code_addresse">code postale</label>
    <input type="number" name="code_addresse" require id="code_addresse" onkeyup="verif_code()">
    <br>

    <label for="physique_addresse">physique_addresse</label>
    <input type="text" name="physique_addresse" require id="physique_addresse" onkeyup="verif_physique()">
    <br>

    <label for="ville">ville</label>
    <input type="text" name="ville" require id="ville" onkeyup="verification_ville()">
    <br>

    <label for="password">password</label>
    <input type="password" name="password" required id="password" onkeyup="verification_password()">
    <br>

    <input type="submit" disabled id="push">
</form>

<script src="js/script_cree_compte.js?time=<?php require 'UID.php'; echo UID(200)?>"></script>