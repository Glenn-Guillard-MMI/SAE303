<form action="_set_up_compt.php" method="post">
    <input type="radio" id="Homme" name="genre" value="Homme" checked /><label for="Homme">Homme</label>
    <input type="radio" id="Femme" name="genre" value="Femme" /><label for="Femme">Femme</label>
    <input type="radio" id="Autre" name="genre" value="Autre" /><label for="Autre">Autre</label>
    <input type="text" name="nom" required id="nom" onkeyup="verification_nom()">
    <input type="text" name="prenom" required id='prenom' onkeyup="verification_prenom()">
    <input type="mail" name="email" required id="email" onkeyup="verification_mail()">
    <input type="text" name="num" required id="num" onkeyup="verification_num()">
    <input type="date" name="birthday" required id="birthday" onchange="Vbirthday()">
    <input type="password" name="password" required id="password" onkeyup="verification_password()">
    <input type="number" name="code_addresse" require id="code_addresse" onkeyup="verif_code()">
    <input type="text" name="physique_addresse" require id="physique_addresse" onkeyup="verif_physique()">
    <input type="submit" disabled id="push">
</form>

<script src="js/script_cree_compte.js?time=<?php require 'UID.php'; echo UID(200)?>"></script>