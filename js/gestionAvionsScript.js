let verif_matricule = false;
let verifi_Class = false;
let verifi_Nom = false;

function ajoutAvion(){
  document.getElementById('ajout_avion_form').style.display = 'block';
  document.getElementById('ajout_avion_form').style.userSelect = 'auto';
  document.getElementById("overlay").style.display = "block";
}

function annulCrea(){
  document.getElementById('ajout_avion_form').style.display = 'none';
  document.getElementById('ajout_avion_form').style.userSelect = 'none';
  document.getElementById("overlay").style.display = "none";
}

function test(suppr){
  console.log(suppr);
  document.getElementById("button_suppr").value = suppr;
  document.getElementById("confirm").style.display = "block";
  document.getElementById("overlay").style.display = "block";
}

function annul(){
  document.getElementById("button_suppr").value = '';
  document.getElementById("confirm").style.display = "none";
  document.getElementById("overlay").style.display = "none";
}


function supression(arg) {
  const argument = arg;
  jQuery.ajax({
    url: "_suppresionAvion.php",
    type: "POST",
    data: {
      Suprresion: argument,
    },
    success: function (data, textStatus, xhr) {
      $("#Matricule_" + arg).remove();
    },
  });
  document.getElementById("button_suppr").value = '';
  document.getElementById("confirm").style.display = "none";
  document.getElementById("overlay").style.display = "none";
}

function vérifiMatricule() {
  const matricule = document.getElementById("Matricule").value;
  if (matricule.length > 6) {
    document.getElementById("Matricule").value = matricule.substring(0, 6);
    vérifiMatricule();
  } else {
    document.getElementById("Matricule").value = matricule.toUpperCase();
  }
  if (matricule.length == 6) {
    verif_matricule = true;
  } else {
    verif_matricule = false;
  }
  button_disable_abled();
}

function vérifiClass() {
  const Class = document.getElementById("Class").value;
  if (Class != "") {
    verifi_Class = true;
  } else {
    verifi_Class = false;
  }
  button_disable_abled();
}

function vérifiNom() {
  const Nom = document.getElementById("Nom").value;
  if (Nom != "") {
    verifi_Nom = true;
  } else {
    verifi_Nom = false;
  }
  button_disable_abled();
}

function button_disable_abled() {
  if (verif_matricule && verifi_Class) {
    document.getElementById("push").disabled = false;
  } else {
    document.getElementById("push").disabled = true;
  }
}
