<!DOCTYPE html>
<?php
        // Template d'affichage d'un administrateur
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

        <div class="large-6 padding-1rem center bg-green-9ad7d0"> 
            <div>
                <p class="title"> <?= $administrateur->getPrenom() . " " . $administrateur->getNom()?></p>
                <p class="title">Fiche individuelle</p>
            </div>
            <div class=" padding-1rem center bg-green-9ad7d0">
                <p>NOM de l'administrateur : <b><?= $administrateur->getNom()?></b></p>
                <p>Prénom de l'administrateur : <b><?= $administrateur->getPrenom()?></b></p>
                <p>Mot de passe de l'administrateur : <b><?= $administrateur->getPassword()?></b></p>
                <p>Administrateur général : <b><?= $administrateur->getAdmin()?></b></p>
                <p>Administrateur local de : <b><?= $administrateur->getAgence()?></b></p>
            </div>
            <?php
            if (isset($_SESSION["admin"]) && $_SESSION["admin"] === "oui") {
            ?>
            <div class="row justify-around">
                <div class="padding-1rem">
                    <a href="index.php?module=admin&action=modif_admin_form&id=<?= $administrateur->getId()?>"  class="btn padding-1rem">Modifier l'administrateur</a>
                </div>
                <div class="padding-1rem">
                    <a href="index.php?module=admin&action=affiche_liste_complete" class="btn padding-1rem">Retour à la liste complète</a>
                </div>
                <div class="padding-1rem">
                    <a href="index.php?module=admin&action=suppression_admin&id=<?= $administrateur->getId()?>"  class="btn padding-1rem" onclick="return confirm('Voulez-vous vraiment supprimer cet administrateur ?');">Supprimer l'administrateur</a>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
            
        <?php
            include "templates/fragments/footer.php";   
        ?>
 
 
    </body>
</html>
