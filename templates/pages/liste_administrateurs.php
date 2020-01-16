<!DOCTYPE html>
<?php
        // Template daffichage de la liste complète des administrateurs
        // page entière
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/css.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.png" type="image/png">
    </head>
    <body>
        <?php
            include "templates/fragments/header.php";
        ?>
        <div class="padding-1rem center bg-green-9ad7d0"> 
            <p class="title">Bonjour <?= $_SESSION["prenom"] . " " . $_SESSION["nom"]?></p>
            <p class="title">LISTE DES ADMINSTRATEURS OMEVITA</p>
            <p class="title">LISTE COMPLETE</p>
        </div>
        <table class="center">
            <tr>
                <th>Nom de l'adminstrateur : </th>
                <th>Prénom : </th>
                <th>Password : </th>
                <th>Administrateur : </th>
                <th>Agence de : </th>
            </tr>
                <?php
                    while ($administrateur->next()) {
                    include "templates/fragments/ligne_administrateur.php";
                    }
                ?>
        </table>
        <div class=" padding-1rem width-1200 row justify-between">
            <?php
            if (isset($_SESSION["admin"]) && $_SESSION["admin"] === "oui") {
            ?>
            <div class="padding-1rem">
                <a href="index.php?module=admin&action=creation_admin_form&" class="btn padding-1rem">Créer un nouvel administrateur</a>
            </div>
            <?php
            }
            ?>
            <div class="padding-1rem">
                <a href="index.php?module=agence&action=affiche_liste_complete" class="btn padding-1rem">Gestion des agences</a>
            </div>
        </div>
        <?php
            include "templates/fragments/footer.php";   
        ?>
            <script src="js/js.js" type="text/javascript"></script>
    </body>
</html>