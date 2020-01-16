<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
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
        <div class=" row large-12 padding-top-2rem justify-center text-center padding-top-8rem ">
            <div class="large-4">
                <a href="index.php?module=reference&action=affiche_liste" title="" class="button">Afficher la liste des Références</a>
            </div>
            <form method="post" action="index.php?module=reference&action=affiche_list_filtre" class="large-4 text-center">
               
            </form>
        </div>
        <?php
        $mode = "Administrateur";
        include "templates/fragments/footer.php";
        ?>
        <script src="js/js.js" type="text/javascript"></script>
    </body>
</html>
