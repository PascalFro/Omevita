/* 
 slider javascript
 */

function suivante() {
    /*
     * Role : afficher le slide suivant
     * param : néant
     * retour: néant
     */

    var slide1 = document.getElementById('slide1');
    var slide2 = document.getElementById('slide2');
    var slide3 = document.getElementById('slide3');
    var slide4 = document.getElementById('slide4');

    if (slide1.classList.contains("active")) {
        slide1.classList.remove("active");
        slide2.classList.add("active");
    } else if (slide2.classList.contains("active")) {
        slide2.classList.remove("active");
        slide3.classList.add("active");
    } else if (slide3.classList.contains("active")) {
        slide3.classList.remove("active");
        slide4.classList.add("active");
    } else if (slide4.classList.contains("active")) {
        slide4.classList.remove("active");
        slide1.classList.add("active");
    }
}

function precedente() {
    /*
     * Role : afficher le slide precedent
     * param : néant
     * retour: néant
     */

    var slide1 = document.getElementById('slide1');
    var slide2 = document.getElementById('slide2');
    var slide3 = document.getElementById('slide3');
    var slide4 = document.getElementById('slide4');

    if (slide1.classList.contains("active")) {
        slide1.classList.remove("active");
        slide4.classList.add("active");
    } else if (slide2.classList.contains("active")) {
        slide2.classList.remove("active");
        slide1.classList.add("active");
    } else if (slide3.classList.contains("active")) {
        slide3.classList.remove("active");
        slide2.classList.add("active");
    } else if (slide4.classList.contains("active")) {
        slide4.classList.remove("active");
        slide3.classList.add("active");
    }
}


