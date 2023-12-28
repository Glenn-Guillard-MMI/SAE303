function test(mail2) {
  const mail3 = mail2;
  console.log(mail3);
  var confirm = document.getElementById("confirm"),
  button_suppr = document.getElementById("button_suppr");
  var overlay = document.querySelector('.overlay');
  overlay.style.display = 'block';
  confirm.style.display = "block";
  button_suppr.value = mail3;
  document.body.style.overflow = 'hidden';
}

function annul(){
  var confirm = document.getElementById("confirm"),
  button_suppr = document.getElementById("button_suppr");
  var overlay = document.querySelector('.overlay');
  overlay.style.display = 'none';
  button_suppr.value = " ";
  confirm.style.display = "none";
  document.body.style.overflow = 'auto';
}

function suppresion(mail) {
  const recupMail = mail;
  //console.log(recupMail);
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
  var confirm = document.getElementById("confirm")
  button_suppr = document.getElementById("button_suppr");
  var overlay = document.querySelector('.overlay');
  overlay.style.display = 'none';
  button_suppr.value = " ";
  confirm.style.display = "none";
  document.body.style.overflow = 'auto';
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
