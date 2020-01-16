<?php
/*
 * Url unique de l'application
 *
 * Reçoit en paramètres ce qui est dans l'adresse
 *      Le module (par défaut : )
 *      L'action (par défaut : )
 *      L'id (optionnel)
 */


include "lib/init.php";


$module = litGET("module", "");
$action = litGET("action", "");
$id = litGET("id", "");

//debug("Module demandé : $module, action demandée : $action, id demandé : $id");

if ($module === "contact") {
    module_contact($action,$id);
} elseif ($module === "agence") {
    module_agence($action, $id);
} elseif ($module === "admin") {
    module_admin($action, $id);
} else {
    include "templates/pages/accueil.php";
}

