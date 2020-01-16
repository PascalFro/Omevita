<!DOCTYPE html>
<?php
        // Template pour le formulaire de contact
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
        <div class="center bg-green-9ad7d0">           
            <p class="title">Formulaire de contact</p>
            <p class="title">Merci de renseigner les champs suivants</p>
        </div>
        <form method="post" action="index.php?module=contact&action=traite_form" class="bg-green-9ad7d0 center padding-1rem" onsubmit="return verifFormulaire(); ">
            <div class=" justify-between"> 
                <label for="nom">Votre NOM</label>
                <input type="text" id="nom" name="nom" class="" onchange="verifNom()"/>
                <p id="error-nom" class=""></p>
            </div>
            <div class=" justify-between"> 
                <label for="prenom">Votre Prénom</label>
                <input type="text" id="prenom" name="prenom" onchange="verifPrenom()"/>
                <p id="error-prenom"></p>
            </div>
            <div class=" justify-between"> 
                <label for="nom">Votre numéro de téléphone</label>
                <input type="tel" id="tel" name="tel" onchange="verifTel()"/>
                <p id="error-tel"></p>
            </div>
            <div class=" justify-between"> 
                <label for="email">Votre adresse de courriel</label>
                <input type="email" id="email" name="email" onchange="verifEmail()"/>
                <p id="error-email"></p>
            </div>
            <div class=" justify-between"> 
                <label for="objet">L'objet de votre message</label>
                <input type="text" id="objet" name="objet" onchange="verifObjet()"/>
                <p id="error-objet"></p>
            </div>
            <div class=" justify-between"> 
                <label for="objet">Votre message</label>
                <textarea rows=10 cols=50 type="text" id="message" name="message" placeholder="Saisissez ici votre message (500 caractères maxi)"></textarea>
                <p id="error-name"></p>
            </div>
            <input type="submit" class=""/>
        </form>
        <?php
            include "templates/fragments/footer.php";
        ?>
            <script src="js/js.js" type="text/javascript"></script>
    </body>
</html>
