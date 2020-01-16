<!DOCTYPE html>
<?php
        // Template de remerciement pour le formulaire de contact
        // page entière
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/css.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.png" type="image/png">
        <link rel="icon" sizes="32x32" href="favicon-32.png" type="image/png">
        <link rel="icon" sizes="64x64" href="favicon-64.png" type="image/png">
        <link rel="icon" sizes="96x96" href="favicon-96.png" type="image/png">
    </head>
    <body>
        <?php
            include "templates/fragments/header.php";
        ?>
        <div padding-1rem center bg-green-9ad7d0>
            <div class="padding-1rem center bg-green-9ad7d0">           
                <p class="title">Nous vous remercions pour votre message</p>
                <p class="title">Nous ne manquerons pas de revenir vers vous très prochainement</p>
            </div>
            <div class="padding-1rem bg-green-9ad7d0 center">
            <a href="index.php" height=30 width=200 class="btn padding-1rem">Retour à l'accueil du site</a>
            </div>
        </div>
        
        <?php
            include "templates/fragments/footer.php";
        ?>
            <script src="js/js.js" type="text/javascript"></script>
    </body>
</html>
