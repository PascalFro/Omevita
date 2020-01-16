<?php

/*
 * Gestion du routage
 */

function module_contact($action,$id) { // Actions possibles :
    if ($action === "affiche_form") {
        contact_affiche_form();
    } elseif ($action === "traite_form") {
        contact_traite_form();
    } else {
        contact_affiche_form();
    }
}


function module_admin($action, $id) { // Actions possibles : Afficher le formulaire de connexion, traiter le formulaire de connexion, afficher une liste de tous les administrateurs, afficher une liste filtrée des administrateurs, afficher un seul administrateur, afficher le formualire de modification d'un administrateur, traiter le formulaire de modifcation d'un administrateur, afficher le formulaire de création d'un administrateur, traiter le formulaire de création d'un administrateur, supprimer un administrateur
    if ($action === "connexion_form") {
        admin_affiche_connexion_form();
    } elseif ($action === "connexion_traite") {
        admin_traite_connexion_form();
    } elseif ($action === "deconnexion_traite") {
        admin_deconnexion_traite();
    } elseif ($action === "affiche_admin") {
        admin_affiche_admin($id);
    } elseif ( $action === "affiche_liste_complete") {
        admin_affiche_liste_complete();
    } elseif ( $action === "affiche_liste_filtree") {
        admin_affiche_liste_filtree();
    } elseif ( $action === "modif_admin_form") {
        admin_modif_admin_form($id);
    } elseif ( $action === "modif_admin_traite") {
        admin_modif_admin_traite($id);
    } elseif ( $action === "creation_admin_form") {
        admin_creation_admin_form();
    } elseif ( $action === "creation_admin_traite") {
        admin_creation_admin_traite();
    } elseif ( $action === "suppression_admin") {
        admin_suppression_admin($id);
    } else {
        admin_affiche_connexion_form();
    }
}

function module_agence($action, $id) { // Actions possibles : Afficher une liste de toutes les agences, afficher une liste filtrée des agences, afficher une seule agence, afficher le formualire de modification d'une agence, traiter le formulaire de modification d'une agence, afficher le formulaire de création d'une agence, traiter le formulaire de création d'une agence, supprimer une agence
    if ($action === "affiche_agence") {
        agence_affiche_agence($id);
    } elseif ( $action === "affiche_liste_complete") {
        agence_affiche_liste_complete();
    } elseif ( $action === "affiche_liste_filtree") {
        agence_affiche_liste_filtree();
    } elseif ( $action === "modif_agence_form") {
        agence_modif_agence_form($id);
    } elseif ( $action === "modif_agence_traite") {
        agence_modif_agence_traite($id);
    } elseif ( $action === "creation_agence_form") {
        agence_creation_agence_form();
    } elseif ( $action === "creation_agence_traite") {
        agence_creation_agence_traite();
    } elseif ( $action === "suppression_agence") {
        agence_suppression_agence($id);
    } else {
        agence_affiche_liste_complete();
    }
}

/*******************************************************************************
 * Traitements des actions pour le module AGENCE
 ******************************************************************************/
function agence_affiche_agence($id) {
    // Rôle : Affiche l'agence seule
    // Retour : true ou false
    // Paramètres : Néant


    debug("Module traité : agence, action traitée: Affiche la fiche de l'agence");
    // Charger un nouvel objet
    $agence = new agence();
    $agence->loadById($id);
    $var = "no-fixed";
    include "templates/pages/affiche_agence.php";
    return true;
}

function agence_affiche_liste_complete() {
    // Rôle : Affiche la liste de toutes les agences
    // Retour : true ou false
    // Paramètres : Néant

    $agence = new agence();
    $agence->listAll();
    debug("Module traité : agence, action traitée: affiche la liste complète des agences");
    $var = "no-fixed";
    include "templates/pages/liste_agences.php";
    return true;
}

