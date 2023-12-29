<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/connexion_compte.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <link rel="icon" href="img/SVG/logo.svg">
    <title>Connexion - ACF2L</title>
</head>

<body class="bg-body">
    <nav class="container-fluid p-3 w-100 text-white">
        <section class="row">
            <div class="col">
                <a href="#"><img class="w-100" src="img/SVG/logo.svg" alt="logo Aéro club de Frotey-les-Lure"></a>
            </div>
            <div class="col text-center mt-2">
                <a class="lien_nav text-decoration-none text-white size-2-5" href="index.php#bapteme">BAPTÈME DE L'AIR</a>
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
                        <path
                            d="M24 0v24H0V0h24ZM12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036c-.01-.003-.019 0-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.016-.018Zm.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01l-.184-.092Z" />
                        <path fill="white"
                            d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2ZM8.5 9.5a3.5 3.5 0 1 1 7 0a3.5 3.5 0 0 1-7 0Zm9.758 7.484A7.985 7.985 0 0 1 12 20a7.985 7.985 0 0 1-6.258-3.016C7.363 15.821 9.575 15 12 15s4.637.821 6.258 1.984Z" />
                    </g>
                </svg>
            </div>
        </section>
    </nav>

    <section>
        <h1 class="text-white text-center mt-5">SE CONNECTER</h1>
        <article id="background"
            class=" w-25 d-flex flex-column justify-content-center align-items-center rounded-4 mx-auto text-blue">
            <img src="img/SVG/logo.svg" alt="logo ACF2L" class="w-50 mt-4 shadow-img">
            <h2 class="text-blue size-3 mt-2">Utiliser votre compte</h2>
            <form action="_connexion_compt.php" method="post" class="d-flex flex-column mt-5">
                <label class="size-2-5">Adresse mail</label>
                <input type="mail" name="email" id="email" placeholder="ex : personne@gmail.com"
                    class="p-1 rounded-3 input_connexion w-100 size-2">
                <label class="mt-4 size-2-5">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="ex : 12a3B4_"
                    class="p-1 rounded-3 input_connexion w-100 size-2">
                <span class="d-flex flex-row mt-4 justify-content-center size-2">
                    <p>Vous n'avez pas de compte ?</p>
                    <a href="" class="text-decoration-none text-blue fw-bold">Créer un compte</a>
                </span>
                <input type="submit" value="SE CONNECTER" id="push"
                    class="size-2-5 mt-2 mb-5 text-blue w-75 mx-auto rounded-3 py-1 connexion_button text-white">
            </form>
        </article>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>