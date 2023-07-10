/*SLIDER CONCEPT*/

$(() => {
    let image = $('.slider img'); //je selectionne mes images
    let nbslides = image.length; //calcule du nombre d'images
    let activeslide = 0; //slide commence à 0
    image.eq(activeslide).show(); //affiche l'image sélectionnée
    setInterval(retourne, 5000); //interval de 5 secondes sur la fonction (retourne)
    function retourne() { 
        activeslide++; //incrémente le slide
        if (activeslide == nbslides) { //si le slide arrive à la dernière image
            activeslide = 0; //repart à la première image
        }
        image.not(activeslide).fadeOut(1000); //effet apparition, disparition des images
        image.eq(activeslide).fadeIn(1000);
    }
});