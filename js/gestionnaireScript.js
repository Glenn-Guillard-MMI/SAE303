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
