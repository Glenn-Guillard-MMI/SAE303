<!--

  Copyright by Thomas Henry, Valentin Lamour, Jérôme Fabre et Glenn Guillard.
  Tous droits réservés sur le site par ces membres.

-->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/crea_compte.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="node_modules/jquery/dist/jquery.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">
    <link rel="icon" href="img/SVG/logo.svg">
    <title>ACF2L - Création compte</title>
</head>
<?php
session_start();

//Vérification si quelqu'un est connecter
if (isset($_SESSION['mail'])) {

    header("Location:php_login.php");
    exit();
}
?>

<body class="bg-body overflow-x-hidden mb-5">
    <nav class="container-fluid p-3 w-100 text-white">
        <section class="row">
            <div class="col">
                <a href="index.php"><img class="w-100" src="img/SVG/logo.svg" alt="logo Aéro club de Frotey-les-Lure"></a>
            </div>
            <div class="col text-center mt-2">
                <a class="lien_nav text-decoration-none text-white" href="index.php#bapteme">BAPTÈME DE L'AIR</a>
            </div>
            <div class="col text-center mt-2">
                <a class="lien_nav text-decoration-none text-white" href="index.php#container_formation">FORMATIONS</a>
            </div>
            <div class="col text-center mt-2">
                <a class="lien_nav text-decoration-none text-white" href="index.php#forfait">FORFAITS</a>
            </div>
            <div class="col text-center mt-2">
                <a class="lien_nav text-decoration-none text-white" href="index.php#propos">À PROPOS</a>
            </div>
            <div class="col text-center mt-2">
                <a class="lien_nav text-decoration-none text-white" href="index.php#event">ÉVÉNEMENTS</a>
            </div>
            <div class="col text-center mt-2">
                <a class="lien_nav text-decoration-none text-white" href="index.php#galerie">GALERIE</a>
            </div>
            <div class="col text-center mt-2">
                <a class="lien_nav text-decoration-none text-white" href="index.php#contact">CONTACT</a>
            </div>
            <div class="col text-center">
                <svg id="account" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24">
                    <g fill="none" fill-rule="evenodd">
                        <path d="M24 0v24H0V0h24ZM12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036c-.01-.003-.019 0-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.016-.018Zm.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01l-.184-.092Z" />
                        <path fill="white" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2ZM8.5 9.5a3.5 3.5 0 1 1 7 0a3.5 3.5 0 0 1-7 0Zm9.758 7.484A7.985 7.985 0 0 1 12 20a7.985 7.985 0 0 1-6.258-3.016C7.363 15.821 9.575 15 12 15s4.637.821 6.258 1.984Z" />
                    </g>
                </svg>
            </div>
        </section>
    </nav>

    <h1 class="text-white text-center mt-3">S'INSCRIRE</h1>

    <form action="_set_up_compt.php" method="post" class="mx-auto text-blue">

        <div class="mt-5 background rounded-4 pt-3 pb-3" id="card1">
            <section class="w-75 mx-auto d-flex flex-column">
                <img src="img/SVG/logo.svg" alt="logo aero club" class="w-75 shadow-img mx-auto">
                <h3 class="text-center mt-3">Informations Personnelles</h3>
                <label for="genre" class="mt-3 fs-5">Civilité</label>
                <div class="d-flex justify-content-between w-75">
                    <div>
                        <input type="radio" id="Homme" name="genre" value="Homme" checked />
                        <label for="Homme">Homme</label>
                    </div>
                    <div>
                        <input type="radio" id="Femme" name="genre" value="Femme" />
                        <label for="Femme">Femme</label>
                    </div>
                    <div>
                        <input type="radio" id="Autre" name="genre" value="Autre" />
                        <label for="Autre">Autre</label>
                    </div>
                </div>

                <label for="prenom" class="mt-3 fs-5">Prénom</label>
                <input placeholder="ex : Glenn" type="text" name="prenom" required id='prenom' onkeyup="verification_prenom()" class="rounded-3 input-custom p-1">

                <label for="Nom" class="mt-3 fs-5">Nom</label>
                <input placeholder="ex : Guillard" type="text" name="nom" required id="nom" onkeyup="verification_nom()" class="rounded-3 input-custom p-1">

                <label for="birthday" class="mt-3 fs-5">Date de naissance</label>
                <input type="date" name="birthday" required id="birthday" onchange="Vbirthday()" class="rounded-3 input-custom p-1">
                <span class="d-flex flex-row justify-content-around mt-4">
                    <p>Vous avez déjà un compte ?</p>
                    <a href="php_connexion.php" class="text-decoration-none fw-bold text-blue">Connecter vous</a>
                </span>
                <div class="d-grid justify-content-end">
                    <p onclick="card2()" class="button_suivant mt-3 text-white px-2 py-1 rounded-2">Suivant</p>
                </div>
            </section>
        </div>

        <div class="mt-5 background rounded-4 pt-3 pb-3" id="card2">
            <section class="w-75 mx-auto d-flex flex-column">
                <img src="img/SVG/logo.svg" alt="logo aero club" class="w-75 shadow-img mx-auto">
                <h3 class="text-center mt-3">Coordonnées</h3>
                <label for="physique_addresse" class="mt-3 fs-5">Adresse</label>
                <input placeholder="ex : 13 place de la mairie" class="rounded-3 input-custom p-1" type="text" name="physique_addresse" require id="physique_addresse" onkeyup="verif_physique()">

                <label for="code_addresse" class="mt-3 fs-5">Code postale</label>
                <input placeholder="ex : 70200" class="rounded-3 input-custom p-1" type="number" name="code_addresse" require id="code_addresse" onkeyup="verif_code()">

                <label for="ville" class="mt-3 fs-5">Ville</label>
                <input placeholder="ex : Frotey-lès-Lure" class="rounded-3 input-custom p-1" type="text" name="ville" require id="ville" onkeyup="verification_ville()">

                <label for="email" class="mt-3 fs-5">E-mail</label>
                <input placeholder="ex : exemple@gmail.com" class="rounded-3 input-custom p-1" type="mail" name="email" required id="email" onkeyup="verification_mail()">

                <label for="num" class="mt-3 fs-5">Téléphone</label>
                <input placeholder="ex : 01 23 45 67 89" class="rounded-3 input-custom p-1" type="text" name="num" required id="num" onkeyup="verification_num()">
            </section>
            <div class="d-flex justify-content-around flex-row mt-2">
                <button onclick="return_card1()" class="button_return bg-white mt-3 text-blue px-2 py-1 rounded-2">Retour</button>
                <button onclick="card3()" class="button_suivant mt-3 text-white px-2 py-1 rounded-2">Suivant</button>
            </div>
        </div>

        <div class="mt-5 background rounded-4 pt-3 pb-3" id="card3">
            <section class="w-75 mx-auto d-flex flex-column">
                <img src="img/SVG/logo.svg" alt="logo aero club" class="w-75 shadow-img mx-auto">
                <h3 class="text-center mt-3">Sécurité</h3>
                <p>Créez un mot de passe sécurisé avec des lettres, des chiffres et des symboles.</p>
                <label for="password" class="mt-3 fs-5">Mot de passe</label>
                <input class="rounded-3 input-custom p-1" type="password" name="password" required id="password" onkeyup="verification_password()">

                <label for="password" class="mt-3 fs-5">Confirmation mot de passe</label>
                <input class="rounded-3 input-custom p-1" type="password" name="password2" required id="password_double" onkeyup="verification_double_password()">

                <div class="d-flex justify-content-around flex-row mt-2">
                    <button onclick="return_card2()" class="button_return bg-white mt-3 text-blue px-2 py-1 rounded-2">Retour</button>
                    <input type="submit" disabled id="push" value="S'inscrire" class="button_inscri mt-3 text-white px-2 py-1 rounded-2">
                </div>
            </section>
        </div>
    </form>

    <script src="js/script_cree_compte.js?time=<?php require 'UID.php';
                                                echo UID(200) ?>"></script>
</body>

</html>