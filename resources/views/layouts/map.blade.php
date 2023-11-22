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

var yellowIcon = new L.Icon({
  iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
  shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
  iconSize: [25, 41],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34],
  shadowSize: [41, 41]
});

navigator.geolocation.watchPosition(success, error);

function success(pos) {

 const lat = pos.coords.latitude;
 const lng = pos.coords.longitude;
 DisplayMap(lat, lng);
}

function error(err) {
 if (err.code === 1) {
     alert("Please allow geolocation access");
 } else {
     alert("Cannot get current location");
 }
}

function DisplayMap(lat, lng) {
    const accuracy = pos.coords.accuracy / 5;

    if (marker) {
        map.removeLayer(marker);
        map.removeLayer(circle);
    }
// Removes any existing marker and circule (new ones about to be set)

marker = L.marker( new L.LatLng(lat, lng), {icon:yellowIcon}).addTo(map);
circle = L.circle([lat, lng], { radius: accuracy, color: 'DarkRed', fillColor: 'Red' }).addTo(map);
// Adds marker to the map and a circle for accuracy

if (!zoomed) {
    zoomed = map.fitBounds(circle.getBounds()); 
}
// Set zoom to boundaries of accuracy circle

map.setView([lat, lng]);
// Set map focus to current user position



@foreach ($kebab_map as $kebab)

var LogoIcon = new L.Icon({
 iconUrl: '{{ asset('images/diners/logos/' . $kebab->logo) }}',
 shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
 iconSize: [40, 40],
 iconAnchor: [12, 41],
 popupAnchor: [1, -34],
 shadowSize: [41, 41]
});



   L.marker(  new L.LatLng({{ $kebab->latitude }}, {{ $kebab->longitude }}), {icon:LogoIcon})
   .addTo(map)
   .bindPopup("<b>{{ $kebab->name }}</b><br><button onclick=\"window.location.href='{{ route('shops.show', $kebab->id) }}'\">View</button>");
   
@endforeach
}
 </script>