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
