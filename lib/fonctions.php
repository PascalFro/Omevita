<?php

/* 
 * Fonctions diverses
 */

function litGET($param, $def){
    // Rôle : Récupère un paramètre dans l'URL
    // Retour : le paramètre ou une valeur par défaut
    // Paramètres : 
    //      $param : paramètre recherché
    //      $def : valeur par défaut si paramètre recherché non trouvé
    
    // Si le paramètre recherché se trouve dans l'url, on retourne le paramètre
    if (isset ($_GET[$param])) {
        return $_GET[$param];
    // Sinon, on retourne la valeur par défaut
    } else {
        return $def;
    }
    
}

function litPOST($param, $def){
    // Rôle : Récupère un paramètre dans le POST
    // Retour : le paramètre ou une valeur par défaut
    // Paramètres : 
    //      $param : paramètre recherché
    //      $def : valeur par défaut si paramètre recherché non trouvé
    
    // Si le paramètre recherché se trouve dans le POST, on retourne le paramètre
    if (isset ($_POST[$param])) {
        return $_POST[$param];
    // Sinon, on retourne la valeur par défaut
    } else {
        return $def;
    }
    
}

function litFILES($param, $def){
    // Rôle : Récupère un paramètre dans le FILES
    // Retour : le paramètre ou une valeur par défaut
    // Paramètres : 
    //      $param : paramètre recherché
    //      $def : valeur par défaut si paramètre recherché non trouvé
    
    // Si le paramètre recherché se trouve dans le FILES on retourne le paramètre
    if (isset ($_FILES[$param])) {
        return $_FILES[$param];
    // Sinon, on retourne la valeur par défaut
    } else {
        return $def;
    }
}

function debug($texte){
    // Rôle : Affiche un message pour le debug
    // Retour : Néant
    // Paramètres : 
    //      $texte : texte à afficher (une chaine de caractères)
    
    global $debug;
    if (empty($texte)) {
        $debug = "";
    } else {
        $debug .= $texte;
    } 
}

function message($texte){
    // Rôle : Affiche un message pour le l'utilisateur
    // Retour : Néant
    // Paramètres : 
    //      $texte : texte à afficher (une chaine de caractères)
    
    global $message;
    if (empty($texte)) {
        $message = "";
    } else {
        $message .= $texte;
    } 
}

function upload() {
    // Rôle : télécharger un fichier et le stocker dans le dossier image
    // Retour : true ou false
    // Paramètres : Néant
    
    // A-t'on bien un champs de type files
    if (!isset($_FILES["photo"])) {
        debug("Pas de fichier photo envoyé");
        return false;
    }
    // Vérifier que le fichier à été uploadé correctement
    if ($_FILES["photo"]["error"] != UPLOAD_ERR_OK) {
        debug("Erreur de transfert");
        return false;
    }
    // Récupérer le nom du fichier à uploader
     $nomTemp = $_FILES["photo"]["tmp_name"];
     $nomFichier = $_FILES["photo"]["name"];
    // Préciser le dossier de stockage du fichier
    $destination= "img/$nomFichier";
    // Déplacement du fichier
    if (!move_uploaded_file($nomTemp,$destination)) {
        return false;
    } else {
        debug("Fichier sauvegardé");
        return true;
    }
    
}