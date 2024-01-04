function confirmSupp(arg) {
  const argument = arg;
  jQuery.ajax({
    url: "_suprresionEvenemnt.php",
    type: "POST",
    data: {
      supp: argument,
    },
    success: function (data, textStatus, xhr) {
      location.reload();
    },
  });
}

function modifier(arg) {
  //recupération data
  arg = "'" + arg + "'";
  const nom = document.getElementById("nom_" + arg).innerText;
  const date_une = document.getElementById("dateUne_" + arg).innerText;
  const date_deux = document.getElementById("dateDeux_" + arg).innerText;
  const localisation = document.getElementById("localisation_" + arg).innerText;
  const url = document.getElementById("url_" + arg).href;

  document.getElementById("modif-event").style.display = "block";
  document.getElementById("modif-event").style.userSelect = "auto";
  document.getElementById('overlay').style.display = 'block';

  //envoie data au nouveau form
  document.getElementById("newtitre").value = nom;
  document.getElementById("newDateUne").value = date_une;
  document.getElementById("newDateDeux").value = date_deux;
  document.getElementById("newlocalisation").value = localisation;
  document.getElementById("newurl").value = url;
  document.getElementById("newid").value = arg;
}

function suppr(id) {
  console.log(id);
  document.getElementById('button_suppr').value = id;
  document.getElementById('overlay').style.display = 'block';
  document.getElementById('confirm').style.display = 'block';
}

function annul() {
  document.getElementById("button_suppr").value = '';
  document.getElementById("confirm").style.display = "none";
  document.getElementById("overlay").style.display = "none";
}

function ajoutEvent() {
  document.getElementById("ajout-event").style.display = "block";
  document.getElementById("ajout-event").style.userSelect = "auto";
  document.getElementById('overlay').style.display = 'block';
}

function anulAjout() {
  document.getElementById("ajout-event").style.display = "none";
  document.getElementById("ajout-event").style.userSelect = "none";
  var form = document.getElementById("ajout-event");
  for (var i = 0; i < form.elements.length; i++) {
    var element = form.elements[i];
    if (element.type == "text" || element.type == "file" || element.type == "date") {
      element.value = "";
    }
  }
  document.getElementById("overlay").style.display = "none";

}

function anulModif() {
  document.getElementById("modif-event").style.display = "none";
  document.getElementById("modif-event").style.userSelect = "none";
  document.getElementById('overlay').style.display = 'none';
}