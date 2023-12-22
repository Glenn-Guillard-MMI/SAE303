<form action="_crerBapteme.php" method="POST" enctype='multipart/form-data'>
    <input type="file" name="images" accept="image/png, image/jpeg" id="img" onchange="VerifImage()">
    <input type="text" id="name" name="nom_card" onkeyup="VerifName()">
    <input type="checkbox" id="solo" name="solo" onchange="VerifCheckboxFormule()"><label for="solo">Solo</label>
    <input type="checkbox" id="duo" name="duo" onchange="VerifCheckboxFormule()"><label for="duo">Duo</label>
    <input type="checkbox" id="20" name="20" onchange="temps()"><label for="20">20 minute</label>
    <input type="checkbox" id="30" name="30" onchange="temps()"><label for="30">30 minute</label>
    <input type="number" id="num" name="prix" require onkeyup="VerifCheckboxtemps()" step="any">
    <input type="submit" disabled id="submit">
</form>
<?php
session_start();
if(isset($_SESSION['erreur'])){
?>
<p><?php echo ($_SESSION['erreur']); ?></p>

<?php 
unset($_SESSION['erreur']);
}?>


<script src="js/_crerBapteme.js?time=<?php require 'UID.php'; echo UID(200)?>"></script>