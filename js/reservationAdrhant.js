function SuppressionBatptemeAdherant(arg) {
  const argument = arg;
  jQuery.ajax({
    url: "_suppresionreservationadhearnt.php",
    type: "POST",
    data: {
      id: argument,
    },
    success: function (data, textStatus, xhr) {
      location.reload();
    },
  });
  document.getElementById("confirmBapt").style.display = "none";
  document.getElementById("overlay").style.display = "none";
}
function SuppressionForfaitAdherant(arg) {
  const argument = arg;
  jQuery.ajax({
    url: "_suppresionreservationforfiatadhearnt.php",
    type: "POST",
    data: {
      id: argument,
    },
    success: function (data, textStatus, xhr) {
      location.reload();
    },
  });
  document.getElementById("confirmForfait").style.display = "none";
  document.getElementById("overlay").style.display = "none";
}
function SuppressionFormationAdherant(arg) {
  const argument = arg;
  jQuery.ajax({
    url: "_suppresionreservationformationadhearnt.php",
    type: "POST",
    data: {
      id: argument,
    },
    success: function (data, textStatus, xhr) {
      location.reload();
    },
  });
  document.getElementById("confirmForm").style.display = "none";
  document.getElementById("overlay").style.display = "none";
}


function confirmsupprBapt(idArg){
  document.getElementById("button_supprBapt").value = idArg;
  document.getElementById("confirmBapt").style.display = "block";
  document.getElementById("overlay").style.display = "block";
}

function confirmsupprForm(idArg){
  document.getElementById("button_supprForm").value = idArg;
  document.getElementById("confirmForm").style.display = "block";
  document.getElementById("overlay").style.display = "block";
}

function confirmsupprForfait(idArg){
  document.getElementById("button_supprForfait").value = idArg;
  document.getElementById("confirmForfait").style.display = "block";
  document.getElementById("overlay").style.display = "block";
}

function annul(){
  document.getElementById("button_supprForfait").value = " ";
  document.getElementById("confirmForfait").style.display = "none";

  document.getElementById("button_supprForm").value = " ";
  document.getElementById("confirmForm").style.display = "none";

  document.getElementById("button_supprBapt").value = " ";
  document.getElementById("confirmBapt").style.display = "none";

  document.getElementById("overlay").style.display = "none";
}
