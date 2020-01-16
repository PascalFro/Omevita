/* 
 * Fonctions JS pour le site omevita
 */


function menuScrolled() {
    // Rôle : Changer la class du header s'il est positionné en dessous du slider
    // Retour : Néant
    // Paramètres : Néant
    
    // Récupérer le header
    var header = document.querySelector("header");
    // Récupérer le slider
    var slider = document.getElementById("slider");
    var windowPosition = window.pageYOffset;
    var basSlider = slider.offsetTop + slider.offsetHeight;
    
    if (windowPosition > basSlider) {
        header.classList.add("bg-f8a36c");
    } else {
        header.classList.remove("bg-f8a36c");
    }
}

function backToTop() {
    // Rôle : Changer la classe du picto backToTop dès que la page est scrollée et atteint un niveau défini
    // Retour : Néant
    // Paramètres : Néant
    
    // Récupérer le picto
    var backToTop = document.getElementById("backToTop");
    // Récupérer la position de la page
    var windowPosition = window.pageYOffset;
    if (windowPosition > 800) {
        backToTop.classList.remove("inactive");
        backToTop.classList.add("active");
    } else {
        backToTop.classList.add("inactive");
        backToTop.classList.remove("active");
    }
    }
    
/* 
 * Fonctions de vérification du formulaire
 */

function verifNom() {
    // Rôle : Vérifier le champs nom
    // Retour : true ou false
    // Paramètres : Néant
    
    // Récupérer le champ à contrôler
    var champ = document.getElementById("nom");
    // Récupérer la valeur du champs à contrôler
    var valeur = champ.value;
    //  Récupérer le paragraphe d'affichage de l'erreur
    var erreur = document.getElementById("error-nom");
    // Définir la validité du champs
    var regExp = /^[A-Za-z-]{1,}$/;
    
    // Si le contenu du champs est bon
    if (regExp.test(valeur)) {
        // On enlève les attributs d'erreur
        champ.classList.remove("input-error");
        erreur.classList.remove("p-error");
        // On enlève l'affichage du paragraphe d'erreur
        erreur.innerHTML = "";    
        // On retourne true
        return true;
    } else {
        // Sinon, on ajoute les attributs d'erreur
        champ.classList.add("input-error");
        erreur.classList.add("p-error");
        // On active l'affichage du paragraphe d'erreur
        erreur.innerHTML = "Merci de ne saisir que des lettres et au moins 1";
        // On retourne false 
        return false;
        }
}

function verifPrenom() {
    // Rôle : Vérifier le champs prenom
    // Retour : true ou false
    // Paramètres : Néant
    
    // Récupérer le champ à contrôler
    var champ = document.getElementById("prenom");
    // Récupérer la valeur du champs à contrôler
    var valeur = champ.value;
    //  Récupérer le paragraphe d'affichage de l'erreur
    var erreur = document.getElementById("error-prenom");
    // Définir la validité du champs
    var regExp = /^[A-Za-z-]{1,}$/;
    
    // Si le contenu du champs est bon
    if (regExp.test(valeur)) {
        // On enlève les attributs d'erreur
        champ.classList.remove("input-error");
        erreur.classList.remove("p-error");
        // On enlève l'affichage du paragraphe d'erreur
        erreur.innerHTML = "";    
        // On retourne true
        return true;
    } else {
        // Sinon, on ajoute les attributs d'erreur
        champ.classList.add("input-error");
        erreur.classList.add("p-error");
        // On active l'affichage du paragraphe d'erreur
        erreur.innerHTML = "Merci de ne saisir que des lettres et au moins 1";
        // On retourne false 
        return false;
        }
}
function verifTel() {
    // Rôle : Vérifier le champs tel
    // Retour : true ou false
    // Paramètres : Néant
    
    // Récupérer le champ à contrôler
    var champ = document.getElementById("tel");
    // Récupérer la valeur du champs à contrôler
    var valeur = champ.value;
    //  Récupérer le paragraphe d'affichage de l'erreur
    var erreur = document.getElementById("error-tel");
    // Définir la validité du champs
    var regExp = /^[0-9]{10}$/;
    
    // Si le contenu du champs est bon
    if (regExp.test(valeur)) {
        // On enlève les attributs d'erreur
        champ.classList.remove("input-error");
        erreur.classList.remove("p-error");
        // On enlève l'affichage du paragraphe d'erreur
        erreur.innerHTML = "";    
        // On retourne true
        return true;
    } else {
        // Sinon, on ajoute les attributs d'erreur
        champ.classList.add("input-error");
        erreur.classList.add("p-error");
        // On active l'affichage du paragraphe d'erreur
        erreur.innerHTML = "Merci de ne saisir que des chiffres et au format NNNNNNNNNN";
        // On retourne false
        return false;
        }
}
function verifEmail() {
    // Rôle : Vérifier le champs email
    // Retour : true ou false
    // Paramètres : Néant
    
    // Récupérer le champ à contrôler
    var champ = document.getElementById("email");
    // Récupérer la valeur du champs à contrôler
    var valeur = champ.value;
    //  Récupérer le paragraphe d'affichage de l'erreur
    var erreur = document.getElementById("error-email");
    // Définir la validité du champs
    var regExp = /^[a-z0-9]{3,}[@][a-z]{3,}[.][a-z]{2,}$/;
    
    // Si le contenu du champs est bon
    if (regExp.test(valeur)) {
        // On enlève les attributs d'erreur
        champ.classList.remove("input-error");
        erreur.classList.remove("p-error");
        // On enlève l'affichage du paragraphe d'erreur
        erreur.innerHTML = "";    
        // On retourne true
        return true;
    } else {
        // Sinon, on ajoute les attributs d'erreur
        champ.classList.add("input-error");
        erreur.classList.add("p-error");
        // On active l'affichage du paragraphe d'erreur
        erreur.innerHTML = "Merci de saisir une adresse au format xxx@xxx.xx ";
        // On retourne false 
        return false;
        }
}
function verifObjet() {
    // Rôle : Vérifier le champs objet
    // Retour : true ou false
    // Paramètres : Néant
    
    // Récupérer le champ à contrôler
    var champ = document.getElementById("objet");
    // Récupérer la valeur du champs à contrôler
    var valeur = champ.value;
    //  Récupérer le paragraphe d'affichage de l'erreur
    var erreur = document.getElementById("error-objet");
    // Définir la validité du champs
    var regExp = /^[A-Za-z0-9]{1,}$/;
    
    // Si le contenu du champs est bon
    if (regExp.test(valeur)) {
        // On enlève les attributs d'erreur
        champ.classList.remove("input-error");
        erreur.classList.remove("p-error");
        // On enlève l'affichage du paragraphe d'erreur
        erreur.innerHTML = "";    
        // On retourne true
        return true;
    } else {
        // Sinon, on ajoute les attributs d'erreur
        champ.classList.add("input-error");
        erreur.classList.add("p-error");
        // On active l'affichage du paragraphe d'erreur
        erreur.innerHTML = "Merci de ne saisir que des lettre et des chiffres sans caractères spéciaux";
        // On retourne false 
        return false;
        }
}

function verifFormulaire () {
    // Rôle : Vérifie le formulaire
    // retour : true ou false
    // Paramètre : Néant
    
    // Si toutes les vérifications sont bonnes
    if (verifNom() && verifPrenom() && verifTel() && verifEmail() && verifObjet()) {
    // on retourne true
    return true;
    } else {
    // Sinon on retourne false
    return false;
    }
}