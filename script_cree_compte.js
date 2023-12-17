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

function verification_mail() {
  const mail = document.getElementById("email").value;

  if (mail !== "" && mail.indexOf("@") !== -1 && mail.indexOf(".") !== -1) {
    verif_mail = true;
  } else {
    verif_mail = false;
  }
  button_disable_abled();
}
function button_disable_abled() {
  if (verif_mail && verif_prenom && verif_nom) {
    document.getElementById("push").disabled = false;
  } else {
    document.getElementById("push").disabled = true;
  }
}
