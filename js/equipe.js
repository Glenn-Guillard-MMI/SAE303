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

function modifequipe(arg) {
  const nom = document.getElementById("nom_" + arg).innerText;
  const prenom = document.getElementById("prenom_" + arg).innerText;
  const fonction = document.getElementById("fonction_" + arg).innerText;

  document.getElementById("newnom").value = nom;
  document.getElementById("newprenom").value = prenom;
  document.getElementById("newfonction").value = fonction;
  document.getElementById("id").value = arg;
}
