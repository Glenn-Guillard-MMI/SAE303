let verif_nom = false;
let verif_prenom = false;
let verif_mail = false;
let verif_num = false;
let verif_password = false;
let verifi_birthday = false;
let code_verif = false;
let phys_addresse = false;

function verification_nom() {
  const nom = document.getElementById("nom").value;
  if (nom !== "") {
    verif_nom = true;
  } else {
    verif_nom = false;
  }
  button_disable_abled();
}

function verification_password() {
  const password = document.getElementById("password").value;
  if (password !== "") {
    verif_password = true;
  } else {
    verif_password = false;
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
    verif_num = false;
  } else {
    verif_num = true;
  }
  button_disable_abled();
}

function Vbirthday() {
  const birthday = document.getElementById("birthday").value;
  if (birthday != "") {
    verifi_birthday = true;
  } else {
    verifi_birthday = false;
  }
  button_disable_abled();
}
function verif_code() {
  const code = document.getElementById("code_addresse").value;
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

  for (let i = 0; i < code.length; i++) {
    if (liste_cara.includes(code[i].toUpperCase())) {
      document.getElementById("code_addresse").value =
        code.substring(0, i) + code.substring(i + 1);
    }
  }
  if (code.length > 5) {
    document.getElementById("code_addresse").value = code.substring(0, 5);
    verif_code();
  }
  if (code.length != 0) {
    code_verif = true;
  } else {
    code_verif = false;
  }

  button_disable_abled();
}

function verif_physique() {
  const addresse = document.getElementById("physique_addresse").value;
  if (addresse !== "") {
    phys_addresse = true;
  } else {
    phys_addresse = false;
  }
  button_disable_abled();
}

function button_disable_abled() {
  if (
    verif_mail &&
    verif_prenom &&
    verif_nom &&
    verif_num &&
    verif_password &&
    verifi_birthday &&
    code_verif &&
    phys_addresse
  ) {
    document.getElementById("push").disabled = false;
  } else {
    document.getElementById("push").disabled = true;
  }
}