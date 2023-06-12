// Retriev zipcode
$(document).ready(function() {

    const zipcodeElement = document.querySelector('.zipcode');
    const cityElement = document.querySelector('.city');
    const imgElement = document.querySelector('.imgDetailEvent');
    const imgSrc = imgElement.getAttribute('src');
    const imgAlt = imgElement.getAttribute('alt');

    if (zipcodeElement && cityElement && imgElement) {

        const zipcode = zipcodeElement.textContent.trim(); // trim() = remove empty spaces
        const city = cityElement.textContent.trim();
        const img = imgSrc.trim();
        const alt = imgAlt.trim();

// console.log(city);
        
        const apiUrl = 'https://geo.api.gouv.fr/communes?codePostal='; // For construct the URL.

        const format = '&format=json'; // Format with wich we retrive the datas.

        let url = apiUrl + zipcode + '&fields=code,nom,centre' + format; // Adresse of geoApi + zipcode + format. (concatenation).

// console.log(url); // Displays data binded to the zipcode.

        // fetch() retrive datas by GET methode
        // Converted with Json in JS object
        // Then the results are processed.
        fetch(url,{method: 'get'})                  // Promise by making an HTTP request.
            .then(response => response .json())     // Callback: Response is chained to fetch promise.
                .then(results => {                  // Callback: Results are chained to the response.

// console.log(results); // Display results.

                // $(city).find('option').remove();        // Deletes all old option fields.

                // Filter the content of JSON file (associative array).
                const filteredResults = results.filter(element => element.nom === city);

                if (filteredResults.length) {             // if result is > 0.

                    filteredResults.forEach(element => {
                        const coordinates = element.centre.coordinates;
                        const lon = coordinates[0];
                        const lat = coordinates[1];

//console.log("lon : ", lon);
//console.log("lat : ", lat);

                        // Create the object "myMap" and insert it in the HTML element that has the ID "map".
                        myMap = L.map('map').setView([lat, lon], 11); // The second argument of setView() is the zoom on the map (from 0 to 20).
                        // At 0 it's full zoom and 20 it's the nearest
                        // We ask to Leaflet to load the (tiles) from openstreetmap.fr.
                        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                            // It is a good practice to give the link of the data source.
                            attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
                            minZoom: 1,
                            maxZoom: 20
                        }).addTo(myMap);

                        // Customization of the mark.
                        var icon = L.icon(
                            {
                                iconUrl: "public/img/icon/pushpin-blue-01.svg",
                                iconSize: [30, 30],
                                iconAnchor: [25, 50],
                                popupAnchor: [0, -50],
                            }    
                        );
                       
                        // Add a pushpin on the map.
                        var marker = L.marker(
                            [
                                lat,
                                lon,
                            ], 
                            {icon: icon}
                        ).addTo(myMap);
                        // Add popup with city name and an img.
                        marker.bindPopup(
                            "<p>" + city + "</p>" +
                            "<img class=\"imgPopup\" src=" + img + " alt=" + alt + ">", {minWidth: 150} 
                        );
                        // Displayed when the page loads.
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
