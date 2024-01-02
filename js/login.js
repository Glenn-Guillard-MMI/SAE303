function modifCompte() {
  document.getElementById("modif_compte").style.display = "block";
  document.getElementById("modif_compte").style.userSelect = "auto";
  document.getElementById("overlay").style.display = "block";
}

function annulModif() {
  document.getElementById("modif_compte").style.display = "none";
  document.getElementById("overlay").style.display = "none";
  document.getElementById("modif_compte").style.userSelect = "none";
}

function modifMdp() {
  document.getElementById("modif_mdp").style.display = "block";
  document.getElementById("overlay").style.display = "block";
  document.getElementById("modif_mdp").style.userSelect = "auto";
}

function annulMdp() {
  document.getElementById("modif_mdp").style.display = "none";
  document.getElementById("overlay").style.display = "none";
  document.getElementById("modif_mdp").style.userSelect = "none";
}

function pushlicence() {
  const input = document.getElementById("licence");
  const file = input.files[0];
  const formData = new FormData();
  formData.append("licence", file);
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "_ajoutLicence.php", true);
  xhr.send(formData);
  $("#disparition").hide();
  location.reload();
}
