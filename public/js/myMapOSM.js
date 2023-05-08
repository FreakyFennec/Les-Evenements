

// On crée un tableau associatif avec les lieux et leurs coordonnées
var towns = {
    "Ecbolsheim": { 
        "lat": 48.579795, 
        "lon": 7.688444,
        "img": "public/img/zenith-strasbourg-small.jpg",
        "alt": "Le Zenith Strasbourg France",
    },
};

// On initialise la latitude et la longitude du lieu souhaité (centre de la carte)
var lat = 48.5823;
var lon = 7.686;
var myMap = null;

// Fonction d'initialisation de la carte
function initMap() {
    // Créer l'objet "myMap" et l'insèrer dans l'élément HTML qui a l'ID "map"
    myMap = L.map('map').setView([lat, lon], 11); // Le deuxième argument de setView() c'est le zoom sur la carte (de 0 à 20 ?).
    // 0 C'est la map monde et plus le chiffre est grand plus on se rapproche.
    // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        // Il est toujours bien de laisser le lien vers la source des données
        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
        minZoom: 1,
        maxZoom: 20
    }).addTo(myMap);

    // Personnalisation du marquer.
    var icon = L.icon(
        {
            iconUrl: "public/img/icon/pushpin-blue-01.svg",
            iconSize: [30, 30],
            iconAnchor: [25, 50],
            popupAnchor: [0, -50],
        }    
    );

    // Boucle for in sur le array associatif towns
    for(town in towns) {
        // Nous ajoutons un marqueur sur la carte.
        var marker = L.marker(
            [
                towns[town].lat,
                towns[town].lon,
            ], 
            {icon: icon}
        ).addTo(myMap);
        // On ajoute un popup avec le nom du lieu.
        marker.bindPopup(
            "<p>" + town + "</p>" +
            "<img src=" + towns[town].img + " alt=" + towns[town].alt + ">", {minWidth: 200} 
        );
        // On l'affiche au chargement de la page.
        // marker.openPopup();
    }                
}

window.onload = function(){
    // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé;
    initMap(); 
};