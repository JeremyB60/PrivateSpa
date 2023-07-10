$(document).ready(function () {

    // SCROLL UP
    const scrollup = document.querySelector('.scrollup');
    window.addEventListener('scroll', () => {
        (window.scrollY > 50) ? scrollup.style.visibility = 'visible' : scrollup.style.visibility = 'hidden';
    });

    $(".scrollup").click(function () {
        $("html, body").scrollTop(0);
    });

    // AJOUT FOND FLOU LORS DU SURVOL MENU
    const cibles = document.querySelectorAll('.blurJS'); //cibles = icone menu burger et sous-menu
    const main = document.querySelector('main');
    const footer = document.querySelector('footer');

    cibles.forEach(cible => {
        cible.addEventListener('mouseenter', () => {
            main.classList.add('flou');
            footer.classList.add('flou');
        });
        cible.addEventListener('mouseleave', () => {
            main.classList.remove('flou');
            footer.classList.remove('flou');
        });
    });

    // MENU SOULIGNE PAGE ACTIVE
    // CREATION DE L'OBJET menuSouligne

    const menuSouligne = {
        pageAccueil: "menuAccueil", //je fais correspondre les propriétés sous forme : clé > valeur
        pageConcept: "menuConcept",
        pageCentres: "menuCentres",
        pageGalerie: "menuGalerie"
    };

    // RECUPERE L'ID DU BODY  
    const bodyId = document.body.id;

    // RECHERCHE LA CORRESPONDANCE
    const menuId = menuSouligne[bodyId];

    // SI LA CORRESPONDANCE EST TROUVE DANS LE DOCUMENT ALORS AJOUT DE LA CLASSE CSS 
    if (menuId) {
        document.getElementById(menuId).classList.add("pageactuelle");
    }

    //PAGE MON COMPTE options
    //MASQUE LES FORMULAIRES

    $('.identifier').hide();
    $('.creer').hide();

    //CHANGEMENT DE COULEUR PENDANT LE SURVOL

    $('.hover').hover(function () {
        $(this).css({ backgroundColor: '#111821', color: "#ebd5ad", transition: '.5s' });
    },
        function () {
            $(this).css({ backgroundColor: '#f8f9fa', color: "#111821", transition: '.5s' });
        });

    //AFFICHAGE DU FORMULAIRE AU CLIC
    
    $('.option1').click(() => {
        $('.identifier').show();
        $('.creer').hide();
    });

    $('.option2').click(() => {
        $('.creer').show();
        $('.identifier').hide();
    });

    //PAGE PROFILUPDATE désactive le bouton envoyer tant que la souris n'entre pas dans un input
    $('#changeenvoyer').attr('disabled', true);
    $('#modifierInformations input').mousedown(() => {
        $('#changeenvoyer').attr('disabled', false);
    });

    //PARTIE ADMIN AFFICHAGE DES SOUS-PARTIES
    //MASQUE PAR DEFAUT
    $('.partieClients').hide();
    $('.partiePromotion').hide();
    $('.partieSupprimerPromotion').hide();
    $('.partieVoirlivredor').hide();
    $('.partieVoirContact').hide();

    $('.clients').click(() => {
        $('.partieClients').toggle();
        $('.partiePromotion').hide();
        $('.partieSupprimerPromotion').hide();
        $('.partieVoirlivredor').hide();
        $('.partieVoirContact').hide();
    });
    $('.promotion').click(() => {
        $('.partieClients').hide();
        $('.partiePromotion').toggle();
        $('.partieSupprimerPromotion').hide();
        $('.partieVoirlivredor').hide();
        $('.partieVoirContact').hide();
    });
    $('.supprimerPromotion').click(() => {
        $('.partieClients').hide();
        $('.partiePromotion').hide();
        $('.partieSupprimerPromotion').toggle();
        $('.partieVoirlivredor').hide();
        $('.partieVoirContact').hide();
    });
    $('.voirLivredor').click(() => {
        $('.partieClients').hide();
        $('.partiePromotion').hide();
        $('.partieSupprimerPromotion').hide();
        $('.partieVoirlivredor').toggle();
        $('.partieVoirContact').hide();
    });
    $('.voirContact').click(() => {
        $('.partieClients').hide();
        $('.partiePromotion').hide();
        $('.partieSupprimerPromotion').hide();
        $('.partieVoirlivredor').hide();
        $('.partieVoirContact').toggle();
    });

});