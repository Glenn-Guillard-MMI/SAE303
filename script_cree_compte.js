let verif_nom = false;
let verif_prenom = false;
let verif_mail = false;
let verif_num = false;

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

function verification_num() {
  let num = document.getElementById("num").value;

  const liste_cara = [
    "A",
    "B",
    "C",
    "D",
    "E",
    "F",
    "G",
    "H",
    "I",
    "J",
    "K",
    "L",
    "M",
    "N",
    "O",
    "P",
    "Q",
    "R",
    "S",
    "T",
    "U",
    "V",
    "W",
    "X",
    "Y",
  ];

  for (let i = 0; i < num.length; i++) {
    if (liste_cara.includes(num[i].toUpperCase())) {
      document.getElementById("num").value =
        num.substring(0, i) + num.substring(i + 1);
    }
  }
  if (num.length > 10) {
    document.getElementById("num").value = num.substring(0, 10);
    verification_num();
  }
  if (num.length != 10) {
    console.log(num.length);
    verif_num = false;
  } else {
    console.log(num.length);
    console.log("yeah");

    verif_num = true;
  }
  button_disable_abled();
}
function button_disable_abled() {
  if (verif_mail && verif_prenom && verif_nom && verif_num) {
    document.getElementById("push").disabled = false;
  } else {
    document.getElementById("push").disabled = true;
  }
}
