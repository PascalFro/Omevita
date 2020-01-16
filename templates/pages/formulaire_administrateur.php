<!DOCTYPE html>
<?php
        // Template pour le formulaire de création ou de modification d'un administrateur
        // page entière
        // A besoin de la variable $mode et de la variable $var (pour le header)
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
            <p class="title">Formulaire de <?= ($mode === "CREER") ? "création" : "modification"?> d'un Administrateur</p>
            <p class="title">Merci de renseigner les <?= ($mode === "CREER") ? "champs suivants" : "modifications à apporter"?> :</p>
        </div>
        <form method="post" action="index.php?module=admin&action=<?= ($mode === "CREER") ? "creation_admin_traite" : "modif_admin_traite"?>&id=<?= $administrateur->getId()?>" class="bg-green-9ad7d0 center padding-1rem">
            <div class=" justify-between"> 
                <label for="nom">NOM de l'Administrateur :</label>
                <input type="text" id="nom" name="nom" value="<?= $administrateur->getNom()?>"/>
            </div>
            <div class=" justify-between"> 
                <label for="prenom">Prénom de l'Administrateur :</label>
                <input type="text" id="prenom" name="prenom" value="<?= $administrateur->getPrenom()?>"/>
            </div>
            <div class=" justify-between"> 
                <label for="nom">Mot de passe :</label>
                <input type='<?= ($mode === "CREER") ? "password" : "text" ?>' id="password" name="password" value="<?= $administrateur->getPassword()?>"/>
            </div>
            <div class=" justify-between"> 
                <label for="text">Administrateur Général :</label>
                <select name="admin">
                    <option value="oui">Oui</option>
                    <option value="non">Non</option>
                </select>
            </div>
            <div class=" justify-between"> 
                <label for="agence">Dépend de l'agence de :</label>
                <select name="agence">
                    <option value="SAINT ETIENNE">Saint-Etienne</option>
                    <option value="MONTBRISON">Montbrison</option>
                    <option value="FEURS">Feurs</option>
                    <option value="LE PUY">Le Puy en Velay</option>
                    <option value="SAINT CHAMOND">Saint Chamond</option>
                    
                </select>
            </div>
            <div class="large-6 center padding-1rem">
                <div class="padding-1rem">
                    <input type="submit" value="<?= ($mode === "CREER") ? "Créer l'administrateur" : "Valider les modifications" ?>"/>
                </div>
                <div class="padding-1rem">
                    <a href="index.php?module=admin&action=affiche_admin&id=<?= $administrateur->getId()?>" class="btn padding-demirem align-center">Annuler</a>
                </div>
            </div>
        </form>
        <?php
            include "templates/fragments/footer.php";
        ?>
            <script src="js/js.js" type="text/javascript"></script>
    </body>
</html>