function agence_affiche_liste_filtree(){
    // Rôle : Traite la demande d'affichage de la liste filtrée
    // Retour : true ou false
    // Paramètres : Néant

    debug("Module traité : agence, action traitée: affiche la liste filtrée des agences");
    if (isset($_POST["recherche"])) {
        $texte = $_POST["recherche"];
    }
    $agence = new agence();
    if (!$agence->listFiltree($texte)) {

        $agence->listAll();
        $var = "no-fixed";
        include "templates/pages/liste_agences.php";
    return false;
    } else {
        $var = "no-fixed";
        include "templates/pages/liste_agences.php";
        return true;
        }

    }

function agence_creation_agence_form() {
    // Rôle : Affiche le formulaire de création d'une nouvelle agence
    // Retour : true ou false
    // Paramètres : Néant

    debug("Module traité : agence, action traitée: affiche le formulaire de création d'une agence");
    // Charger un nouvel objet
    $agence = new agence();
    $var = "no-fixed";
    $mode = "CREER";
    include "templates/pages/formulaire_agence.php";
    return true;
}

function agence_creation_agence_traite() {
    // Rôle : Traite la création d'une nouvelle agence
    // Retour : true ou false
    // Paramètres : Néant

    debug("Module traité : agence, action traitée: Traitement du formulaire de création d'une agence");
    $agence = new agence();
    $agence->loadFromPost();
    if ($agence->insert()) {
        $var = "no-fixed";
        include "templates/pages/affiche_agence.php";
        return true;
    } else {
        debug("Création dans la base non effectuée !");
        $var = "no-fixed";
        include "templates/pages/formulaire_agence.php";
        return true;
    }
}

function agence_modif_agence_form($id) {
    // Rôle : Traite la demande d'affichage du formulaire de modifcation d'une agence
    // Retour : true ou false
    // Paramètres : $id : id de l'agence à modifier

    debug("Module traité : agence, action traitée: affiche le formulaire de modification d'une agence");
    // Charger un nouvel objet
    $agence = new agence();
    $agence->loadById($id);
    $var = "no-fixed";
    $mode = "MODIFIER";
    include "templates/pages/formulaire_agence.php";
    return true;
}

function agence_modif_agence_traite($id) {
    // Rôle : Traite la modifcation d'une agnce
    // Retour : true ou false
    // Paramètres : $id : id de l'agence à modifier

    debug("Module traité : agence, action traitée: modification d'une agence");
    // Charger un nouvel objet
    $agence = new agence();
    if (!$agence->loadById($id)) {
        debug("Agence $id non récupérable");
        $agence->listAll();
        $var = "no-fixed";
        include "templates/pages/liste_agences.php";
        return false;
    }
    $agence->loadFromPost();
    upload();

    if ($agence->update()) {

        $var = "no-fixed";
        include "templates/pages/affiche_agence.php";
        return true;
    } else {
        debug("Mise à jour non effectuée");
        $agence = new agence();
        $agence->loadById($id);
        $var = "no-fixed";
        $mode = "MODIFIER";
        include "templates/pages/formulaire_agence.php";
        return false;
    }
}

function agence_suppression_agence($id) {
    // Rôle : Traite la suppression d'une agence
    // Retour : true ou false
    // Paramètres : $id : id de l'agence à supprimer

    debug("Module traité : agence, action traitée: Suppression d'une agence");
    $agence = new agence();
    $agence->loadById($id);
    if ($agence->delete()) {
        message("Administrateur <?= $agence->getNom()?> supprimée !");
        $agence->listAll();
        $var = "no-fixed";
        include "templates/pages/liste_agences.php";
        return true;
    }
}

/*******************************************************************************
 * Traitements des actions pour le module CONTACT
 ******************************************************************************/

function contact_affiche_form() {
    // Rôle : Affiche le formulaire de contact
    // Retour : true ou false
    // Paramètres : Néant

    $var = "no-fixed";
    include "templates/pages/formulaire_contact.php";
    return true;
}

