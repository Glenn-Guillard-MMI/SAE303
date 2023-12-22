// Vérification Image
let image = false;

function VerifImage() {
  const img = document.getElementById("img");

  if (img.files[0] != undefined) {
    image = true;
  } else {
    image = false;
  }
  button_onOff();
}

// Vérification Nom
let nom = false;
function VerifName() {
  const name = document.getElementById("name").value;
  if (name != "") {
    nom = true;
  } else {
    nom = false;
  }
  button_onOff();
}
//Vérification formulaire solo et duo
let formulaire_solo_et_duo = false;
function VerifCheckboxFormule() {
  const formulaire_solo = document.getElementById("solo");
  const formulaire_duo = document.getElementById("duo");
  if (formulaire_solo.checked || formulaire_duo.checked) {
    formulaire_solo_et_duo = true;
  } else {
    formulaire_solo_et_duo = false;
  }
  button_onOff();
}

//Vérification formulaire 20 et 30
let formulaire_20_et_30 = false;
function temps() {
  const formulaire_20 = document.getElementById("20");
  const formulaire_30 = document.getElementById("30");
  if (formulaire_20.checked || formulaire_30.checked) {
    formulaire_20_et_30 = true;
  } else {
    formulaire_20_et_30 = false;
  }

  button_onOff();
}

//Vérification prix
let prix = false;
function VerifCheckboxtemps() {
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

  if (num != "") {
    prix = true;
  } else {
    prix = false;
  }
  button_onOff();
}

//Mettre boutton on ou off
function button_onOff() {
  console.log("img =" + image);
  console.log("prix =" + prix);
  console.log("nom =" + nom);
  console.log("formulaire 20 =" + formulaire_20_et_30);
  console.log("formulaire solo =" + formulaire_solo_et_duo);
  if (image && prix && nom && formulaire_solo_et_duo && formulaire_20_et_30) {
    document.getElementById("submit").disabled = false;
  } else {
    document.getElementById("submit").disabled = true;
  }
}
