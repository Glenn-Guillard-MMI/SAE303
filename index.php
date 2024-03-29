<!--

  Copyright by Thomas Henry, Valentin Lamour, Jérôme Fabre et Glenn Guillard.
  Tous droits réservés sur le site par ces membres.

-->
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css?time=<?php require 'UID.php';
  echo UID(200) ?>">
  <link rel="stylesheet" href="css/index.css?time=<?php echo UID(200) ?>">
  <link rel="stylesheet" href="css/media.css?time=<?php echo UID(200) ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="node_modules/jquery/dist/jquery.js"></script>

  <link
    href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap"
    rel="stylesheet">
  <link rel="icon" href="img/SVG/logo.svg">
  <title>ACF2L</title>
</head>

<body class="bg-body overflow-x-hidden">
  <div id="depart_avion"></div>
  <nav id="nav-ordi" class="container-fluid p-3 w-100 text-white">
    <section class="row">
      <div class="col">
        <a href="#"><img class="w-100" src="img/SVG/logo.svg" alt="logo Aéro club de Frotey-les-Lure"></a>
      </div>
      <div class="col text-center mt-2">
        <a class="lien_nav text-decoration-none text-white" href="#bapteme">BAPTÈME DE L'AIR</a>
      </div>
      <div class="col text-center mt-2">
        <a class="lien_nav text-decoration-none text-white" href="#container_formation">FORMATIONS</a>
      </div>
      <div class="col text-center mt-2">
        <a class="lien_nav text-decoration-none text-white" href="#forfait">FORFAITS</a>
      </div>
      <div class="col text-center mt-2">
        <a class="lien_nav text-decoration-none text-white" href="#propos">À PROPOS</a>
      </div>
      <div class="col text-center mt-2">
        <a class="lien_nav text-decoration-none text-white" href="#event">ÉVÉNEMENTS</a>
      </div>
      <div class="col text-center mt-2">
        <a class="lien_nav text-decoration-none text-white" href="#galerie">GALERIE</a>
      </div>
      <div class="col text-center mt-2">
        <a class="lien_nav text-decoration-none text-white" href="#contact">CONTACT</a>
      </div>
      <div class="col text-center">
        <a href="php_login.php">
          <svg id="account" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24">
            <g fill="none" fill-rule="evenodd">
              <path
                d="M24 0v24H0V0h24ZM12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036c-.01-.003-.019 0-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.016-.018Zm.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01l-.184-.092Z" />
              <path fill="white"
                d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2ZM8.5 9.5a3.5 3.5 0 1 1 7 0a3.5 3.5 0 0 1-7 0Zm9.758 7.484A7.985 7.985 0 0 1 12 20a7.985 7.985 0 0 1-6.258-3.016C7.363 15.821 9.575 15 12 15s4.637.821 6.258 1.984Z" />
            </g>
          </svg>
        </a>
      </div>
    </section>
  </nav>
  <div id="nav-responsive" class="d-none position-fixed w-100">
    <nav id="nav-responsive-balise" class="p-3 w-100 text-white overflow-hidden">
      <i onclick="derouleNav()" class="fas fa-bars text-white"></i>
      <section id="lien_menu" class="flex-column justify-content-around">
        <div class="text-center mt-2">
          <a class="lien_nav text-decoration-none text-white text-lien px-4 py-2" href="#">Accueil</a>
        </div>
        <div class="text-center mt-2">
          <a class="lien_nav text-decoration-none text-white text-lien px-4 py-2" href="#bapteme">BAPTÈME DE L'AIR</a>
        </div>
        <div class="text-center mt-2">
          <a class="lien_nav text-decoration-none text-white text-lien px-4 py-2"
            href="#container_formation">FORMATIONS</a>
        </div>
        <div class="text-center mt-2">
          <a class="lien_nav text-decoration-none text-white text-lien px-4 py-2" href="#forfait">FORFAITS</a>
        </div>
        <div class="text-center mt-2">
          <a class="lien_nav text-decoration-none text-white text-lien px-4 py-2" href="#propos">À PROPOS</a>
        </div>
        <div class="text-center mt-2">
          <a class="lien_nav text-decoration-none text-white text-lien px-4 py-2" href="#event">ÉVÉNEMENTS</a>
        </div>
        <div class="text-center mt-2">
          <a class="lien_nav text-decoration-none text-white text-lien px-4 py-2" href="#galerie">GALERIE</a>
        </div>
        <div class="text-center mt-2">
          <a class="lien_nav text-decoration-none text-white text-lien px-4 py-2" href="#contact">CONTACT</a>
        </div>
        <div class="text-center mt-2">
          <a class="lien_nav text-decoration-none text-white text-lien px-4 py-2" href="php_login.php">Compte</a>
        </div>
    </nav>
  </div>
  <?php
  if (!isset($_COOKIE['ACF2L'])) {
    ?>
    <section id="cookie" class="position-fixed w-25 rounded-4">
      <article class="size-2 p-3">
        Ce site utilise des cookies, le fait de ne pas consentir ou de retirer son consentement peut avoir un effet
        négatif sur certaines caractéristiques et fonctions.
      </article>
      <form class="d-flex justify-content-around pb-2" action="_cookie.php">
        <p onclick="retirer()"
          class="button-cookie-css text-center button_cookie_refus px-2 rounded-5 d-inline-flex justify-content-center align-items-center"
          type="button">Tout refuser</p>
        <p onclick="accepter()" class="button-cookie-css button-cookie text-center px-2 text-white rounded-5"
          type="button">Tout
          accepter</p>
      </form>
    </section>
  <?php } ?>

  <section id="backToTop">
    <a href="#"><img id="fleche_haut" src="img/SVG/back_to_top.svg" alt="bouton remonte en haut de la page"></a>
  </section>

  <section id="bienvenue" class="d-flex flex-column justify-content-center align-items-center m-4">
    <h1 class="text-white">Bienvenue</h1>
    <article id="font-local-header" class="text-white size-2-5 font">à l'Aéro Club de Frotey-les-Lure</article>
  </section>
  <div id="container_avion">
    <img id="avion_helice" src="img/avion.gif" alt="gif de l'animation de l'avion">
  </div>

  <section id="nuage_haut_head" class="z-3 position-relative">
    <img class="w-100" src="img/SVG/nuage2fin.svg" alt="">
  </section>

  <section class="bg-white hauteur text-dark z-3 position-relative">
    <h3 id="meteo-titre" class="text-center font color_meteo size-3 mb-4">Météo à Frotey-les-Lure</h3>
    <article id="container-meteo"
      class="px-1 bg-body w-75 h-75 m-auto rounded-4 font meteo d-flex flex-row justify-content-around align-items-center text-white">
      <div id="jour1" class="h-100 pt-4 d-flex align-content-center justify-content-around flex-column">
        <p id="date0" class="text-center fw-bold"></p>
        <div class="">
          <img id="meteo0" class="meteo_img" src="img/meteo/Rain.png" alt="">
        </div>
        <p id="temp0" class="text-center mt-5 fw-medium"></p>
        <p id="temperature0" class="text-center fs-1"></p>
      </div>
      <div id="jour2" class="h-100 pt-4 d-flex align-content-center justify-content-around flex-column">
        <p id="date1" class="text-center fw-bold"></p>
        <div class=""><img id="meteo1" class="meteo_img" src="img/meteo/Rain.png" alt=""></div>
        <p id="temp1" class="text-center mt-5 fw-medium"></p>
        <p id="temperature1" class="text-center fs-1"></p>
      </div>
      <div id="jour3" class="h-100 pt-4 d-flex align-content-center justify-content-around flex-column">
        <p id="date2" class="text-center fw-bold"></p>
        <div class=""><img id="meteo2" class="meteo_img" src="img/meteo/Rain.png" alt=""></div>
        <p id="temp2" class="text-center mt-5 fw-medium"></p>
        <p id="temperature2" class="text-center fs-1"></p>
      </div>
      <div id="jour4" class="h-100 pt-4 d-flex align-content-center justify-content-around flex-column">
        <p id="date3" class="text-center fw-bold"></p>
        <div class=""><img id="meteo3" class="meteo_img" src="img/meteo/Rain.png" alt=""></div>
        <p id="temp3" class="text-center mt-5 fw-medium"></p>
        <p id="temperature3" class="text-center fs-1"></p>
      </div>
      <div id="jour5" class="h-100 pt-4 d-flex align-content-center justify-content-around flex-column">
        <p id="date4" class="text-center fw-bold"></p>
        <div class="">
          <img id="meteo4" class="meteo_img" src="img/meteo/Rain.png" alt="">
        </div>
        <p id="temp4" class="text-center mt-5 fw-medium"></p>
        <p id="temperature4" class="text-center fs-1"></p>
      </div>
      <div id="jour6" class="h-100 pt-4 d-flex align-content-center justify-content-around flex-column">
        <p id="date5" class="text-center fw-bold"></p>
        <div class=""><img id="meteo5" class="meteo_img" src="img/meteo/Rain.png" alt=""></div>
        <p id="temp5" class="text-center mt-5 fw-medium"></p>
        <p id="temperature5" class="text-center fs-1"></p>
      </div>
      <div id="jour7" class="h-100 pt-4 d-flex align-content-center justify-content-around flex-column">
        <p id="date6" class="text-center fw-bold"></p>
        <div class=""><img id="meteo6" class="meteo_img" src="img/meteo/Rain.png" alt=""></div>
        <p id="temp6" class="text-center mt-5 fw-medium"></p>
        <p id="temperature6" class="text-center fs-1"></p>
      </div>
    </article>
    <p id="width_meteo_lien" class="color_meteo text-center font mt-3 size-2 overflow-hidden mx-auto">Pour plus
      d’informations rendez vous sur le site <a class="text-decoration-none fw-bold meteo_france" target="_blank"
        href="https://vigilance.meteofrance.fr/fr/haute-saone">vigilance.meteofrance.fr</a></p>
  </section>
  <section id="nuage_bas_head" class="z-3 position-relative">
    <img class="nuage rotation w-100" src="img/SVG/nuage2fin.svg" alt="">
  </section>

  <h2 id="bapteme" class="text-white text-center size-4">Baptème de l'air</h2>
  <h5 id="type-ulm" class="text-white text-center font mt-5">6 classes d'ULM</h5>

  <section class="h-25 width-custom-avion mt-3 mx-auto">
    <article class="mt-4 d-flex flex-row justify-content-around">
      <div class="avion-container-img d-flex flex-column justify-content-between align-content-center">
        <img class="w-100 drop_shodow_img" src="img/icon_avion/noun-parachute-4423885.png" alt="">
        <p class="text-shadow size-2-5 mt-2 text-white text-center">Paramoteur</p>
      </div>
      <div class="barre-container d-flex justify-content-center align-content-center">
        <div class="bg-white barre h-75"></div>
      </div>
      <div class="avion-container-img d-flex flex-column justify-content-between align-content-center">
        <img class="w-100 drop_shodow_img" src="img/icon_avion/icones aircraft.png" alt="">
        <p class="text-shadow size-2-5 mt-2 text-white text-center">Pendulaire</p>
      </div>
      <div class="barre-container d-flex justify-content-center align-content-center">
        <div class="bg-white barre h-75"></div>
      </div>
      <div class="avion-container-img d-flex flex-column justify-content-between align-content-center">
        <img class="w-100 drop_shodow_img" src="img/icon_avion/avion-leger.png" alt="">
        <p class="text-shadow size-2-5 mt-2 text-white text-center">Multiaxe</p>
      </div>
      <div class="barre-container d-flex justify-content-center align-content-center">
        <div class="bg-white barre h-75"></div>
      </div>
      <div class="avion-container-img d-flex flex-column justify-content-between align-content-center">
        <img class="w-100 drop_shodow_img" src="img/icon_avion/autogire (1).png" alt="">
        <p class="text-shadow size-2-5 mt-2 text-white text-center">L'autogire ultraléger</p>
      </div>
      <div class="barre-container d-flex justify-content-center align-content-center">
        <div class="bg-white barre h-75"></div>
      </div>
      <div class="avion-container-img d-flex flex-column justify-content-between align-content-center">
        <img class="w-100 drop_shodow_img" src="img/icon_avion/airship.png" alt="">
        <p class="text-shadow size-2-5 mt-2 text-white text-center">L'aérostat ultraléger</p>
      </div>
      <div class="barre-container d-flex justify-content-center align-content-center">
        <div class="bg-white barre h-75"></div>
      </div>
      <div class="avion-container-img d-flex flex-column justify-content-between align-content-center">
        <img class="w-100 drop_shodow_img" src="img/icon_avion/helicopter.png" alt="">
        <p class="text-shadow size-2-5 mt-2 text-white text-center">L'hélicoptère ultraléger</p>
      </div>
    </article>
  </section>

  <section id="margin_top_bapteme">
    <h3 id="offres-bapteme-titre" class="font text-white text-center size-3">Nos offres pour un baptème de l'air</h3>
    <h6 id="type-appareil-titre" class="font text-white text-center mt-3">Notre association possède <strong>3 types
        d’appareil </strong>
    </h6>
    <article class="container-fluid font mt-5">
      <div class="d-flex justify-content-around flex-wrap">
        <?php
        require_once "poo_repository.php";
        require_once "poo_models.php";
        try {

          $modele = new Model("bapteme");
          $exemple = new Repository($modele->getTable());
          $sql = "Select * from " . $modele->getTable() . " WHERE active = 0";
          $resultat = $exemple->requete($sql);
          foreach ($resultat as $ligne) {
            ?>
            <div
              class='carte_avion w-25 color-blue-bapteme d-flex justify-content-around align-items-center flex-column mt-3'>
              <form action="_reservBapteme.php" method="POST"
                class='h-100 w-75 d-flex justify-content-around align-items-center flex-column mt-2'>
                <img class='img_card_bapteme rounded-3 w-100 h-25 object-fit-cover'
                  src='ImageBapteme/<?= $ligne["image"] ?>.png' alt=<?= $ligne["nom"] ?>>
                <h5 class='fw-medium text-center size-3'>
                  <?= $ligne["nom"] ?>
                </h5>
                <input type='hidden' name='id' value='<?= $ligne["id"] ?>'>
                <div class='d-flex flex-column w-100'>
                  <div class='custom-select mx-auto w-100'>
                    <select class='w-100' name="formule">
                      <option value='' disabled selected>Formule</option>
                      <?php
                      $f = $ligne["formule"];
                      $formule = explode(";", $f);
                      foreach ($formule as $f) {
                        echo "<option value=" . $f . ">" . $f . "</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class='custom-select w-100'>
                    <select class='w-100 mt-1' name="temps">
                      <option value='' disabled selected>Temps de prestation</option>
                      <?php
                      $min = $ligne["temps"];
                      $temps = explode(";", $min);
                      foreach ($temps as $min) {
                        echo "<option value=" . $min . ">" . $min . " min </option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class='w-100'>
                    <input class='test-date w-100 mt-1' name="date" type='text' placeholder='Choisir une date ..'
                      readonly='readonly'>
                  </div>
                  <div class=''>
                    <input class='test-time w-100 mt-1' name="heure" type='text' placeholder='Choisir une heure ..'
                      readonly='readonly'>
                  </div>
                </div>
                <div
                  class='button_bapteme d-flex flex-row align-items-center justify-content-around color-red-bapteme mt-5'>
                  <div>
                    <p class='m-0'><span class='non-strong-text'>à partir de</span><strong class='strong-text fst-italic'>
                        <?= $ligne["prix"] ?> €
                      </strong></p>
                  </div>
                  <input type='submit' value='Réserver' class='button_reserver_bapteme px-2 text-white size-2-5'>
                </div>
              </form>
            </div>
            <?php
            if (isset($_SESSION["message_err"])) {
              echo "<div id='popup' class='bg-white position-fixed popup_bapteme fw_bold text-danger fs-5 p-3 rounded-4'>" . $_SESSION["message_err"] . "</div>";
              unset($_SESSION["message_err"]);
            }
            if (isset($_SESSION["message_cor"])) {
              echo "<div id='popup' class='bg-white position-fixed popup_bapteme fw_bold text-success fs-5 p-3 rounded-4'>" . $_SESSION["message_cor"] . "</div>";
              unset($_SESSION["message_cor"]);
            }
          }
        } catch (PDOException $e) {
          die($e->getMessage());
        }
        ?>
      </div>
    </article>
  </section>

  <section class="font">
    <h3 class="text-white text-center mt-5 size-3">Avis Clients</h3>
    <?php
    try {

      $modele6 = new Model("avis");
      $exemple6 = new Repository($modele6->getTable());
      $sql6 = "Select * from " . $modele6->getTable() . " WHERE (type) = 'bapteme' ORDER BY (date) DESC LIMIT 2;";
      $resultat6 = $exemple6->requete($sql6);
      foreach ($resultat6 as $ligne6) {
        ?>
        <article class="w-50 mx-auto avis_clients mt-4">
          <div class="d-flex flex-column">
            <div class="d-flex flex-row">
              <div class="info-commentaire w-50 d-flex flex-column">
                <p class="fw-bold fs-4 mb-0">
                  <?= $ligne6["prenom"] ?>
                  <?= $ligne6["nom"] ?>
                </p>
                <p class="fs-4 fw-medium">
                  <?= $ligne6["type"] ?>
                </p>
              </div>

              <div class="star-commentaire w-50 rating fs-3">
                <?php

                if (($ligne6["note"]) == 5) {
                  for ($i = 0; $i < 5; $i++) {
                    echo "<i class='fas fa-star text-yellow'></i>";
                  }
                } elseif (($ligne6["note"]) == 4) {
                  echo "<i class='far fa-star'></i>";
                  for ($i = 0; $i < 4; $i++) {
                    echo "<i class='fas fa-star text-yellow'></i>";
                  }
                } elseif (($ligne6["note"]) == 3) {
                  for ($i = 0; $i < 2; $i++) {
                    echo "<i class='far fa-star'></i>";
                  }
                  for ($i = 0; $i < 3; $i++) {
                    echo "<i class='fas fa-star text-yellow'></i>";
                  }
                } elseif (($ligne6["note"]) == 2) {
                  for ($i = 0; $i < 3; $i++) {
                    echo "<i class='far fa-star'></i>";
                  }
                  for ($i = 0; $i < 2; $i++) {
                    echo "<i class='fas fa-star text-yellow'></i>";
                  }
                } elseif (($ligne6["note"]) == 1) {
                  for ($i = 0; $i < 4; $i++) {
                    echo "<i class='far fa-star'></i>";
                  }
                  echo "<i class='fas fa-star text-yellow'></i>";
                }
                ?>
              </div>
            </div>



            <div class="fs-5 fw-light commentaire">
              <?= $ligne6["commentaire"] ?>
            </div>
          </div>
        </article>
        <?php
      }
    } catch (PDOException $e) {
      die($e->getMessage());
    }
    ?>
  </section>

  <section id="formation" class="w-100">
    <h2 id="container_formation" class="text-white text-center size-4">FORMATIONS</h2>
    <div class="w-100 d-flex justify-content-around flex-wrap mt-5">
      <?php
      try {

        $modele4 = new Model("formation");
        $exemple4 = new Repository($modele4->getTable());
        $sql4 = "Select * from " . $modele4->getTable() . " WHERE active = 0";
        $resultat4 = $exemple4->requete($sql4);
        foreach ($resultat4 as $ligne4) {
          ?>

          <form method="post" action="_reservFormation.php"
            class="carte_avion2 w-25 d-flex justify-content-between align-items-center flex-column color-blue-bapteme mt-3">
            <h3 class="mt-4 size-3">
              <?= $ligne4["nom"] ?>
            </h3>
            <input type="hidden" name="id" value="<?= $ligne4["id"] ?>">
            <div class="w-75 rounded-5 barre-horizontale"></div>
            <ul class="mt-3 w-75 size-2">
              <?php
              $des = $ligne4["description"];
              $description = explode(";", $des);
              foreach ($description as $des) {
                echo "<li class='mt-3'>" . $des . "</li>";
              }
              ?>
            </ul>
            <div class="d-flex flex-row justify-content-around align-items-center w-100 mt-5 mb-3 button-form">
              <p class="color-red-bapteme fst-italic size-3 my-auto">
                <?= $ligne4["prix"] ?>€
              </p>
              <input type="submit" value="S'inscrire" class="button_reserver_bapteme px-2 text-white fs-5">
            </div>
          </form>
          <?php
        }
      } catch (PDOException $e) {
        die($e->getMessage());
      }
      ?>
    </div>
  </section>

  <section class="font">
    <h3 class="text-white text-center mt-5 size-3">Avis Clients</h3>
    <?php
    try {

      $modele6 = new Model("avis");
      $exemple6 = new Repository($modele6->getTable());
      $sql6 = "Select * from " . $modele6->getTable() . " WHERE (type) = 'formation' ORDER BY (date) DESC LIMIT 2;";
      $resultat6 = $exemple6->requete($sql6);
      foreach ($resultat6 as $ligne6) {
        ?>
        <article class="w-50 mx-auto avis_clients mt-4">
          <div class="d-flex flex-column">
            <div class="d-flex flex-row">
              <div class="info-commentaire w-50 d-flex flex-column">
                <p class="fw-bold fs-4 mb-0">
                  <?= $ligne6["prenom"] ?>
                  <?= $ligne6["nom"] ?>
                </p>
                <p class="fs-4 fw-medium">
                  <?= $ligne6["type"] ?>
                </p>
              </div>

              <div class="star-commentaire w-50 rating fs-3">
                <?php

                if (($ligne6["note"]) == 5) {
                  for ($i = 0; $i < 5; $i++) {
                    echo "<i class='fas fa-star text-yellow'></i>";
                  }
                } elseif (($ligne6["note"]) == 4) {
                  echo "<i class='far fa-star'></i>";
                  for ($i = 0; $i < 4; $i++) {
                    echo "<i class='fas fa-star text-yellow'></i>";
                  }
                } elseif (($ligne6["note"]) == 3) {
                  for ($i = 0; $i < 2; $i++) {
                    echo "<i class='far fa-star'></i>";
                  }
                  for ($i = 0; $i < 3; $i++) {
                    echo "<i class='fas fa-star text-yellow'></i>";
                  }
                } elseif (($ligne6["note"]) == 2) {
                  for ($i = 0; $i < 3; $i++) {
                    echo "<i class='far fa-star'></i>";
                  }
                  for ($i = 0; $i < 2; $i++) {
                    echo "<i class='fas fa-star text-yellow'></i>";
                  }
                } elseif (($ligne6["note"]) == 1) {
                  for ($i = 0; $i < 4; $i++) {
                    echo "<i class='far fa-star'></i>";
                  }
                  echo "<i class='fas fa-star text-yellow'></i>";
                }
                ?>
              </div>
            </div>



            <div class="fs-5 fw-light commentaire">
              <?= $ligne6["commentaire"] ?>
            </div>
          </div>
        </article>
        <?php
      }
    } catch (PDOException $e) {
      die($e->getMessage());
    }
    ?>
  </section>

  <section id="formation2">
    <h2 id="forfait" class="text-white text-center size-4">Forfaits</h2>
    <div class="d-flex flex-row justify-content-around align-items-center flex-wrap mt-5 color_meteo hauteur_container">

      <?php
      try {

        $modele5 = new Model("forfait");
        $exemple5 = new Repository($modele5->getTable());
        $sql5 = "Select * from " . $modele5->getTable() . " WHERE active = 0";
        $resultat5 = $exemple5->requete($sql5);
        foreach ($resultat5 as $ligne5) {
          ?>
          <form method="post" action="_reserveForfait.php" class="carte3 w-25 p-3 rounded-4 mt-3">
            <h2 class="font text-center mt-3 size-5">
              <?= $ligne5["prix"] ?> €
              <?php
              if ($ligne5["par_h"] == 1) {
                echo "/h";
              }
              ?>
            </h2>
            <div class="w-75 rounded-5 barre-horizontale mx-auto"></div>
            <h4 class="text-center mt-3">
              <?= $ligne5["nom"] ?>
            </h4>
            <input type="hidden" name="id" value="<?= $ligne5["id"] ?>" />
            <ul class="px-4 mt-3 size-2">
              <?php
              $des = $ligne5["description"];
              $description = explode(";", $des);
              foreach ($description as $des) {
                echo "<li class='mt-3'>" . $des . "</li>";
              }
              ?>
            </ul>
            <div id="container-button-forf" class="d-flex justify-content-center my-auto mt-4">
              <input type="submit" value="S'inscrire" class="button_reserver_bapteme px-2 text-white w-50 fs-4 mt-4">
            </div>
          </form>
          <?php
        }
      } catch (PDOException $e) {
        die($e->getMessage());
      }
      ?>
    </div>
  </section>


  <section class="font">
    <h3 class="text-white text-center mt-5 size-3">Avis Clients</h3>
    <?php
    try {

      $modele6 = new Model("avis");
      $exemple6 = new Repository($modele6->getTable());
      $sql6 = "Select * from " . $modele6->getTable() . " WHERE (type) = 'forfait' ORDER BY (date) DESC LIMIT 2;";
      $resultat6 = $exemple6->requete($sql6);
      foreach ($resultat6 as $ligne6) {
        ?>
        <article class="w-50 mx-auto avis_clients mt-4">
          <div class="d-flex flex-column">
            <div class="d-flex flex-row">
              <div class="info-commentaire w-50 d-flex flex-column">
                <p class="fw-bold fs-4 mb-0">
                  <?= $ligne6["prenom"] ?>
                  <?= $ligne6["nom"] ?>
                </p>
                <p class="fs-4 fw-medium">
                  <?= $ligne6["type"] ?>
                </p>
              </div>

              <div class="star-commentaire w-50 rating fs-3">
                <?php

                if (($ligne6["note"]) == 5) {
                  for ($i = 0; $i < 5; $i++) {
                    echo "<i class='fas fa-star text-yellow'></i>";
                  }
                } elseif (($ligne6["note"]) == 4) {
                  echo "<i class='far fa-star'></i>";
                  for ($i = 0; $i < 4; $i++) {
                    echo "<i class='fas fa-star text-yellow'></i>";
                  }
                } elseif (($ligne6["note"]) == 3) {
                  for ($i = 0; $i < 2; $i++) {
                    echo "<i class='far fa-star'></i>";
                  }
                  for ($i = 0; $i < 3; $i++) {
                    echo "<i class='fas fa-star text-yellow'></i>";
                  }
                } elseif (($ligne6["note"]) == 2) {
                  for ($i = 0; $i < 3; $i++) {
                    echo "<i class='far fa-star'></i>";
                  }
                  for ($i = 0; $i < 2; $i++) {
                    echo "<i class='fas fa-star text-yellow'></i>";
                  }
                } elseif (($ligne6["note"]) == 1) {
                  for ($i = 0; $i < 4; $i++) {
                    echo "<i class='far fa-star'></i>";
                  }
                  echo "<i class='fas fa-star text-yellow'></i>";
                }
                ?>
              </div>
            </div>



            <div class="fs-5 fw-light commentaire">
              <?= $ligne6["commentaire"] ?>
            </div>
          </div>
        </article>
        <?php
      }
    } catch (PDOException $e) {
      die($e->getMessage());
    }
    ?>
  </section>

  <section id="formation" class="w-100">
    <h2 id="propos" class="text-white text-center size-4">A PROPOS</h2>
    <article id="pres-asso" class="text-white size-2-5 w-50 mx-auto mt-5 fw-light">
      Notre aéro-club est dédié à la formation des pilotes et instructeurs, tout en offrant des baptêmes de l'air.
      Nous
      proposons une gamme de services complémentaires pour soutenir notre communauté aéronautique.
    </article>
    <h3 id="titre-service" class="text-white text-center mt-5">Nos Services</h3>
    <article class="d-flex flex-row justify-content-around mt-5 w-100">
      <div id="formation_service" class="d-flex justify-content-center align-content-center bg-circl"></div>
      <div id="bapteme_service" class="d-flex justify-content-center align-content-center bg-circl"></div>
      <div id="maintenance" class="d-flex justify-content-center align-content-center bg-circl"></div>
      <div id="assemblage" class="d-flex justify-content-center align-content-center bg-circl"></div>
      <div id="restauration" class="d-flex justify-content-center align-content-center bg-circl"></div>
      <div id="hebergement" class="d-flex justify-content-center align-content-center bg-circl"></div>
      <div id="location" class="d-flex justify-content-center align-content-center bg-circl"></div>
    </article>
    <article class="d-flex flex-row justify-content-around mt-3 text-white size-2">
      <p class="width_titre_service text-center">Formation des pilotes</p>
      <p class="width_titre_service text-center">Baptême de l'air</p>
      <p class="width_titre_service text-center">Maintenance complète ULM</p>
      <p class="width_titre_service text-center">Assemblage ULM</p>
      <p class="width_titre_service text-center">Service de restauration rapide</p>
      <p class="width_titre_service text-center">Hébergement pour les élèves stagiaires</p>
      <p class="width_titre_service text-center">Location hangar pour ULM</p>
    </article>
    <h3 id="titre-infras" class="text-white text-center mt-5">Infrastructures</h3>

    <article id="container-infra" class="w-100 text-white d-flex flex-row mt-5">
      <div class="w-50 size-2 d-flex justify-content-center align-content-center">
        <div id="text-infra" class="size-2-5 fw-light">
          <p>Sur le site, nous disposons de :</p>
          <ul id="liste_infra">
            <li>Une surface totale de 45 hectares dégagés</li>
            <li class="mt-2">Deux pistes en X de 800 et 450 m</li>
            <li class="mt-2">Un hydrosurface de 8 hectares</li>
            <li class="mt-2">Trois hangars avec surface couverte de 4300 m²</li>
            <li class="mt-2">Locaux administratifs informatisés</li>
            <li class="mt-2">Salle de cours multimédia avec simulateur de vol</li>
            <li class="mt-2">Un atelier d'entretien et de réparation</li>
            <li class="mt-2">Des capacités d'accueil et de restauration sur place</li>
            <li class="mt-2">Connexion WIFI gratuit sur toute la base</li>
            <li class="mt-2">Système de vidéo-surveillance/webcams</li>
          </ul>
        </div>
      </div>
      <div id="img-slide-infra" class="w-50">
        <div class="slide_container_img">
          <img id="img_slide" src="img/Tecnam-P92-exter.jpg" alt="images montrant les Infrastructures">
        </div>
      </div>
    </article>
    <h3 id="titre-equipe" class="text-white text-center mt-5">Notre équipe</h3>

    <article class="slider position-relative d-grid overflow-hidden mt-5">
      <div class="slide-track d-flex">
        <?php
        for ($i = 0; $i <= 1; $i++) {
          try {

            $modele7 = new Model("equipe");
            $exemple7 = new Repository($modele7->getTable());
            $sql7 = "Select * from " . $modele7->getTable();
            $resultat7 = $exemple7->requete($sql7);
            foreach ($resultat7 as $ligne7) {
              ?>
              <div class="slide">
                <div class="card_equipe" style="background-image: url(ImagesEquipe/<?= $ligne7["image"] ?>.png)">
                  <div class="content">
                    <div class="d-flex h-75 flex-column justify-content-center align-items-center">
                      <p class="text-center text-white size-2-5 shadow-custom mb-0">
                        <?= $ligne7["prenom"] ?>
                        <?= $ligne7["nom"] ?>
                      </p>
                      <p class="text-center text-white shadow-custom mb-1">
                        <?= $ligne7["fonction"] ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            }
          } catch (PDOException $e) {
            die($e->getMessage());
          }
        }
        ?>
      </div>
    </article>
  </section>

  <section id="formation">
    <h2 id="event" class="text-white text-center">ÉVÉNEMENTS</h2>
    <article class="w-75 mx-auto mt-5">
      <?php
      try {

        $model = new Model("evenement");
        $ex = new Repository($model->getTable());
        $sql2 = "Select * from " . $model->getTable() . " where active = 0";
        $result = $ex->requete($sql2);
        foreach ($result as $lign) {
          ?>
          <div class="d-flex flex-row mt-5">
            <div class="img-event w-25 rounded-4 bg-white d-grid justify-content-center align-content-center">
              <img src="ImagesEvenement/<?= $lign["image"] ?>.png" alt="<?= $lign["nom"] ?>"
                class="w-100 rounded-4 box-shadow-custom-event">
            </div>
            <div class="info-event w-75 d-flex flex-column justify-content-start ml-custom-event text-white">
              <h3 class="text-white">
                <?= $lign["nom"] ?>
              </h3>
              <div class="barre-custom-event bg-white rounded-5 w-50"></div>
              <p class="mt-2 size-2">
                <?= $lign["date_debut"] ?> -
                <?= $lign["date_fin"] ?>
              </p>
              <p class="mb-2 size-2">
                <?= $lign["lieu"] ?>
              </p>
              <a class="button_event text-decoration-none p-3 rounded-4 size-2 fw-bold" href="<?= $lign["lien"] ?>"
                target="_blank">En savoir
                plus</a>
            </div>
          </div>
          <?php
        }
      } catch (PDOException $e) {
        die($e->getMessage());
      }
      ?>
    </article>
  </section>


  <section id="formation">
    <h2 id="galerie" class="text-white text-center">GALERIE</h2>

    <article class="slider3 position-relative w-100 d-grid overflow-hidden mb-5">
      <div class="slide-track3 h-75 d-flex overflow-hidden" id="compte">
        <?php
        for ($i = 0; $i <= 1; $i++) {
          try {

            $model3 = new Model("galerie");
            $ex3 = new Repository($model3->getTable());
            $sql3 = "Select * from " . $model3->getTable();
            $result3 = $ex3->requete($sql3);
            foreach ($result3 as $lign3) {
              ?>
              <div class="slide3 d-flex align-items-center h-100 my-auto p-3">
                <img class="rounded-3 w-100" src="ImagesGalerie/<?= $lign3["image"] ?>.png" alt="<?= $lign3["titre"] ?>">
              </div>
              <?php
            }
          } catch (PDOException $e) {
            die($e->getMessage());
          }
        }
        ?>
      </div>
    </article>
  </section>


  <section class="z-3 position-relative">
    <img class="w-100" src="img/SVG/nuage2fin.svg" alt="">
  </section>
  <section class="bg-white pb-5 pt-2 z-2 position-relative">
    <h2 id="avis" class="text-center color-blue-bapteme">LAISSER UN AVIS</h2>
    <form id="form-avis" method="post" action="_avis.php"
      class="w-50 d-flex align-content-center justify-content-around flex-column mx-auto">
      <label id="titre-note" class="mt-4 size-2-5">Note</label>
      <div class="rating">
        <input type="radio" id="star-1" name="star-1" value="star-1">
        <label for="star-1">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path pathLength="360"
              d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z">
            </path>
          </svg>
        </label>
        <input type="radio" id="star-2" name="star-2" value="star-1">
        <label for="star-2">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path pathLength="360"
              d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z">
            </path>
          </svg>
        </label>
        <input type="radio" id="star-3" name="star-3" value="star-1">
        <label for="star-3">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path pathLength="360"
              d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z">
            </path>
          </svg>
        </label>
        <input type="radio" id="star-4" name="star-4" value="star-1">
        <label for="star-4">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path pathLength="360"
              d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z">
            </path>
          </svg>
        </label>
        <input type="radio" id="star-5" name="star-5" value="star-1">
        <label for="star-5">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path pathLength="360"
              d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z">
            </path>
          </svg>
        </label>
      </div>
      <label id="titre-select-avis" class="mt-4 size-2-5">Offre choisie</label>
      <?php
      ?>
      <select name="type" class="w-50 select-custom rounded-2">
        <option value="" disabled selected>----</option>
        <option value="Bapteme">Bapteme</option>
        <option value="Formation">Formation</option>
        <option value="Forfait">Forfait</option>
      </select>
      <label id="titre-commentaire-avis" class="mt-4 size-2-5">Commentaire</label>
      <textarea name="commentaire" class="textarea_avis rounded-3 mt-2"></textarea>
      <input class="button_avis d-inline-flex justify-content-center align-items-center text-white p-2 size-2-5 mt-4"
        type="submit" value="Envoyer">
    </form>
  </section>

  <section id="degrade-custom" class="z-3 position-relative">
    <img id="nuage_bas_footer" class="nuage rotation w-100 z-3 position-relative" src="img/SVG/nuage2fin.svg" alt="">
    <div class="container_avion_bas mt-5">
      <img id="avion_helice_bas" src="img/avion.gif" alt="gif de l'animation de l'avion">
    </div>

    <article id="contact" class="mt-custom">
      <div id="container-contact" class="d-flex flex-row justify-content-around">
        <div id="container-info-contact" class="text-white container_contact container-fluid margin-custom-contact">
          <h2 class="text-white">INFORMATION</h2>
          <p>Association enregistrée n°04674 -- Agrément n° AS70986858</p>
          <div class="d-flex align-items-center">
            <span class="icon-custom fa-2x"><i class="fas fa-envelope"></i></span>
            <p class="my-auto size-2-5">acf2l@gmail.com</p>
          </div>
          <div class="d-flex align-items-center mt-3">
            <span class="icon-custom fa-2x"><i class="fas fa-phone reverse_phone"></i></span>
            <p class="my-auto size-2-5">+33 1 60 56 60 60</p>
          </div>

          <div class="d-flex align-items-center mt-3">
            <span class="icon-custom fa-2x"><i class="fas fa-map-marker-alt"></i></span>
            <p class="my-auto size-2-5">62, Avenue de la République, 70200 Lure</p>
          </div>
          <div id="reseau" class="d-flex flex-row justify-content-around w-50  mt-4">
            <a href="" target="_blank">
              <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 51 51" fill="none">
                <path
                  d="M51 25.5639C51 11.4526 39.576 0 25.5 0C11.424 0 0 11.4526 0 25.5639C0 37.9368 8.772 48.2391 20.4 50.6165V33.2331H15.3V25.5639H20.4V19.1729C20.4 14.2391 24.4035 10.2256 29.325 10.2256H35.7V17.8947H30.6C29.1975 17.8947 28.05 19.0451 28.05 20.4511V25.5639H35.7V33.2331H28.05V51C40.9275 49.7218 51 38.8316 51 25.5639Z"
                  fill="white" />
              </svg>
            </a>
            <a href="" target="_blank">
              <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 35 35" fill="none">
                <path
                  d="M20.8286 14.82L33.8574 0H30.7694L19.4596 12.8675L10.422 0H0L13.6644 19.46L0 35H3.08801L15.0335 21.41L24.578 35H35L20.8286 14.82ZM16.6006 19.63L15.2162 17.6925L4.19969 2.275H8.94236L17.8307 14.7175L19.2151 16.655L30.772 32.83H26.0293L16.6006 19.63Z"
                  fill="white" />
              </svg>
            </a>
            <a href="" target="_blank">
              <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 37 37" fill="none">
                <path
                  d="M32.8889 0C33.9792 0 35.0249 0.433134 35.7959 1.20412C36.5669 1.9751 37 3.02078 37 4.11111V32.8889C37 33.9792 36.5669 35.0249 35.7959 35.7959C35.0249 36.5669 33.9792 37 32.8889 37H4.11111C3.02078 37 1.9751 36.5669 1.20412 35.7959C0.433134 35.0249 0 33.9792 0 32.8889V4.11111C0 3.02078 0.433134 1.9751 1.20412 1.20412C1.9751 0.433134 3.02078 0 4.11111 0H32.8889ZM31.8611 31.8611V20.9667C31.8611 19.1894 31.1551 17.485 29.8984 16.2283C28.6417 14.9716 26.9372 14.2656 25.16 14.2656C23.4128 14.2656 21.3778 15.3344 20.3911 16.9378V14.6561H14.6561V31.8611H20.3911V21.7272C20.3911 20.1444 21.6656 18.8494 23.2483 18.8494C24.0116 18.8494 24.7435 19.1526 25.2832 19.6923C25.8229 20.232 26.1261 20.964 26.1261 21.7272V31.8611H31.8611ZM7.97556 11.4289C8.89144 11.4289 9.76981 11.0651 10.4174 10.4174C11.0651 9.76981 11.4289 8.89144 11.4289 7.97556C11.4289 6.06389 9.88722 4.50167 7.97556 4.50167C7.05422 4.50167 6.17063 4.86766 5.51915 5.51915C4.86766 6.17063 4.50167 7.05422 4.50167 7.97556C4.50167 9.88722 6.06389 11.4289 7.97556 11.4289ZM10.8328 31.8611V14.6561H5.13889V31.8611H10.8328Z"
                  fill="white" />
              </svg>
            </a>
            <a href="" target="_blank">
              <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 36 37" fill="none">
                <g clip-path="url(#clip0_47_262)">
                  <path
                    d="M18 0.5C13.1152 0.5 12.501 0.5225 10.5817 0.608C8.6625 0.698 7.35525 0.9995 6.21 1.445C5.00871 1.89684 3.92061 2.60561 3.02175 3.52175C2.10617 4.42107 1.39749 5.50904 0.945 6.71C0.4995 7.853 0.19575 9.1625 0.108 11.075C0.0225 12.9987 0 13.6108 0 18.5023C0 23.3893 0.0225 24.0013 0.108 25.9205C0.198 27.8375 0.4995 29.1447 0.945 30.29C1.40625 31.4735 2.0205 32.477 3.02175 33.4782C4.02075 34.4795 5.02425 35.096 6.20775 35.555C7.35525 36.0005 8.66025 36.3042 10.5773 36.392C12.4988 36.4775 13.1108 36.5 18 36.5C22.8892 36.5 23.499 36.4775 25.4205 36.392C27.3353 36.302 28.647 36.0005 29.7922 35.555C30.9928 35.1029 32.0801 34.3942 32.9782 33.4782C33.9795 32.477 34.5938 31.4735 35.055 30.29C35.4982 29.1447 35.802 27.8375 35.892 25.9205C35.9775 24.0013 36 23.3892 36 18.5C36 13.6108 35.9775 12.9988 35.892 11.0773C35.802 9.1625 35.4982 7.853 35.055 6.71C34.6026 5.50901 33.8939 4.42102 32.9782 3.52175C32.0797 2.60527 30.9915 1.89645 29.79 1.445C28.6425 0.9995 27.333 0.69575 25.4182 0.608C23.4967 0.5225 22.887 0.5 17.9955 0.5H18.0023H18ZM16.3867 3.7445H18.0023C22.8083 3.7445 23.3775 3.76025 25.2743 3.848C27.0292 3.92675 27.9832 4.2215 28.6178 4.46675C29.457 4.793 30.0578 5.1845 30.6877 5.8145C31.3177 6.4445 31.707 7.043 32.0333 7.8845C32.2808 8.51675 32.5732 9.47075 32.652 11.2257C32.7397 13.1225 32.7578 13.6918 32.7578 18.4955C32.7578 23.2992 32.7397 23.8707 32.652 25.7675C32.5732 27.5225 32.2785 28.4743 32.0333 29.1087C31.7447 29.8903 31.2841 30.597 30.6855 31.1765C30.0555 31.8065 29.457 32.1958 28.6155 32.522C27.9855 32.7695 27.0315 33.062 25.2743 33.143C23.3775 33.2285 22.8083 33.2487 18.0023 33.2487C13.1963 33.2487 12.6248 33.2285 10.728 33.143C8.973 33.062 8.02125 32.7695 7.38675 32.522C6.60487 32.2338 5.89753 31.7741 5.31675 31.1765C4.71769 30.5961 4.25638 29.8887 3.96675 29.1065C3.7215 28.4742 3.42675 27.5203 3.348 25.7653C3.2625 23.8685 3.2445 23.2992 3.2445 18.491C3.2445 13.685 3.2625 13.118 3.348 11.2212C3.429 9.46625 3.7215 8.51225 3.969 7.87775C4.29525 7.0385 4.68675 6.43775 5.31675 5.80775C5.94675 5.17775 6.54525 4.7885 7.38675 4.46225C8.02125 4.21475 8.973 3.92225 10.728 3.84125C12.3885 3.76475 13.032 3.74225 16.3867 3.74V3.7445ZM27.6097 6.7325C27.3261 6.7325 27.0452 6.78837 26.7832 6.89692C26.5211 7.00547 26.283 7.16457 26.0824 7.36515C25.8818 7.56572 25.7227 7.80384 25.6142 8.0659C25.5056 8.32797 25.4497 8.60884 25.4497 8.8925C25.4497 9.17616 25.5056 9.45703 25.6142 9.7191C25.7227 9.98116 25.8818 10.2193 26.0824 10.4199C26.283 10.6204 26.5211 10.7795 26.7832 10.8881C27.0452 10.9966 27.3261 11.0525 27.6097 11.0525C28.1826 11.0525 28.732 10.8249 29.1371 10.4199C29.5422 10.0148 29.7698 9.46537 29.7698 8.8925C29.7698 8.31963 29.5422 7.77023 29.1371 7.36515C28.732 6.96007 28.1826 6.7325 27.6097 6.7325ZM18.0023 9.257C16.7762 9.23787 15.5585 9.46284 14.4202 9.91882C13.2819 10.3748 12.2457 11.0527 11.3718 11.913C10.498 12.7732 9.80407 13.7988 9.33039 14.9298C8.85672 16.0609 8.61278 17.2749 8.61278 18.5011C8.61278 19.7274 8.85672 20.9414 9.33039 22.0724C9.80407 23.2035 10.498 24.229 11.3718 25.0893C12.2457 25.9496 13.2819 26.6275 14.4202 27.0834C15.5585 27.5394 16.7762 27.7644 18.0023 27.7453C20.429 27.7074 22.7435 26.7168 24.4462 24.9873C26.1489 23.2578 27.1033 20.9281 27.1033 18.5011C27.1033 16.0741 26.1489 13.7444 24.4462 12.0149C22.7435 10.2854 20.429 9.29486 18.0023 9.257ZM18.0023 12.4993C19.5937 12.4993 21.1201 13.1315 22.2454 14.2568C23.3708 15.3822 24.003 16.9085 24.003 18.5C24.003 20.0915 23.3708 21.6178 22.2454 22.7432C21.1201 23.8685 19.5937 24.5007 18.0023 24.5007C16.4108 24.5007 14.8844 23.8685 13.7591 22.7432C12.6337 21.6178 12.0015 20.0915 12.0015 18.5C12.0015 16.9085 12.6337 15.3822 13.7591 14.2568C14.8844 13.1315 16.4108 12.4993 18.0023 12.4993Z"
                    fill="white" />
                </g>
                <defs>
                  <clipPath id="clip0_47_262">
                    <rect width="36" height="36" fill="white" transform="translate(0 0.5)" />
                  </clipPath>
                </defs>
              </svg>
            </a>
          </div>
        </div>
        <div id="contact-form-container"
          class="text-white w-50 container_contact container-fluid margin-r-custom-contact">
          <h2 class="text-white">CONTACTER NOUS !</h2>
          <p>Laissez votre message, nous vous contacterons dans la semaine</p>
          <form class="d-flex flex-column">
            <div class="d-flex flex-row justify-content-between">
              <input type="text" placeholder="Nom"
                class="input-custom-contact width-custom-contact-input px-3 py-2 fs-6">
              <input type="email" placeholder="E-mail"
                class="input-custom-contact width-custom-contact-input px-3 py-2 fs-6">
            </div>
            <input type="text" placeholder="Sujet" class="input-custom-contact mt-3 px-3 py-2 fs-6">
            <textarea placeholder="Comment pouvons-nous vous aider ?"
              class="input-custom-contact-textarea mt-3 fs-6 px-3 py-2"></textarea>
            <input type="button" value="Envoyer"
              class="w-25 mt-4 button-contact-custom size-2-5 rounded-3 text-white mx-auto p-2">
          </form>
        </div>
      </div>
    </article>
  </section>
  <footer class="position-relative">
    <img class="w-100 object-fit-contain" src="img/footer.png" alt="image footer">
    <a href="php_login.php" class="position-absolute text-white lien_compte size-2-5">Compte</a>
    <a href="mention-legales.html" class="position-absolute text-white lien_mention size-2-5">Mentions Légales</a>
  </footer>
  <section id="contact-dev" class="d-flex justify-content-center align-items-center p-2 bg-custom-footer">
    <p class="text-white size-2-5 my-auto">Un projet de <a href="https://www.linkedin.com/in/valentin-lamour-732488252/"
        target="_blank" class="text-decoration-none lien-footer">Valentin Lamour</a>, <a
        href="https://www.linkedin.com/in/glenn-guillard-08204724a/" target="_blank"
        class="text-decoration-none lien-footer">Glenn Guillard</a>, <a
        href="https://www.linkedin.com/in/thomas-henry-8a9652256/" target="_blank"
        class="text-decoration-none lien-footer">Thomas Henry</a> et <a
        href="https://www.linkedin.com/in/j%C3%A9r%C3%B4me-fabre-057b23257/" target="_blank"
        class="text-decoration-none lien-footer">Jérôme Fabre</a>. – ©
      2023 Aero
      Club – Tous droits réservés.</p>
  </section>
  <script src="js/nav.js?time=<?php echo UID(200) ?>"></script>
  <script src="js/index.js?time=<?php echo UID(200) ?>"></script>
  <script src="js/bootstrap.min.js?time=<?php echo UID(200) ?>"></script>
  <script src="js/input_time.js?time=<?php echo UID(200) ?>"></script>
  <script src="js/srcipt.js?time=<?php echo UID(200) ?>"></script>
  <script src="js/slider.js?time=<?php echo UID(200) ?>"></script>

</body>

</html>