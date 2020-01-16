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
        <div class=" center bg-green-9ad7d0">           
            <p class="title">Formulaire de connection</p>
            <p class="title">à l'espace Administrateur</p>
        </div>
        <form method="post" action="index.php?module=admin&action=connexion_traite" class="bg-green-9ad7d0 center padding-1rem">
            <div class=" justify-between"> 
                <label for="login">Identifiant</label>
                <input type="text" id="login" name="login" class=""/>
            </div>
            <div class=" justify-between"> 
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password"/>
                <?php
                    global $message;
                    echo "<div class='message'>";
                    echo "<p>" . nl2br(htmlentities($message)) . "</p>\n";
                    echo "</div>";
                ?>
            </div>
           
            <input type="submit" value="Se connecter" class=""/>
        </form>
        <?php
            include "templates/fragments/footer.php";
        ?>
            <script src="js/js.js" type="text/javascript"></script>
    </body>
</html>
