/* 
 * menu deroulant js
 */

$(function () {
    //positionner les evenements
    $("[data-menu] li").on("click", ouvreMenu);
    //par defaut, on ferme les menu
    $("[data-menu] ul").hide();
});

function ouvreMenu(event) {
    //Role : ouverture / fermeture d'un sous menu
    //toggler les li du menu cliqué
    $(this).children("ul").toggle();
    //cacher les sous menu
    $(this).children("ul").find("ul").hide();
    event.stopPropagation();
}
