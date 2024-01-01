function test(mail){
  document.getElementById("button_suppr").value = mail;
  document.getElementById("confirm").style.display = "block";
  document.getElementById("overlay").style.display = "block";
}

function annul(){
  document.getElementById("button_suppr").value = '';
  document.getElementById("confirm").style.display = "none";
  document.getElementById("overlay").style.display = "none";
}

function suppresion(mail) {
  const recupMail = mail;
  var escapedMail = recupMail.replace("@", "");
  escapedMail = escapedMail.replace(".", "");
  jQuery.ajax({
    url: "_suppresionCompte.php",
    type: "POST",
    data: {
      mailSuprresion: recupMail,
    },
    success: function (data, textStatus, xhr) {
      $("#Utilisateur_" + escapedMail).remove();
    },
    error: function (xhr, textStatus, errorThrown) {
      console.log(textStatus.reponseText);
    },
  });
  document.getElementById("button_suppr").value = '';
  document.getElementById("confirm").style.display = "none";
  document.getElementById("overlay").style.display = "none";
}
function ModificationStatus(mail) {
  const recupMail = mail;
  var escapedMail = recupMail.replace("@", "");
  escapedMail = escapedMail.replace(".", "");
  const IDModification = $("#Changement_" + escapedMail).val();

  jQuery.ajax({
    url: "_modificationStatus.php",
    type: "POST",
    data: {
      mailSuprresion: recupMail,
      NouveauStatus: IDModification,
    },
  });
}

function search() {
  if ($("#search").val().length > 0) {
    $(".affiche").hide();
    for (let i = 0; i < $("#search").val().length; i++) {
      for (let j = 0; j < name_classe_search.length; j++) {
        let input = "Aff_" + $("#search").val();
        let classe = name_classe_search[j].substr(0, 5 + i);
        if (input.toUpperCase() == classe.toUpperCase()) {
          $("." + name_classe_search[j]).show();
        }
      }
    }
  } else {
    $(".affiche").show();
  }
}

function all_status() {
  $(".statusAll").show();
}

function status_pilote() {
  $(".statusAll").hide();
  $(".status_1").show();
}
function status_staff() {
  $(".statusAll").hide();
  $(".status_2").show();
}
function status_adheran() {
  $(".statusAll").hide();
  $(".status_0").show();
}
