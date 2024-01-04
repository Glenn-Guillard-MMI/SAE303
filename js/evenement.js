function supprimer(arg) {
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

  //envoie data au nouveau form
  document.getElementById("newtitre").value = nom;
  document.getElementById("newDateUne").value = date_une;
  document.getElementById("newDateDeux").value = date_deux;
  document.getElementById("newlocalisation").value = localisation;
  document.getElementById("newurl").value = url;
  document.getElementById("newid").value = arg;
}
