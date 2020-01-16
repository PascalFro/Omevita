<?php
//Template fragment de page pour le footer
?>

<footer class="padding-1rem bg-f8a36c">
    <div class="row width-1200 justify-between">
        <div class="large-4">
            <p>46, rue dela Télématique</p>
            <p>42000 Saint-Etienne</p>
            <p>04 77 54 46 38</p>
            <p>06 30 44 93 68</p>
        </div>
        <div class="large-4 center">
        <iframe align="middle" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2798.624430045907!2d4.39438491573888!3d45.457223841929654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f5ac0a6221db9f%3A0x7efee8143cda6dd4!2s46+Rue+de+la+T%C3%A9l%C3%A9matique%2C+42000+Saint-%C3%89tienne!5e0!3m2!1sfr!2sfr!4v1548768345156" width="300" height="225" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <nav class="large-4">
            <a href="#" class="padding-1rem">Mentions légales</a>
            <a href="#" class="padding-1rem">Crédits</a>
            <a href="#" class="padding-1rem">Site réalisé par Pascal Fromentin</a>
            <a href="index.php?module=admin&action=connexion_form" class="padding-1rem">Espace Administrateur</a>
            <?php
            if (isset($_SESSION["connect"]) && $_SESSION["connect"] === true){
            ?>
            <a class="padding-1rem">(<?= $_SESSION["prenom"] . " " . $_SESSION["nom"] ?> est connecté.)</a>
            <a href="index.php?module=admin&action=deconnexion_traite" class="padding-1rem">Se déconnecter</a>
            <?php
            }
            ?>
        </nav>
    </div>
    <div class="large-4">
        <?php
            /*global $debug;
            echo "<div class='debug'>";
            echo "<p>" . htmlentities($debug) . "</p>\n";
            echo "</div>";*/
        ?>
    </div>
</footer>