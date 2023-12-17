window.addEventListener('load', function () {
  setTimeout(function () {
    var avion2 = document.getElementById("avion_helice");
    avion2.style.display = 'block';
    avion2.style.animationName = "arriver";
    avion2.style.opacity = '1';
  }, 2000);
});
function commence() {
  var avion2 = document.getElementById("avion_helice");
  var container_avion = document.getElementById("container_avion");
  avion2.style.animationName = "depart_haut";

  avion2.addEventListener('animationend', function () {
    container_avion.style.opacity = '0';
  });
}

/*
var largeurEcran = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
var hauteurEcran = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;

// Affichez la taille de l'écran dans la console
console.log('Largeur de l\'écran : ' + largeurEcran + ' pixels');
console.log('Hauteur de l\'écran : ' + hauteurEcran + ' pixels');*/