function contact_traite_form() {
    // Rôle : Traite le formulaire de contact et envoie d'un mail
    // Retour : true ou false
    // Paramètres : Néant

    debug("Module traité : contact, Action : traite_form");
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $tel = $_POST["tel"];
    $email = $_POST["email"];
    $objet = $_POST["objet"];
    $texte = $_POST["message"];

    $to = "test@webecom-studio.com";
    $subject = "Vous avez reçu un nouveau message";
    $message = "";
    $message .= "<html>";
    $message .= "<head>";
    $message .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
    $message .= "</head>";
    $message .= "<body>";
    $message .= "<p> Message reçu de : " . htmlentities($prenom) ." " . htmlentities($nom) . "</p>\n";
    $message .= "<p>Son numéro de téléphone : " . htmlentities($tel) . "</p>\n";
    $message .= "<p>Son adresse email : " . htmlentities($email) . "</p>\n";
    $message .= "<p>L'objet du message : " . htmlentities($objet) . "</p>\n";
    $message .= "<p>Le message : " . htmlentities($texte) . "</p>\n";
    $message .= "</body></html>";
    $headers = "From:  'Votre site web' <webecom@60gp.ovh.net>\n";
    $headers .= "Reply-To: ' . htmlentities($email) . '\n";
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "Content-Type: text/html; charset=utf-8 .\n";

    /*
    echo "$to";
    echo "$subject";
    echo "$message";
    echo "$headers";
*/

    if (mail($to, $subject, $message, $headers)) {
        $var = "no-fixed";
        include "templates/pages/remerciements.php";
        return true;
    } else {
        $var = "no-fixed";
        include "templates/pages/formulaire_contact.php";
        return false;
    }
}
/*******************************************************************************
 * Traitements des actions pour le module ADMINISTRATEUR
 *******************************************************************************/

function admin_affiche_connexion_form() {
    // Rôle : Traite la demande d'affichage du formulaire de connexion
    // Retour : true ou false
    // Paramètres : Néant

    // Charger un nouvel objet
    $administrateur = new administrateur();
    if (isset($_SESSION["connect"]) && ($_SESSION["connect"] === true)){
        $var = "no-fixed";
        $administrateur->listAll();
        include "templates/pages/liste_administrateurs.php";
        return true;
    }
    // Charger un nouvel objet
    $administrateur = new administrateur();
    debug("Module traité : administrateur, action traitée: affiche le formulaire de connexion");
    $var = "no-fixed";
    include "templates/pages/formulaire_connexion.php";
    return true;
}

function admin_traite_connexion_form() {
    // Rôle : Traite la demande de vérification de l'identifiant et du mot de passe
    // Retour : true ou false
    // Paramètres : Néant

    $_SESSION["connect"] = false;
    // Récupérer les éléments à vérifier
    $login = $_POST["login"];
    $password = $_POST["password"];
    // Charger un nouvel objet
    $administrateur = new administrateur();
    debug("Module traité : administrateur, action traitée: Traite le formulaire de connexion");
    if ($administrateur->verifConnexion($login, $password)) {
        $var = "no-fixed";
        $administrateur->listAll();
        include "templates/pages/liste_administrateurs.php";
        return true;
    } else {
        $administrateur->loadFromPost();
        $var = "no-fixed";
        message("Identifiant ou mot de passe incorrect !");
        include "templates/pages/formulaire_connexion.php";
        return false;
    }
}

function admin_deconnexion_traite() {
    // Rôle : Déconnecte l'administrateur de sa session
    // Retour : true ou false
    // Paramètres : Néant

    // Déclarer la session de connexion fausse et afficher la page d'accueil du site
    $_SESSION["connect"] = false;
    $var = "";
    include "templates/pages/accueil.php";
    return true;
}


function admin_affiche_admin($id) {
    // Rôle : Affiche l'affiche administrateur
    // Retour : true ou false
    // Paramètres : $id : id de l'administrateur à afficher

    debug("Module traité : administrateur, action traitée: Affiche la fiche de l'administrateur");
    // Charger un nouvel objet
    $administrateur = new administrateur();
    $administrateur->loadById($id);
    $var = "no-fixed";
    include "templates/pages/affiche_administrateur.php";
    return true;
}

