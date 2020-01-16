<!DOCTYPE html>
<?php
        // Template daffichage de la liste complète des agences
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
            <p class="title">LISTE DES AGENCES OMEVITA</p>
            <p class="title">LISTE COMPLETE</p>
            <p class="title">(Cliquer sur le nom de l'agence pour voir la fiche détaillée)</p>
        </div>
        <table class="center">
            <tr>
                <th>Nom de l'agence: </th>
                <th>Description: </th>
                <th>Photo: </th>
                <th>Adresse: </th>
                <th>Code Postal: </th>
                <th>Ville: </th>
                <th>Horaires: </th>
                <th>Prestation : </th>
                <th>Prestation : </th>
                <th>Prestation : </th>
                <th>Prestation : </th>
            </tr>
                <?php
                    while ($agence->next()) {
                    include "templates/fragments/ligne_agence.php";
                    }
                ?>
        </table>
        <form method="post" action="index.php?module=agence&action=affiche_liste_filtree"class=" padding-1rem width-1200 row justify-between">
            <label for="recherche"class="padding-1rem">Rechercher une agence</label>
            <input type="text" id="recherche" name="recherche"/>
            <input type="submit" value="Rechercher"/>
        </form>
        <?php
            if (isset($_SESSION["connect"]) && $_SESSION["connect"] === true && isset($_SESSION["admin"]) && $_SESSION["admin"] === "oui") {
            ?>
        <div class=" padding-1rem width-1200 row justify-between">
            <div class="padding-1rem">
                <a href="index.php?module=agence&action=creation_agence_form&" class="btn padding-1rem">Créer une nouvelle agence</a>
            </div>
            <div class="padding-1rem">
                <a href="index.php?module=admin&action=affiche_liste_complete" class="btn padding-1rem">Gestion des adminsitrateurs</a>
            </div>
        </div>
        <?php
            }
            ?>
        <?php
            include "templates/fragments/footer.php";   
        ?>
            <script src="js/js.js" type="text/javascript"></script>
    </body>
</html>