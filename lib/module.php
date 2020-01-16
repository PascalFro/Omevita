<?php

/* 
 * Gestion du routage
 */

function module_administrateur($action, $id) {
    if ($action === "connexion_form") {
        connexion_form();
    } elseif ($action === "connexion_traite") {
        connexion_traite();
    } elseif ($action === "deconnexion") {
        deconnexion();
    } elseif ($action === "contact_form") {
        contact_form();
    } elseif ($action === "contact_traite") {
        contact_traite();
    } else {
        connexion_form();
    }
}

function module_reference($action, $id) {
    if ($action === "affiche_liste") {
        affiche_liste();
    } elseif ($action === "affiche_liste_filtre") {
        affiche_liste_filtre();
    } elseif ($action === "affiche_reference") {
        affiche_reference($id);
    } elseif ($action === "modif_formulaire") {
        modif_formulaire($id);
    } elseif ($action === "modif_traite") {
        modif_traite($id);
    } elseif ($action === "nouveau_form") {
        nouveau_form();
    } elseif ($action === "nouveau_traite") {
        nouveau_traite();
    } elseif ($action === "suppresion") {
        suppression_reference($id);
    } else {
        affiche_liste();
    }
}

/*******************************************************************************
 * Traitement des actions pour le module ADMINISTRATEUR
 ******************************************************************************/

function connexion_form() {
    // Rôle : Traite la demande d'affichage du formulaire de connexion
    // Retour : true ou false
    // Paramètres : Néant
    $administrateur = new administrateur();
    include "templates/pages/formulaire_connexion.php";
    return true;
}

function connexion_traite() {
    // Rôle : Traite la demande de vérification de l'identifiant et du mot de passe
    // Retour : true ou false
    // Paramètre : Néant
    
    $_SESSION["connect"] = false;
    $nom = $_POST["nom"];
    $password = $_POST["password"];
    // Charger un nouvel objet
    $administrateur = new administrateur();
    $reference = new reference();
    if ($administrateur->verifLogin($nom, $password)) {
        include "templates/pages/affiche_liste.php";
        return true;       
    } else {
        $administrateur->loadFromPost();
        $erreur = true;
        include "templates/pages/formulaire_connexion.php";
        return false;
    }
}

function deconnexion() {
    // Rôle : Déconnecte l'administrateur de sa session
    // Retour : True ou false
    // Paramètres : Néant
    
    // Déclarer la session fermée (false) et inclure la page d'accueil
    $_SESSION["connect"] = false;
    include "templates/pages/accueil.php";
}
function contact_form() {
    // Rôle : Affiche le formulaire de contact
    // Retour : true ou false
    // Paramètres : Néant
    
    $mode = "Contact";
    include "templates/pages/formulaire_contact.php";
}

function contact_traite() {
    // Rôle : traite le formulaire de contact
    // Retour : true ou false
    // Paramètres : néant
    
    debug("Module traité : administrateur, action : contact_traite");
    // Récupérer les champs du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $tel = $_POST["tel"];
    $email = $_POST["email"];
    $message = $_POST["message"];
        
    // Envoi d'un mail à l'administrateur
    $to = "test@webecom-studio.com";
    $objet = "Nouveau contact";
    $sujet = "";
    $sujet .= "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
    $sujet .= htmlentities("Vous avez reçu un nouveau message de : ") ;
    $sujet .= htmlentities("$nom\n");
    $sujet .= htmlentities("$prenom\n");
    $sujet .= htmlentities("$tel\n");
    $sujet .= htmlentities("$email\n");
    $sujet .= htmlentities("$message\n");
    $head = "From:  'Votre site web' <webecom@60gp.ovh.net>\n";
    $head .= "MIME-Version: 1.0\n";
    $head .= "Content-Type: text/html; charset=utf-8";

    if (!mail($to, $objet, $sujet, $head)) {
        debug("Erreur d'envoi du mail");
        $mode = "Contact";
        include "templates/pages/formulaire_contact.php";
        return false;
    }
    $mode = "Contact";
    include 'templates/pages/remerciements.php';
    return true;
    
}

/*******************************************************************************
 * Traitement des actions pour le module REFERENCE
 ******************************************************************************/


function affiche_liste() {
    // Rôle : Traite la demande d'affichage de la liste
    // Retour : true ou false
    // Paramètres : Néant
    
    debug("Module traité : reference, action : affiche_liste");
    // Charger un nouvel objet
    $reference = new reference();
    $reference->listAll();
    include "templates/pages/affiche_liste.php";
    return true;
}

function affiche_liste_filtre() {
    // Rôle : Traite la demande d'affichage de la liste filtrée
    // Retour : true ou false
    // Paramètres : Néant
    
    debug("Module traité : reference, action : affiche_liste");
    // Charger un nouvel objet
    if (isset($_POST["recherche"])) {
    $texte = $_POST["recherche"];
    }
    $reference = new reference();
    if (!$reference->listFiltre($texte)) {
        include "templates/pages/affiche_liste.php";
        return false;
    }
    include "templates/pages/affiche_liste.php";
    return true;
}

function affiche_reference($id) {
    // Rôle : Traite la demande d'affichage de la reference
    // Retour : True ou false
    // Paramètres : $id : id de la référence à afficher
    
    debug("Module traité : reference, action : affiche_reference");
    
    // Charger un nouvel objet par son id
    $reference = new reference();
    $reference->loadById($id);
    // Inclure la page d'affichage de la référence
    $ref = "Affiche";
    include "templates/pages/affiche_reference.php";
    return true;
}

function modif_formulaire($id) {
    // Rôle : Affiche le formulaire de modification avec les valeurs des attributs chargées
    // Retour : True ou false
    // Paramètres : $id = id de la référence à modifier
    
    debug("Module traité : reference, action : modif_formulaire");
    
    // Charger un nouvel objet
    $reference = new reference();
    $reference->loadById($id);
    include "templates/pages/modif_reference.php";
}

function modif_traite($id) {
    // Rôle : Traite la modification 
    // Retour : True ou false
    // Paramètres : $id = id de la référence à modifier
    
    debug("Module traité : reference, action : modif_traite");
    
    // Charger un nouvel objet
    $reference = new reference();
    if (!$reference->loadById($id)) {
            echo "coucou";
        // Référence non récupérable : on affiche la liste des références (après l'avoir chargée)
        $reference->listAll();
        include "templates/pages/affiche_liste.php";
        return false;
    } else {

        $reference->loadFromPost();

        if ($reference->update()) {
            $ref = "Affiche";
            include "templates/pages/affiche_reference.php";
            return true;
        } else {
            debug("Mise à jour non effectuée");
            include "templates/pages/modif_reference.php";
            return false;
    }
    }
}


function nouveau_form() {
    // Rôle : Affiche le formulaire de création 
    // Retour : True ou false
    // Paramètres : Néant
    
    debug("Module traité : reference, action : nouveau_form");
    $ref = "Insert";
    include "templates/pages/affiche_reference.php";
    return true;
}

function nouveau_traite() {
    // Rôle : Traite la création de la nouvelle référence 
    // Retour : True ou false
    // Paramètres : Néant
    
    debug("Module traité : reference, action : traite_form");
    
    // Charger un nouvel objet
    $reference = new reference();
    // Charger les valeurs des champs depuis le formulaire
    $reference->loadFromPost();
    
    if (!$reference->insert()) {
        debug("Insertion non réalisée");
        $ref = "Insert";
        include "templates/pages/affiche_reference.php";
        return false;
    }
    $ref = "Affiche";
    include "templates/pages/affiche_reference.php";
    return true;
    }
