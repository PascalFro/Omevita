<!DOCTYPE html>
<!--
Template d'affichage de la référence.
A besoin d'un objet reference chargé et d'un id
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
        <form class="large-4 text-center padding-top-8rem">
            <fieldset class="text-center">
                <label class="title">Titre</label>
                <input type="text" name="titre" value="<?= (isset($reference)) ? $reference->getTitre() : "" ?>"/>
            </fieldset>
            <fieldset>
                <label class="title">Photo</label>
                <input type="text" name="photo" value="<?= (isset($reference)) ? $reference->getPhoto() : "" ?>"/>
            </fieldset>
            <fieldset>
                <label class="title">Description</label>
                <textarea  rows="5" name="description" value="<?= (isset($reference)) ? $reference->getDescription() : "" ?>" >
                </textarea>
            </fieldset>
            <fieldset class="large-4 text-center">
                <label class="title">Région</label>
                <input type="text" name="region" value="<?= (isset($reference)) ? $reference->getRegion() : "" ?>"/>
            </fieldset>
            <fieldset class="large-3 text-center">
                <label class="title">Catégorie</label>
                <input type="text" name="categorie" value="<?= (isset($reference)) ? $reference->getCategorie() : "" ?>"/>
            </fieldset>
       </form>
        <div class="text-center">
             <a href="index.php?module=reference&action=nouveau_traite"class="a btn button">Créer</a>
                <a href="index.php?module=reference&action=affiche_liste"class="a btn button">Retour à la liste</a>
        </div>
        <?php
           include "templates/fragments/footer.php";
        ?>
        <script src="js/js.js" type="text/javascript"></script>
    </body>
</html>
