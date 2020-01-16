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
        <form method="post" action="index.php?module=reference&action=modif_traite&id=<?= $reference->getId() ?>" class="large-4 text-center padding-top-8rem"enctype="multipart/form-data">
            <fieldset class="text-center">
                <label class="title">Titre</label>
                <input type="text" name="titre" value="<?= $reference->getTitre() ?>"/>
            </fieldset>
            <fieldset>
                <label class="title">Photo</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000"/>
                <input type="file" name="photo"/>
                <input type="text"  value="<?= $reference->getPhoto() ?>"/>
                <img src="img/<?= $reference->getPhoto() ?>" alt="" class=""/>
            </fieldset>
            <fieldset>
                <label class="title">Description</label>
                <textarea  rows="5"  name="description" ><?= $reference->getDescription() ?>
                </textarea>
            </fieldset>
            <fieldset class="large-4 text-center">
                <label class="title">Région</label>
                <input type="text"  name="region" value="<?= $reference->getRegion() ?>"/>
            </fieldset>
            <fieldset class="large-3 text-center">
                <label class="title">Catégorie</label>
                <input type="text"  name="categorie" value="<?= $reference->getCategorie() ?>"/>
            </fieldset>
            <div class="text-center">
                <input type="submit" class="a btn button" value="Valider les modifications"</>
                <a href="index.php?module=reference&action=affiche_reference&id=<?= $reference->getId() ?>"class="a btn button">Retour</a>
                <a href="index.php?module=reference&action=affiche_liste&id=<?= $reference->getId() ?>"class="a btn button">Retour à la liste</a>
            </div>
        </form>
        <?php
           include "templates/fragments/footer.php";
        ?>
        <script src="js/js.js" type="text/javascript"></script>
    </body>
</html>
