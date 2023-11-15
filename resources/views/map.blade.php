<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- MAP --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <title>Document</title>
</head>
<body>
    <div class="mb-3">
        <div id="map"></div>
      </div><!-- End Google Maps -->

      <style>
        #map { height: 900px; }
      </style>

      {{-- MAP --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    {{-- @foreach ($kebab_list as $kebab) --}}
    <script>
        const map = L.map('map'); 
 // Initializes map
 
 map.setView([51.505, -0.09], 13); 
 // Sets initial coordinates and zoom level
 
 L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
     maxZoom: 19,
     attribution: '© OpenStreetMap'
 }).addTo(map); 
 // Sets map data source and associates with map
 
 let marker, circle, zoomed;
 
 navigator.geolocation.watchPosition(success, error);
 
 function success(pos) {
 
     const lat = pos.coords.latitude;
     const lng = pos.coords.longitude;
     const accuracy = pos.coords.accuracy;
 
     if (marker) {
         map.removeLayer(marker);
         map.removeLayer(circle);
     }
     // Removes any existing marker and circule (new ones about to be set)
 
     marker = L.marker([lat, lng]).addTo(map);
     circle = L.circle([lat, lng], { radius: accuracy }).addTo(map);
     // Adds marker to the map and a circle for accuracy
 
     if (!zoomed) {
         zoomed = map.fitBounds(circle.getBounds()); 
     }
     // Set zoom to boundaries of accuracy circle
 
     map.setView([lat, lng]);
     // Set map focus to current user position

    @foreach ($kebab_list as $kebab)
        L.marker([{{ $kebab->latitude }}, {{ $kebab->longitude }}]).addTo(map);
    @endforeach
 }
 
 function error(err) {
 
     if (err.code === 1) {
         alert("Please allow geolocation access");
     } else {
         alert("Cannot get current location");
     }
 
 }
     </script>
     {{-- @endforeach --}}
</body>
</html>
