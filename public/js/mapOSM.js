// Retriev zipcode
$(document).ready(function() {

    const zipcodeElement = document.querySelector('.zipcode');
    const cityElement = document.querySelector('.city');
    const imgElement = document.querySelector('.imgDetailEvent');
    const imgSrc = imgElement.getAttribute('src');
    const imgAlt = imgElement.getAttribute('alt');

    if (zipcodeElement && cityElement && imgElement) {

        const zipcode = zipcodeElement.textContent.trim();
        const city = cityElement.textContent.trim();
        const img = imgSrc.trim();
        const alt = imgAlt.trim();

// console.log(city);
        
        const apiUrl = 'https://geo.api.gouv.fr/communes?codePostal='; // For construct the URL.

        const format = '&format=json'; // Format with wich we retrive the datas.

        let url = apiUrl + zipcode + '&fields=code,nom,centre' + format; // Adresse of geoApi + zipcode + format. (concatenation).
// console.log(url); // Displays data binded to the zipcode.

        // fetch() retrive datas by GET methode
        // converted with Json in JS object
        // then the results are processed.
        fetch(url,{method: 'get'})
            .then(response => response .json())
                .then(results => {
// console.log(results); // Display results.

                //$(city).find('option').remove();        // Deletes all old option fields.

                const filteredResults = results.filter(element => element.nom === city);

                if (filteredResults.length) {             // if result is > 0.

                    filteredResults.forEach(element => {
                        const coordinates = element.centre.coordinates;
                        const lon = coordinates[0];
                        const lat = coordinates[1];
//console.log("lon : ", lon);
//console.log("lat : ", lat);

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
                       
                        // Nous ajoutons un marqueur sur la carte.
                        var marker = L.marker(
                            [
                                lat,
                                lon,
                            ], 
                            {icon: icon}
                        ).addTo(myMap);
                        // On ajoute un popup avec le nom du lieu.
                        marker.bindPopup(
                            "<p>" + city + "</p>" +
                            "<img src=" + img + " alt=" + alt + ">", {minWidth: 150} 
                        );
                        // On l'affiche au chargement de la page.
                        // marker.openPopup();
                         
                    });
                }
            }).catch(err => {
                console.log(err);
                $(city).find('option').remove(); // Deletes all old option fields.
            });

    } else {
      console.log("No URL to display.");
    }
});
