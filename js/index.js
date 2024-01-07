window.addEventListener('load', function () {
  var avion2 = document.getElementById("avion_helice");
  avion2.style.display = 'block';
  avion2.style.animationName = "arriver";
  avion2.style.opacity = '1';
});
var backToTop = document.getElementById('backToTop'),
  fleche = document.getElementById('fleche_haut');

function retirer() {
  document.getElementById("cookie").style.display = 'none';
  document.getElementById("cookie").style.userSelect = 'none';
}

function accepter() {
  document.getElementById("cookie").style.display = 'none';
  document.getElementById("cookie").style.userSelect = 'none';
  document.location.href = '_cookie.php';
}

var hauteurNavigateur = window.innerHeight,
  nuage = document.getElementById('depart_avion').getBoundingClientRect();
message = false;
message2 = false;
window.addEventListener('scroll', function () {
  var nuage = document.getElementById('depart_avion').getBoundingClientRect(),
    nuageBas = document.getElementById('nuage_bas_footer').getBoundingClientRect();
  if (nuage.bottom < hauteurNavigateur * 0.75 && message == false) {
    message = true;
    let avion2 = document.getElementById("avion_helice"),
      container_avion = document.getElementById("container_avion");
    avion2.style.animationName = "depart_haut";

    avion2.addEventListener('animationend', function () {
      container_avion.style.opacity = '0';
    });
  }
  if (nuageBas.bottom < hauteurNavigateur * 0.75 && message2 == false) {
    message2 = true;
    let avion2 = document.getElementById("avion_helice_bas");
    avion2.style.opacity = '1';
    avion2.style.animationName = "arriver2";
  }
})

document.addEventListener('DOMContentLoaded', function() {
  if (document.getElementById("popup")) {
    var popup = document.getElementById("popup");
    setTimeout(function() {
      popup.remove();
    }, 5000);
  }
} );

var maDiv = document.getElementById('compte');
var nombreEnfants = maDiv.childElementCount;
maDiv.style.width = "calc(25vw*" + nombreEnfants + ")";