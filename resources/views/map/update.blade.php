    {{-- <script>



        const mapEdit = L.mapEdit('mapEdit');
        // Initializes map

        mapEdit.setView([51.505, -0.09], 13);
        // Sets initial coordinates and zoom level

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(mapEdit);
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
                mapEdit.removeLayer(marker);
            }

            // Set marker position
            mrk.setLatLng([lat, lng]);

            latitudeInput.value = lat;
            longitudeInput.value = lng;

            mapEdit.setView([lat, lng]);
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
                mapEdit.setView([lat, lng]);

                // Remove the existing marker if it exists
                if (marker) {
                    mapEdit.removeLayer(marker);
                }

                // Add marker to the map
                mrk.addTo(mapEdit);
            }
        }

        mrk.addTo(mapmapEdit);
        setTimeout(function () { mapEdit.invalidateSize() }, 800);
    </script> --}}