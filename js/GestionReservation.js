function SelectionBaptemeMatricule(arg) {
  const matricule = document.getElementById(
    "Selection_matricule_bapteme_" + arg
  ).value;

  jQuery.ajax({
    url: "_matriculeReservationBapteme.php",
    type: "POST",
    data: {
      id: arg,
      matricule: matricule,
    },
    success: function (data, textStatus, xhr) {
      console.log(data);
    },
  });
}

function SelectionBaptemePilote(arg) {
  const pilote = document.getElementById(
    "Selection_pilote_bapteme_" + arg
  ).value;

  jQuery.ajax({
    url: "_piloteReservationBapteme.php",
    type: "POST",
    data: {
      id: arg,
      pilote: pilote,
    },
    success: function (data, textStatus, xhr) {
      console.log(data);
    },
  });
}
function AccepterBaptemePilote(arg) {
  jQuery.ajax({
    url: "_accepterReservationBapteme.php",
    type: "POST",
    data: {
      id: arg,
    },
    success: function (data, textStatus, xhr) {
      location.reload();
    },
  });
}

function RefuserBaptemePilote(arg) {
  jQuery.ajax({
    url: "_refuserReservationBapteme.php",
    type: "POST",
    data: {
      id: arg,
    },
    success: function (data, textStatus, xhr) {
      location.reload();
    },
  });
}

function AccepterFormation(arg) {
  jQuery.ajax({
    url: "_accepteReservationformation.php",
    type: "POST",
    data: {
      id: arg,
    },
    success: function (data, textStatus, xhr) {
      location.reload();
    },
  });
}
function RefuserFormation(arg) {
  jQuery.ajax({
    url: "_refuserReservationformation.php",
    type: "POST",
    data: {
      id: arg,
    },
    success: function (data, textStatus, xhr) {
      location.reload();
    },
  });
}
function AccepterForfait(arg) {
  jQuery.ajax({
    url: "_accepteReservationforfait.php",
    type: "POST",
    data: {
      id: arg,
    },
    success: function (data, textStatus, xhr) {
      location.reload();
    },
  });
}

function RefuserForfait(arg) {
  jQuery.ajax({
    url: "_refuserReservationforfait.php",
    type: "POST",
    data: {
      id: arg,
    },
    success: function (data, textStatus, xhr) {
      location.reload();
    },
  });
}

let attente = true,
  valid = false;

verifButton();

function verifButton() {
  var buttonAtt = document.getElementById("attente-button"),
    buttonValid = document.getElementById("valid-button"),
    liste_attente = document.getElementById("bapteme-attente"),
    liste_licence = document.getElementById("bapteme-valid"),
    liste_form_forf = document.getElementById("forfait_form_valid"),
    liste_attente_form = document.getElementById("formation-attente"),
    liste_attente_forf = document.getElementById("forfait");

  if (attente == true) {
    buttonAtt.style.pointerEvents = "none";
    buttonValid.style.pointerEvents = "auto";

    buttonAtt.style.backgroundColor = "";
    buttonAtt.style.color = "";
    buttonValid.style.backgroundColor = "#002962";
    buttonValid.style.color = "#fff";

    liste_attente.style.display = "block";
    liste_attente.style.userSelect = "auto";
    liste_attente_forf.style.display = "block";
    liste_attente_forf.style.userSelect = "auto";
    liste_attente_form.style.display = "block";
    liste_attente_form.style.userSelect = "auto";

    liste_licence.style.display = "none";
    liste_licence.style.userSelect = "none";
    liste_form_forf.style.display = "none";
    liste_form_forf.style.userSelect = "none";
  }
  if (valid == true) {
    buttonValid.style.pointerEvents = "none";
    buttonAtt.style.pointerEvents = "auto";

    buttonValid.style.backgroundColor = "#fff";
    buttonValid.style.color = "#002962";
    buttonValid.style.borderColor = "#002962";
    buttonAtt.style.backgroundColor = "#002962";
    buttonAtt.style.color = "#fff";

    liste_attente.style.display = "none";
    liste_attente.style.userSelect = "none";
    liste_attente_forf.style.display = "none";
    liste_attente_forf.style.userSelect = "none";
    liste_attente_form.style.display = "none";
    liste_attente_form.style.userSelect = "none";

    liste_licence.style.display = "block";
    liste_licence.style.userSelect = "auto";
    liste_form_forf.style.display = "block";
    liste_form_forf.style.userSelect = "auto";
  }
}

function affAttente() {
  attente = true;
  valid = false;
  verifButton();
}

function affValid() {
  attente = false;
  valid = true;
  verifButton();
}
