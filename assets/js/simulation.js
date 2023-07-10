//AFFICHAGE DU RESULTAT DE LA SIMULATION
$(document).ready(function () {
    $('.simulationResultat').hide();

    $('.validerSimulation').click(() => {
        $('.simulationResultat').slideDown();
    });
});

//SIMULER UNE RESERVATION
//RECUP DES DONNEES
const nombrePersonnes = document.querySelector('.simulationNombre');
const jour = document.querySelector('.simulationJour');
const duree = document.querySelector('.simulationDuree');
const validerSimulation = document.querySelector('.validerSimulation');

//PARTIE AFFICHAGE DU RESULTAT
const resultat = document.querySelector('.simulationResultat');
const tarif = document.querySelector('.simulationTarif');
const tarifPersonne = document.querySelector('.simulationTarifPersonne');

//MASQUE L'AFFICHAGE DU RESULTAT SI CHANGEMENT DE DONNEES
nombrePersonnes.addEventListener('change', (event) => {
    resultat.style.display = "none";
});
jour.addEventListener('change', (event) => {
    resultat.style.display = "none";
});
duree.addEventListener('change', (event) => {
    resultat.style.display = "none";
});

//TABLEAUX MULTIDIMENSIONNELS DES TARIFS
let tarifSemaine2Heures = [
    [2, 90], //[nombre de personnes, tarif]
    [3, 120],
    [4, 150],
    [5, 180],
];
let tarifWeekend2Heures = [
    [2, 100],
    [3, 135],
    [4, 170],
    [5, 205],
];
let tarifSemaine3Heures = [
    [2, 130],
    [3, 150],
    [4, 180],
    [5, 210],
];
let tarifWeekend3Heures = [
    [2, 140],
    [3, 175],
    [4, 210],
    [5, 245],
];

//BOUCLES SUR TABLEAU EN FONCTION DU JOUR ET DE LA DUREE SELECTIONNES
//POUR TROUVER LE PRIX CORRESPONDANT AU NOMBRE DE PERSONNES
validerSimulation.addEventListener('click', () => {
    if ((jour.value == "semaine") && (duree.value == 2)) {
        for (i = 0; i < tarifSemaine2Heures.length; i++) { //i itère sur le tableau principal
            for (j = 0; j < tarifSemaine2Heures[i].length; j++) { //j itère les sous-tableaux
                if (nombrePersonnes.value == tarifSemaine2Heures[i][j]) {
                    tarif.value = tarifSemaine2Heures[i][1];
                }
            }
        }
    }
    else if ((jour.value == "weekend") && (duree.value == 2)) {
        for (i = 0; i < tarifWeekend2Heures.length; i++) {
            for (j = 0; j < tarifWeekend2Heures[i].length; j++) {
                if (nombrePersonnes.value == tarifWeekend2Heures[i][j]) {
                    tarif.value = tarifWeekend2Heures[i][1];
                }
            }
        }
    }
    else if ((jour.value == "semaine") && (duree.value == 3)) {
        for (i = 0; i < tarifSemaine3Heures.length; i++) {
            for (j = 0; j < tarifSemaine3Heures[i].length; j++) {
                if (nombrePersonnes.value == tarifSemaine3Heures[i][j]) {
                    tarif.value = tarifSemaine3Heures[i][1];
                }
            }
        }
    }
    else if ((jour.value == "weekend") && (duree.value == 3)) {
        for (i = 0; i < tarifWeekend3Heures.length; i++) {
            for (j = 0; j < tarifWeekend3Heures[i].length; j++) {
                if (nombrePersonnes.value == tarifWeekend3Heures[i][j]) {
                    tarif.value = tarifWeekend3Heures[i][1];
                }
            }
        }
    }
    let tarifParPersonne = tarif.value / nombrePersonnes.value;;
    tarifPersonne.value = Math.round(tarifParPersonne * 100) / 100; //arrondi 2 décimales
});