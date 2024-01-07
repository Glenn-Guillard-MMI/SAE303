var menu = false;
function derouleNav() {
    var nav = document.getElementById("nav-responsive"),
        lien = document.getElementById("lien_menu"),
        navBalise = document.getElementById("nav-responsive-balise");
        console.log(lien);
    if (menu == true) {
        nav.style.background = "linear-gradient(180deg, rgba(0, 41, 98, 0.90) 11.85%, rgba(0, 54, 129, 0.45) 56.64%, rgba(0, 78, 137, 0.20) 76.95%, rgba(0, 78, 137, 0.00) 100%, rgba(0, 78, 137, 0.00) 100%)";
        nav.style.height = "auto";
        nav.style.width = "100vw";
        document.body.style.overflow = "auto";
        lien.style.display = "none";
        menu = false;
        navBalise.style.height = "auto";
    } else {
        nav.style.background = "#002962";
        nav.style.height = "100vh";
        nav.style.width = "100vw";
        document.body.style.overflow = "hidden";
        lien.style.display = "flex";
        lien.style.height = "90%";
        menu = true;
        navBalise.style.height = "100%";
    }
}