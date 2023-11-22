    <script>
        function zemelapis(mapElementID, latitudeInputElementID, longitudeInputElementID) {


            const data = {};
            data.map = L.map(mapElementID);

            data.latitudeInput = document.getElementById(latitudeInputElementID);
            data.longitudeInput = document.getElementById(longitudeInputElementID);
            // Initializes map
    
            data.map.setView([51.505, -0.09], 13);
            // Sets initial coordinates and zoom level
    
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(data.map);
            // Sets map data source and associates with map
    
            data.marker = undefined;
            let zoomed;
            data.mrk = L.marker([0, 0], {
                draggable: true
            });
    
            
    
            // mrk.addEventListener("onClick", (e) => {console.log("test")});
    
            data.mrk.on('dragend', function(e) {
                var latlng = e.target.getLatLng();
                data.latitudeInput.value = latlng.lat;
                data.longitudeInput.value = latlng.lng;
                console.log(e);
                console.log(latlng);
                //   setTimeout(function() {
                //     map.on('click', mapClickListen);
                //   }, 10);
            });
    
            data.latitudeInput.addEventListener('input', function() {
                data.updateMarkerPosition();
            });
    
            data.longitudeInput.addEventListener('input', function() {
                data.updateMarkerPosition();
            });
    
            data.updateMarkerPosition = function() {
                const lat = parseFloat(this.latitudeInput.value);
                const lng = parseFloat(this.longitudeInput.value);
                console.log(lat, lng);
    
                if (!isNaN(lat) && !isNaN(lng)) {
                    // Update marker position
                    this.mrk.setLatLng([lat, lng]);
    
                    // Update map view
                    this.map.setView([lat, lng]);
    
                    // Remove the existing marker if it exists
                    if (this.marker) {
                        this.map.removeLayer(this.marker);
                    }
    
                    // Add marker to the map
                    this.mrk.addTo(this.map);
                }
            }
    
            if (data.latitudeInput.value && data.longitudeInput.value) {
                data.updateMarkerPosition();
            } else {
                navigator.geolocation.watchPosition(geolocationSuccess, geolocationError);
            }
    
            function geolocationSuccess(pos) {
                const lat = pos.coords.latitude;
                const lng = pos.coords.longitude;
                const accuracy = pos.coords.accuracy;
    
                // Remove the existing marker if it exists
                if (data.marker) {
                    data.map.removeLayer(data.marker);
                }
    
                // Set marker position
                data.mrk.setLatLng([lat, lng]);
    
                data.latitudeInput.value = lat;
                data.longitudeInput.value = lng;
    
                data.map.setView([lat, lng]);
            }
    
            function geolocationError(err) {
                if (err.code === 1) {
                    alert("Please allow geolocation access");
                } else {
                    alert("Cannot get current location");
                }
            }

            data.mrk.addTo(data.map);
            
            setTimeout(function () { 
                data.map.invalidateSize();
                // updateMarkerPosition();
            }, 800);

            return data;
        }

        let mapCreate = zemelapis('mapCreate', 'createLatitudeInput', 'createLongitudeInput');
        let mapEdit = zemelapis('mapEdit', 'editLatitudeInput', 'editLongitudeInput');

    </script>