function admin_affiche_liste_complete() {
    // Rôle : Affiche la liste de tous les administrateurs
    // Retour : true ou false
    // Paramètres : Néant

    // Charger un nouvel objet
    $administrateur = new administrateur();
    $administrateur->listAll();
    debug("Module traité : administrateur, action traitée: affiche la liste complète des administrateur");
    $var = "no-fixed";
    include "templates/pages/liste_administrateurs.php";
    return true;
}

function admin_modif_admin_form($id) {
    // Rôle : Traite la demande d'affichage du formulaire de modifcation d'un admin
    // Retour : true ou false
    // Paramètres : $id : id de l'adminsitrateur à modifier

    debug("Module traité : administrateur, action traitée: affiche le formulaire de modification d'un administrateur");
    // Charger un nouvel objet
    $administrateur = new administrateur();
    $administrateur->loadById($id);
    $var = "no-fixed";
    $mode = "MODIFIER";
    include "templates/pages/formulaire_administrateur.php";
    return true;
}

function admin_modif_admin_traite($id) {
    // Rôle : Traite la modifcation d'un admin
    // Retour : true ou false
    // Paramètres : $id : id de l'adminsitrateur à modifier

    debug("Module traité : administrateur, action traitée: modification d'un administrateur");
    // Charger un nouvel objet
    $administrateur = new administrateur();
    if (!$administrateur->loadById($id)) {
        debug("Administrateur $id non récupérable");
        $administrateur->listAll();
        $var = "no-fixed";
        include "templates/pages/liste_administrateurs.php";
        return false;
    }
    $administrateur->loadFromPost();
    if ($administrateur->update()) {
        $administrateur->loadById($id);
        $var = "no-fixed";
        include "templates/pages/affiche_administrateur.php";
        return true;
    } else {
        debug("Mise à jour non effectuée");
        $administrateur = new administrateur();
        $administrateur->loadById($id);
        $var = "no-fixed";
        $mode = "MODIFIER";
        include "templates/pages/formulaire_administrateur.php";
        return false;
    }
}

function admin_suppression_admin($id) {
    // Rôle : Traite la suppression d'un admin
    // Retour : true ou false
    // Paramètres : $id : id de l'adminsitrateur à supprimer

    debug("Module traité : administrateur, action traitée: Suppression d'un administrateur");
    $administrateur = new administrateur();
    $administrateur->loadById($id);
    if ($administrateur->delete()) {
        message("Administrateur <?= $administrateur->getNom()?> supprimé !");
        $administrateur->listAll();
        $var = "no-fixed";
        include "templates/pages/liste_administrateurs.php";
        return true;
    }
}

function admin_creation_admin_form() {
    // Rôle : Affiche le formulaire de création d'un nouvel admin
    // Retour : true ou false
    // Paramètres : Néant

    debug("Module traité : administrateur, action traitée: affiche le formulaire de création d'un administrateur");
    // Charger un nouvel objet
    $administrateur = new administrateur();
    $var = "no-fixed";
    $mode = "CREER";
    include "templates/pages/formulaire_administrateur.php";
    return true;
}

function admin_creation_admin_traite() {
    // Rôle : Traite la création d'un nouvel admin
    // Retour : true ou false
    // Paramètres : Néant

    debug("Module traité : administrateur, action traitée: Traitement du formulaire de création d'un administrateur");
    $administrateur = new administrateur();
    $administrateur->loadFromPost();
    if ($administrateur->insert()) {
        $administrateur->loadById(id);
        $var = "no-fixed";
        include "templates/pages/affiche_administrateur.php";
        return true;
    } else {
        debug("Création dans la base non effectuée !");
        $var = "no-fixed";
        include "templates/pages/formulaire_administrateur.php";
        return true;
    }
}

?>
