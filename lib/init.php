<?php

/* 
 * Fichier d'initialisation
 *
 */

ini_set("display_errors",1);
error_reporting(E_ALL);
session_start();

// on inclus les fichiers nécessaires
include "lib/modules.php";
include "lib/fonctions.php";
// On inclus les classes
include "classes/agence.php";
include "classes/administrateur.php";

// Connexion à la base de données
global $bdd;
$bdd = new PDO("mysql:host=pascalfrpjperso.mysql.db;dbname=pascalfrpjperso;charset=UTF8", "pascalfrpjperso", "Filles2401");