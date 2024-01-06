function supprimeequipe(arg) {
  const argument = arg;
  jQuery.ajax({
    url: "_suprresionequipe.php",
    type: "POST",
    data: {
      supp: argument,
    },
    success: function (data, textStatus, xhr) {
      location.reload();
    },
  });
}

function confirm(id) {
  document.getElementById('button_suppr').value = id;
  document.getElementById('overlay').style.display = 'block';
  document.getElementById('confirm').style.display = 'block';
}

function modifequipe(arg) {
  const nom = document.getElementById("nom_" + arg).innerText;
  const prenom = document.getElementById("prenom_" + arg).innerText;
  const fonction = document.getElementById("fonction_" + arg).innerText;

  document.getElementById("newnom").value = nom;
  document.getElementById("newprenom").value = prenom;
  document.getElementById("newfonction").value = fonction;
  document.getElementById("id").value = arg;

  document.getElementById("modif-equipe").style.display = "block";
  document.getElementById("modif-equipe").style.userSelect = "block";
  document.getElementById('overlay').style.display = 'block';
}

function anulAjout(){
  document.getElementById("ajout-equipe").style.display = "none";
  document.getElementById("ajout-equipe").style.userSelect = "none";
  document.getElementById('overlay').style.display = 'none';

  var form = document.getElementById("ajout-equipe");
  for (var i = 0; i < form.elements.length; i++) {
    var element = form.elements[i];
    if (element.type == "text" || element.type == "file") {
      element.value = "";
    }
  }
}

function anulModif(){
  document.getElementById("modif-equipe").style.display = "none";
  document.getElementById("modif-equipe").style.userSelect = "none";
  document.getElementById('overlay').style.display = 'none';
}

function ajoutEquipe(){
  document.getElementById("ajout-equipe").style.display = "block";
  document.getElementById("ajout-equipe").style.userSelect = "block";
  document.getElementById('overlay').style.display = 'block';
}
