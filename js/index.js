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

var backToTop = document.getElementById('backToTop'),
  fleche = document.getElementById('fleche_haut');

backToTop.addEventListener('mouseover', function () {
  fleche.style.width = '3.5em';
});
backToTop.addEventListener('mouseout', function () {
  fleche.style.width = '4em';
});