<?php
//Template fragment de page pour le header
?>

<header class=" row <?= ((isset($var) && $var === "no-fixed") ? "bg-f8a36c " : "")?> <?= ((isset($var) && $var === "no-fixed") ? "no_fixed" : "")?>">
    <div class="row width-1200 justify-between align-bottom ">
        <div class=" large-2 align-bottom">
            <a href="index.php" title=""><img src="img/Logo omevita.jpg" alt="" class="img-responsive"/></a>
        </div>
        <a href="index.php" title="" class="sprite bg-home"></a>
        <nav class="main-nav row ">
                <a href="#" title="" class="menu">Découvrez omevita</a>
                <ul class="">
                <li class="menu"><a href="#" title="">Nos services</a>
                    <ul class="menu-content">
                        <li><a href="#">Autonomie</a></li>
                        <li><a href="#">Soins infirmiers</a></li>
                        <li><a href="#">A domicile</a></li>
                        <li><a href="#">Petite Enfance</a></li>
                    </ul>
                </li>
                </ul>
                <a href="index.php?module=agence&action=affiche_liste_complete" title="" class="menu">Nos implantations</a>
                <a href="index.php" title="" class="menu">Devenir salarié</a>
                <a href="index.php?module=contact&action=affiche_form" title="" class="menu">Contact</a>
        </nav>
    </div>
</header>