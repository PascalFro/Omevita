<!DOCTYPE html>
<!--
Pages d'affichage d'une liste
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/foundation.css" rel="stylesheet" type="text/css"/>
        <link href="css/app.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Paytone+One|Rajdhani" rel="stylesheet">
    </head>
    <body class="bg_blue_004481">
        <?php
        include "templates/fragments/header.php";
        ?>
        
        <!-- Affichage de la liste -->
        <div class="row justify-center text-center padding-top-8rem">
            <?php
   if (isset($_SESSION["connect"]) and $_SESSION["connect"] === true){
   ?>
            <a href="index.php?module=reference&action=nouveau_form"class="a btn button">Créer une nouvelle Référence</a>
            <?php
               }
            ?>
            <form method="post" action="index.php?module=reference&action=affiche_liste_filtre" class="large-4 text-center">
                <label for="recherche" class="btn button ">Rechercher une Référence</label>
                <input type="text" id="recherche" name="recherche"/>
                <input type="submit"/>
            </form>
            <?php
   if (isset($_SESSION["connect"]) and $_SESSION["connect"] === true){
   ?>
            <a href="index.php?module=administrateur&action=deconnexion"class="a btn button">Se déconnecter</a>
            <?php
               }
            ?>
            </div>
        <p class="title text-center">LISTE DE NOS REFERENCES</p>
        <table>
            <tr>
                <th>Titre</th>
                <th>Photo</th>
                <th>Description</th>
                <th>Région</th>
                <th>Catégorie</th>
            </tr>

            <?php
            while($reference->next()) {
            include "templates/fragments/ligne.php";
            }
            ?>
        </table>
        <?php
        $mode = "Administrateur";
        include "templates/fragments/footer.php";
        ?>
        <script src="js/js.js" type="text/javascript"></script>
    </body>
</html>
