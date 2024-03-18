<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Route Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <style>
         body {
            background-image: url(image/busbg.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            /* display: flex; */
            justify-content: center;
            align-items: center;
        }

        #map {
            height: 400px;
            margin-bottom: 30px;
            margin-top: 30px;
        }

        .container {
            /* background-color: rgba(255, 255, 255, 0.8); 
            border-radius: 10px;
            padding: 20px; */
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.5);
            border: 1px solid gray;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            align-items: center;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            
        }

        button:hover {
            background-color: #0056b3;
        }

        p {
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="input-group">
        <label for="pickupLocation">Pickup Location:</label>
        <input type="text" id="pickupLocation">
    </div>
    <div class="input-group">
        <label for="dropoffLocation">Drop-off Location:</label>
        <input type="text" id="dropoffLocation">
    </div>
    <button onclick="showRoute()">Show Route</button>
</div>
<div id="map"></div>
<div class="container">
    <p>Distance: <span id="distanceValue"></span> km</p>
    <p>Travel Time: <span id="travelTimeValue"></span> minutes</p>
    
    <button class="confirm"  onclick="confirmDetails()">
        CONFIRM
    </button>
</div>

    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

        <script>

function confirmDetails() {
    // Retrieve data to be sent to the server
    var pickupLocation = document.getElementById("pickupLocation").value;
    var dropoffLocation = document.getElementById("dropoffLocation").value;
    var distanceValue = document.getElementById("distanceValue").textContent;
    var travelTimeValue = document.getElementById("travelTimeValue").textContent;

    // Send the data to the server using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "confirmroute.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Handle the server's response (you can display a message or perform other actions)
            alert(xhr.responseText);
            window.location.href = "Login.php";
        }
    };
    xhr.send("pickupLocation=" + pickupLocation + "&dropoffLocation=" + dropoffLocation + "&distanceValue=" + distanceValue + "&travelTimeValue=" + travelTimeValue);
}

            var map = L.map('map').setView([15.286691, 73.969780], 10);
            mapLink = "<a href='http://openstreetmap.org'>OpenStreetMap</a>";
            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', { attribution: 'Leaflet &copy; ' + mapLink + ', contribution', maxZoom: 18 }).addTo(map);

            function geocodeLocation(locationText) {
                var apiKey = 'd69bb7019345471aa055d0004205e554'; // Replace with your OpenCageData API key
                var apiUrl = `https://api.opencagedata.com/geocode/v1/json?q=${encodeURIComponent(locationText)}&key=${apiKey}`;

                return axios.get(apiUrl)
                    .then(function (response) {
                        if (response.status === 200) {
                            var results = response.data.results;
                            if (results.length > 0) {
                                return {
                                    lat: results[0].geometry.lat,
                                    lng: results[0].geometry.lng
                                };
                            } else {
                                throw new Error("No results found for the location.");
                            }
                        } else {
                            throw new Error("Error occurred while geocoding.");
                        }
                    })
                    .catch(function (error) {
                        throw error;
                    });
            }

            var lat1, lat2, lng1, lng2;

            async function getCoordinates() {
                var pickupLocation = document.getElementById("pickupLocation").value;
                var dropoffLocation = document.getElementById("dropoffLocation").value;

                try {
                    var pickupCoordinates = await geocodeLocation(pickupLocation);
                    var dropoffCoordinates = await geocodeLocation(dropoffLocation);
                    processCoordinates(pickupCoordinates, dropoffCoordinates);
                } catch (error) {
                    console.error("An error occurred while geocoding:", error);
                }
            }

            function processCoordinates(pickupCoordinates, dropoffCoordinates) {
                lat1 = pickupCoordinates.lat;
                lng1 = pickupCoordinates.lng;
                lat2 = dropoffCoordinates.lat;
                lng2 = dropoffCoordinates.lng;

                var marker = L.marker([lat1, lng1]).addTo(map);
                var newMarker = L.marker([lat2, lng2]).addTo(map);

                L.Routing.control({
                    waypoints: [
                        L.latLng(lat1, lng1),
                        L.latLng(lat2, lng2)
                    ]
                }).on('routesfound', function (e) {
                    var routes = e.routes;
                    var distanceInKilometers = (routes[0].summary.totalDistance / 1000).toFixed(2);
                    var travelTimeInMinutes = (routes[0].summary.totalTime / 60).toFixed(2);

                    document.getElementById("distanceValue").textContent = distanceInKilometers;
                    document.getElementById("travelTimeValue").textContent = travelTimeInMinutes;
                    map.setZoom(9);
                }).addTo(map);
            }

            function showRoute() {
                getCoordinates();
            }
        </script>
    </body>
    </html>
