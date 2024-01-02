let modif_nom = true,
    modif_prenom = true,
    modif_adresse = true,
    modif_code_postale = true,
    modif_ville = true,
    modif_mail = true,
    modif_tel = true;

function button_disable_abled() {
    if (modif_nom && modif_prenom && modif_adresse && modif_code_postale && modif_ville && modif_mail && modif_tel) {
        document.getElementById("push").disabled = false;
    } else {
        document.getElementById("push").disabled = true;
    }
}

function verif_nom() {
    const nom = document.getElementById("modif_nom").value;
    if (nom !== "") {
        modif_nom = true;
    } else {
        modif_nom = false;
    }
    button_disable_abled();
}

function verif_prenom() {
    const nom = document.getElementById("modif_prenom").value;
    if (nom !== "") {
        modif_prenom = true;
    } else {
        modif_prenom = false;
    }
    button_disable_abled();
}

function verif_adresse() {
    const nom = document.getElementById("modif_adresse").value;
    if (nom !== "") {
        modif_adresse = true;
    } else {
        modif_adresse = false;
    }
    button_disable_abled();
}

function verif_code() {
    const code = document.getElementById("modif_code_post").value;
    const liste_cara = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
  
    for (let i = 0; i < code.length; i++) {
        if (!liste_cara.includes(parseInt(code[i]))) {
            document.getElementById("modif_code_post").value =
                code.substring(0, i) + code.substring(i + 1);
        }
    }
    if (code.length > 5) {
        document.getElementById("modif_code_post").value = code.substring(0, 5);
        verif_code();
    }
    
    if (code.length == 5) {
        modif_code_postale = true;
    } else {
        modif_code_postale = false;
    }

    button_disable_abled();
}

function verif_ville() {
    const nom = document.getElementById("modif_ville").value;
    if (nom !== "") {
        modif_ville = true;
    } else {
        modif_ville = false;
    }
    button_disable_abled();
}

function verif_mail() {
    const mail = document.getElementById("modif_mail").value;

    if (mail !== "" && mail.indexOf("@") !== -1 && mail.indexOf(".") !== -1) {
        modif_mail = true;
    } else {
        modif_mail = false;
    }
    button_disable_abled();
}

function verif_tel() {
    let num = document.getElementById("modif_tel").value;
    const liste_cara = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
  
    for (let i = 0; i < num.length; i++) {
      if (!liste_cara.includes(parseInt(num[i]))) {
        document.getElementById("modif_tel").value =
          num.substring(0, i) + num.substring(i + 1);
      }
    }
    if (num.length > 10) {
      document.getElementById("modif_tel").value = num.substring(0, 10);
      verif_tel();
    }
    if (num.length != 10) {
        modif_tel = false;
    } else {
        modif_tel = true;
    }
    button_disable_abled();
}

function modifCompte() {
    document.getElementById("modif_compte").style.display = "block";
    document.getElementById("modif_compte").style.userSelect = "auto";
    document.getElementById("overlay").style.display = "block";
}

function annulModif() {
    window.location.href = "php_login.php";
}

function modifMdp() {
    document.getElementById("modif_mdp").style.display = "block";
    document.getElementById("overlay").style.display = "block";
    document.getElementById("modif_mdp").style.userSelect = "auto";
}

function annulMdp() {
    window.location.href = "php_login.php";
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
