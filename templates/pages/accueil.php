<!DOCTYPE html>
<!--
Template page d'accueil du site omevita
-->
<html>
    <head>
        <title>omevita</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/css.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Raleway" rel="stylesheet">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.png" type="image/png">
        <link rel="icon" sizes="32x32" href="favicon-32.png" type="image/png">
        <link rel="icon" sizes="64x64" href="favicon-64.png" type="image/png">
        <link rel="icon" sizes="96x96" href="favicon-96.png" type="image/png">
    </head>
    <body onscroll="menuScrolled(); backToTop()">
        <!-- Header -->
        <?php
        include "templates/fragments/header.php";
        ?>
        <!-- Slider -->
        <div id="slider" class="slider relative">
            <img src="img/slider1-omevita.jpg" alt="" class="img-responsive "/>
            <div>
                <a href="#" title="" class="sprite bg-back"></a>
            </div>
            <div>
                <a href="#" title="" class="sprite bg-right_arrow"></a>
            </div>
            <div class="cta">
                <a href="tel:0477548888" title="" class='a'>RENDRE SERVICE EST NOTRE METIER<br>Prenez rdv au 04 77 54 88 88</a>
            </div>
        </div>
        <!-- Catégories -->
        <div class="row width-1200 padding-top-5rem">
            <div class="large-3 padding-1rem">
                <img src="img/Aide-a-l-autonomie.jpg" alt="" class="img-responsive"/>
                <h2 class="font-size-30px"><span class="color-f26628-orange">AIDE</span><br>A L'AUTONOMIE</h2>
                <p class="padding-bottom-2rem">Lorem ipsum dolor sit amet,<br>consectetur adipisicing elit,<br>sed do eiusmod tempor incididunt ut labore et dolore </p>
                <div class="padding-1rem btn large-12">
                     <a href="#" title="" class="">Découvrez<br>Notre aide à l'autonomie</a>
                 </div>
           </div>
           <div class="large-3 padding-1rem">
                <img src="img/Soins infirmier.jpg" alt="" class="img-responsive"/>
                <h2 class="font-size-30px"><span class="color-f26628-orange">SOINS</span><br>INFIRMIERS</h2>
                <p class="padding-bottom-2rem">Lorem ipsum dolor sit amet,<br>consectetur adipisicing elit,<br>sed do eiusmod tempor incididunt ut labore et dolore </p>
                <div class="padding-1rem btn large-12">
                     <a href="#" title="" class="">Découvrez<br>Nos soins infirmiers</a>
                 </div>
            </div>
            <div class="large-3 padding-1rem">
                <img src="img/Aide-a-domicile.jpg" alt="" class="img-responsive"/>
                <h2 class="font-size-30px"><span class="color-f26628-orange">SERVICE</span><br>A LA PERSONNE</h2>
                <p class="padding-bottom-2rem">Lorem ipsum dolor sit amet,<br>consectetur adipisicing elit,<br>sed do eiusmod tempor incididunt ut labore et dolore </p>
                <div class="padding-1rem btn large-12">
                     <a href="#" title="" class="">Découvrez<br>Notre service à la personne</a>
                 </div>
            </div>
            <div class="large-3 padding-1rem">
                <img src="img/petite enfance.jpg" alt="" class="img-responsive"/>
                <h2 class="font-size-30px"><span class="color-f26628-orange">PETITE</span><br>ENFANCE</h2>
                <p class="padding-bottom-2rem">Lorem ipsum dolor sit amet,<br>consectetur adipisicing elit,<br>sed do eiusmod tempor incididunt ut labore et dolore </p>
                <div class="padding-1rem btn large-12">
                     <a href="#" title="" class="">Découvrez<br>Notre petite enfance</a>
                 </div>
            </div>
        </div>
        <!-- Présentation -->
        <div class="width-1200 padding-top-5rem">
            <h1 class="padding-bottom-2rem"><span class="color-f26628-orange">omevita</span>, l'association d'aides, de soins et de serices à la personne en rhône Alpes</h1>
            <img src="img/presentation-omevita.jpg" alt="" class=" img-responsive"/>
            <p class="title justify">Depuis janvier 2014, un nouvel acteur est apparu dans le secteur sanitaire et social en région Rhône-Alpes. La nouvelle association est née du rapprochement de deux associations référentes dans le domaine de l’aide, des soins et des services à la personne : Familles Rurales Association Services aux Personnes et Vivre à Domicile.</p>
            <div class="row">
                <div class="justify large-8">
                    <p class="">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae.</p>
                </div>
                <div class="large-4"></div>
            </div>
            <div class="row padding-top-1rem">
                <div class="padding-1rem btn large-3">
                     <a href="#" title="" class="">Découvrez<br>Notre service à la personne</a>
                </div>
                <div class="large-9"></div>
            </div>
        </div>
        <!-- Témoignage -->
        <div class="width-1200 padding-top-5rem">
            <h2><span class="color-f26628-orange">aide</span> à l'autonomie</h2>
            <div class="large-12 row padding-top-1rem padding-bottom-2rem">
                <img src="img/photo-bas-rhin-abrapa-aide-personne-agee.jpg" alt="" class="img-responsive large-7 flex-start"/>
                <div class="large-5">
                    <div class="large-12 padding-1rem no-padding-top">
                        <p class="title upper padding-1rem no-padding-top">témoignage</p>
                        <blockquote class="padding-1rem">«Mon mari a la maladie de Parkinson depuis quelques années. Malgré toute ma bonne volonté je n’arrive plus à assumer toutes les tâches dans la maison alors avec Chantal de OMEVITA, nous les faisons ensemble, c’est plus agréable.»</blockquote>
                    <cite class="padding-1rem">Mme Stauss, Charlieu dans la Loire, cliente depuis 2 ans</cite>
                    </div>
                    <div class="large-12 padding-1rem align-flex-end right">
                        <p class="title">NOS HORAIRES D’OUVERTURE</p>
                        <p>Du lundi au vendredi</p>
                        <p>De 9h à 12h et de 13h à 17h</p>
                        <p>Permanence téléphonique 24h/24 7j/7</p>
                        <p>Au 06 30 44 93 68</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="backToTop">
            <a href="#" title=""  class="sprite bg-back_to_top"></a>
        </div>
        <!-- Footer -->
        <?php
        include "templates/fragments/footer.php";
        ?>
        
        <script src="js/js.js" type="text/javascript"></script>
    </body>
    
</html>
