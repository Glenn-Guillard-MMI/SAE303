function annulSupp() {
    document.getElementById("button_suppr").value = '';
    document.getElementById("confirmBapt").style.display = "none";
    document.getElementById("confirmForm").style.display = "none";
    document.getElementById("confirmForfait").style.display = "none";
    document.getElementById("overlay").style.display = "none";
}

function confirmSuppBapt(arg) {
    //Suppression via Ajax
    document.getElementById("button_suppr").value = '';
    document.getElementById("confirmBapt").style.display = "none";
    document.getElementById("confirmForm").style.display = "none";
    document.getElementById("confirmForfait").style.display = "none";
    document.getElementById("overlay").style.display = "none";
}

function confirmSuppForm(arg) {
    //Suppression via Ajax
    document.getElementById("button_suppr").value = '';
    document.getElementById("confirmBapt").style.display = "none";
    document.getElementById("confirmForm").style.display = "none";
    document.getElementById("confirmForfait").style.display = "none";
    document.getElementById("overlay").style.display = "none";
}

function confirmSuppForfait(arg) {
    //Suppression via Ajax
    document.getElementById("button_suppr").value = '';
    document.getElementById("confirmBapt").style.display = "none";
    document.getElementById("confirmForm").style.display = "none";
    document.getElementById("confirmForfait").style.display = "none";
    document.getElementById("overlay").style.display = "none";
}

function modifBapt() {
    document.getElementById('modif-bapteme').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

function annModBapt() {
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('modif-bapteme').style.display = 'none';
    var form = document.getElementById("form-modif-bapteme");
    for (var i = 0; i < form.elements.length; i++) {
        var element = form.elements[i];
        if (element.type == "text" || element.type == "number" || element.type == "file") {
            element.value = "";
        }
    }
}

function supprBapt(arg) {
    console.log(arg);
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('button_suppr').value = arg;
    document.getElementById('confirmBapt').style.display = 'block';
}

function ajoutBapt(){
    document.getElementById('ajout-bapteme').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

function annAjoutBapt(){
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('ajout-bapteme').style.display = 'none';
    var form = document.getElementById("form-ajout-bapteme");
    for (var i = 0; i < form.elements.length; i++) {
        var element = form.elements[i];
        if (element.type == "text" || element.type == "number" || element.type == "file") {
            element.value = "";
        }
    }
}



function modifForm() {
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('modif-formation').style.display = 'block';
}

function annModForm() {
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('modif-formation').style.display = 'none';
    var form = document.getElementById("form-modif-formation");
    for (var i = 0; i < form.elements.length; i++) {
        var element = form.elements[i];
        if (element.type == "text" || element.type == "number" || element.type == "file") {
            element.value = "";
        }
    }
}

function supprForm(arg) {
    console.log(arg);
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('button_suppr').value = arg;
    document.getElementById('confirmForm').style.display = 'block';
}

function ajoutForm(){
    document.getElementById('ajout-formation').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

function annAjoutForm(){
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('ajout-formation').style.display = 'none';
    var form = document.getElementById("form-ajout-formation");
    for (var i = 0; i < form.elements.length; i++) {
        var element = form.elements[i];
        if (element.type == "text" || element.type == "number" || element.type == "file") {
            element.value = "";
        }
    }
}



function modifForfait() {
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('modif-forfait').style.display = 'block';
}

function annModForfait() {
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('modif-forfait').style.display = 'none';
    var form = document.getElementById("form-modif-forfait");
    for (var i = 0; i < form.elements.length; i++) {
        var element = form.elements[i];
        if (element.type == "text" || element.type == "number" || element.type == "file") {
            element.value = "";
        }
    }
}

function supprForfait(arg) {
    console.log(arg);
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('button_suppr').value = arg;
    document.getElementById('confirmForfait').style.display = 'block';
}

function ajoutForfait(){
    document.getElementById('ajout-forfait').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

function annAjoutForfait(){
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('ajout-forfait').style.display = 'none';
    var form = document.getElementById("form-ajout-forfait");
    for (var i = 0; i < form.elements.length; i++) {
        var element = form.elements[i];
        if (element.type == "text" || element.type == "number" || element.type == "file") {
            element.value = "";
        }
    }
}

function ajouterInfo(containerId) {
    var container = document.getElementById(containerId);

    // Récupérer tous les champs de texte dans le conteneur
    var champsTexte = container.querySelectorAll('input[type="text"]');

    // Vérifier si tous les champs ont du texte
    var tousOntDuTexte = Array.from(champsTexte).every(function(champ) {
        return champ.value.trim() !== ''; // Vérifier si le champ n'est pas vide
    });

    // Si tous les champs ont du texte ou s'il n'y a pas d'enfant, ajouter un nouvel input
    if (tousOntDuTexte || champsTexte.length === 0) {
        var nouvelInput = document.createElement('input');
        nouvelInput.type = 'text';
        nouvelInput.name = 'titre';
        nouvelInput.classList.add('ms-4', 'mb-0','mt-3');

        // Ajouter le nouvel input au conteneur
        container.appendChild(nouvelInput);
    }
}


function supprInfo(containerId) {
    var container = document.getElementById(containerId);
    var dernierEnfant = container.lastElementChild;

    if (dernierEnfant && dernierEnfant.tagName.toLowerCase() === 'input') {
        container.removeChild(dernierEnfant);
    }
}

