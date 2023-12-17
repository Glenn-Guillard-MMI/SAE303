let verif_nom = false;
let verif_prenom = false;
let verif_mail = false;

function verification_nom() {
  const nom = document.getElementById("nom").value;
  if (nom !== "") {
    verif_nom = true;
  } else {
    verif_nom = false;
  }
  button_disable_abled();
}

function verification_prenom() {
  const prenom = document.getElementById("prenom").value;
  if (prenom !== "") {
    verif_prenom = true;
  } else {
    verif_prenom = false;
  }
  button_disable_abled();
}

function button_disable_abled() {
  if (verif_nom && verif_prenom) {
    document.getElementById("push").disabled = false;
  } else {
    document.getElementById("push").disabled = true;
  }
}
