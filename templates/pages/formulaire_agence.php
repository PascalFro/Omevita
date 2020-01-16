<!DOCTYPE html>
<?php
        // Template pour le formulaire de création ou de modification d'une agence
        // page entière
        // A besoin de la variable $mode et de $var ( pour la mise en page du header)
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
        <div class="center padding-1rem bg-green-9ad7d0">           
            <p class="title">Formulaire de <?= ($mode === "CREER") ? "création" : "modification"?> d'une Agence</p>
            <p class="title">Merci de renseigner les <?= ($mode === "CREER") ? "champs suivants" : "modifications à apporter"?> :</p>
        </div>
        <form  enctype="multipart/form-data" method="post" action="index.php?module=agence&action=<?= ($mode === "CREER") ? "creation_agence_traite" : "modif_agence_traite"?>&id=<?= $agence->getId()?>" class="bg-green-9ad7d0 center padding-1rem">
            <div class=" justify-between"> 
                <label for="nom">NOM de l'Agence :</label>
                <input type="text" id="nom" name="nom" value="<?= $agence->getNom()?>"/>
            </div>
            <div class=" justify-between"> 
                <label for="description">Description :</label>
                <input type="text" id="description" name="description" value="<?= $agence->getDescription()?>"/>
            </div>
                <div class=" justify-between"> 
                    <label for="photo">Photo :</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="3000000"/>
                    <input type="file" id="photo" name="photo" value="img/<?= ($mode === "CREER") ? '$_FILES["photo"]["name"]' : "$agence->getPhoto()" ?>"/>
                </div>
            <div class=" justify-between"> 
                <label for="adresse">Adresse :</label>
                <input type="text" id="adrese" name="adresse" value="<?= $agence->getAdresse() ?>"/>
            </div>
            <div class=" justify-between"> 
                <label for="cp">Code Postal :</label>
                <input type="text" id="cp" name="cp" value="<?= $agence->getCp() ?>"/>
            </div>
            <div class=" justify-between"> 
                <label for="ville">Ville :</label>
                <input type="text" id="ville" name="ville" value="<?= $agence->getVille() ?>"/>
            </div>
            <div class=" justify-between"> 
                <label for="horaires">Horaires :</label>
                <input type="text" id="horaires" name="horaires" value="<?= $agence->getHoraires() ?>"/>
            </div>
            <div class=" justify-between"> 
                <label for="prestation1">Prestation :</label>
                <select name="prestation1">
                    <option value=""></option>
                    <option value="autonomie">Autonomie</option>
                    <option value="soins-infirmiers">Soins Infirmiers</option>
                    <option value="a-domicile">A domicile</option>
                    <option value="petite-enfance">Petite Enfance</option>
                </select>
            </div>
            <div class=" justify-between"> 
                <label for="prestation2">Prestation :</label>
                <select name="prestation2">
                    <option value=""></option>
                    <option value="autonomie">Autonomie</option>
                    <option value="soins-infirmiers">Soins Infirmiers</option>
                    <option value="a-domicile">A domicile</option>
                    <option value="petite-enfance">Petite Enfance</option>
                </select>
            </div>
            <div class=" justify-between"> 
                <label for="prestation3">Prestation :</label>
                <select name="prestation3">
                    <option value=""></option>
                    <option value="autonomie">Autonomie</option>
                    <option value="soins-infirmiers">Soins Infirmiers</option>
                    <option value="a-domicile">A domicile</option>
                    <option value="petite-enfance">Petite Enfance</option>
                </select>
            </div>
            <div class=" justify-between"> 
                <label for="prestation4">Prestation :</label>
                <select name="prestation4">
                    <option value=""></option>
                    <option value="autonomie">Autonomie</option>
                    <option value="soins-infirmiers">Soins Infirmiers</option>
                    <option value="a-domicile">A domicile</option>
                    <option value="petite-enfance">Petite Enfance</option>
                </select>
            </div>
            <div class="large-6 center padding-1rem">
                <div class="padding-1rem">
                    <input type="submit" value="<?= ($mode === "CREER") ? "Créer l'agence" : "Valider les modifications" ?>"/>
                </div>
                <div class="padding-1rem">
                    <a href="index.php?module=agence&action=affiche_agence&id=<?= $agence->getId()?>" class="btn padding-demirem align-center">Annuler</a>
                </div>
            </div>
        </form>
        <?php
            include "templates/fragments/footer.php";
        ?>
            <script src="js/js.js" type="text/javascript"></script>
    </body>
</html>
