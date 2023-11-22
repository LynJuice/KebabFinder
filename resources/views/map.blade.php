<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- MAP --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="mb-3">
        <div class="map-container">
        </div>
    </div>

    <div class="row g-3">
        <div class="col">
            <input id="latitudeInput" type="text" class="form-control" placeholder="latitude" aria-label="Flatitude">
        </div>
        <div class="col">
            <input id="longitudeInput" type="text" class="form-control" placeholder="longitude"
                aria-label="longitude">
        </div>
    </div>

    <style>
        .map-container {
            height: 900px;
        }
    </style>

    {{-- MAP --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    {{-- @foreach ($kebab_list as $kebab) --}}
    <script>
        const map = L.map(document.querySelector('.map-container'));
        // Initializes map

        map.setView([51.505, -0.09], 13);
        // Sets initial coordinates and zoom level

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);
        // Sets map data source and associates with map

        let marker, zoomed;
        let mrk = L.marker([0, 0], {
            draggable: true
        });

        navigator.geolocation.watchPosition(success, error);

        let latitudeInput = document.getElementById('latitudeInput');
        let longitudeInput = document.getElementById('longitudeInput');

        function success(pos) {
            const lat = pos.coords.latitude;
            const lng = pos.coords.longitude;
            const accuracy = pos.coords.accuracy;

            // Remove the existing marker if it exists
            if (marker) {
                map.removeLayer(marker);
            }

            // Set marker position
            mrk.setLatLng([lat, lng]);

            latitudeInput.value = lat;
            longitudeInput.value = lng;

            map.setView([lat, lng]);
        }

        function error(err) {
            if (err.code === 1) {
                alert("Please allow geolocation access");
            } else {
                alert("Cannot get current location");
            }
        }

        // mrk.addEventListener("onClick", (e) => {console.log("test")});

        mrk.on('dragend', function(e) {
            var latlng = e.target.getLatLng();
            latitudeInput.value = latlng.lat;
            longitudeInput.value = latlng.lng;
            console.log(e);
            console.log(latlng);
            //   setTimeout(function() {
            //     map.on('click', mapClickListen);
            //   }, 10);
        });

        latitudeInput.addEventListener('input', function() {
            updateMarkerPosition();
        });

        longitudeInput.addEventListener('input', function() {
            updateMarkerPosition();
        });

        function updateMarkerPosition() {
            const lat = parseFloat(latitudeInput.value);
            const lng = parseFloat(longitudeInput.value);

            if (!isNaN(lat) && !isNaN(lng)) {
                // Update marker position
                mrk.setLatLng([lat, lng]);

                // Update map view
                map.setView([lat, lng]);

                // Remove the existing marker if it exists
                if (marker) {
                    map.removeLayer(marker);
                }

                // Add marker to the map
                mrk.addTo(map);
            }
        }

        mrk.addTo(map);
    </script>
    {{-- @endforeach --}}
</body>

</html>
