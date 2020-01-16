<!DOCTYPE html>
<?php
        // Template daffichage d'une agence
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
                <p class="title"><?= $agence->getNom()?></p>
            </div>
            <div class=" padding-1rem center bg-green-9ad7d0">
                <p><?= $agence->getNom()?></p>
                <p><?= $agence->getDescription()?></p>
                <p class=""><img src="img/<?= $agence->getPhoto()?>" alt="" class="large-6 img-responsive"/></p>
                <p><?= $agence->getAdresse()?></p>
                <p><?= $agence->getCp()?></p>
                <p><?= $agence->getVille()?></p>
                <p><?= $agence->getHoraires()?></p>
                <p><?= $agence->getPrestation1()?></p>
                <p><?= $agence->getPrestation2()?></p>
                <p><?= $agence->getPrestation3()?></p>
                <p><?= $agence->getPrestation4()?></p>
            </div>
            <?php
                if (isset($_SESSION["connect"]) && ($_SESSION["connect"] === true) && ($_SESSION["agence"] === $agence->getVille())) {

                ?>
            <div class="padding-1rem row justify-around">
                <div>
                    <a href="index.php?module=agence&action=modif_agence_form&id=<?=$agence->getId()?>" class="btn padding-1rem ">Modifier l'agence</a>
                </div>
                <div class=" ">
                    <a href="index.php?module=agence&action=affiche_liste_complete" class="btn padding-1rem">Retour à la liste complète</a>
                </div>
            </div>
            <?php
                }
                ?>
            
            <?php
                if (isset($_SESSION["connect"]) && ($_SESSION["connect"] === true) && ($_SESSION["admin"] === 'oui')) {
                ?>
            <div class="padding-1rem row justify-around">
                <div>
                    <a href="index.php?module=agence&action=modif_agence_form&id=<?=$agence->getId()?>" class="btn padding-1rem ">Modifier l'agence</a>
                </div>
                <div class=" padding-1rem">
                    <a href="index.php?module=agence&action=affiche_liste_complete" class="btn padding-1rem">Retour à la liste complète</a>
                </div>
                <div>
                    <a href="index.php?module=agence&action=suppression_agence&id=<?=$agence->getId()?>" class="btn padding-1rem "onclick=" return confirm('Voulez-vous vraiment supprimer cette agence ?');">Supprimer l'agence</a>
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
