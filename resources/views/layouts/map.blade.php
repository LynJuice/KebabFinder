<script>
const map = L.map('map'); 

map.setView([55.229023057406344, 23.88427734375], 6); 

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
 maxZoom: 15,
 attribution: 'Good Vibes Kebab'
}).addTo(map); 

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
    const accuracy = pos.coords.accuracy / 5;

    if (marker || circle) {
        map.removeLayer(marker);
        map.removeLayer(circle);
    }

    const location = new L.LatLng(lat, lng);
    marker = L.marker( location, {icon:yellowIcon}).addTo(map);
    circle = L.circle(location, { radius: accuracy, color: 'DarkRed', fillColor: 'Red' }).addTo(map);

    if (!zoomed) {
        zoomed = map.fitBounds(circle.getBounds()); 
    }

    map.setView(location, 13);

    showAllMarkers();
}

function error(err) {
    const lat = 55.229023057406344;
    const lng = 23.88427734375;

    if(marker)
    {
        map.removeLayer(marker);
    }

    map.setView(new L.LatLng(lat, lng), 6);

    showAllMarkers();
}

function showAllMarkers(){
    @foreach ($kebab_map as $kebab)
        var LogoIcon = new L.Icon({
            iconUrl: '{{ asset('images/diners/logos/' . $kebab->logo) }}',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [40, 40],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        var popupText = `
        <div class="card-body text-center">
            <h5 class="card-title"><b>{{ $kebab->name }}</b></h5>
            <p class="card-text">{{ $kebab->address }}</p>
            <p class="card-text">{{ $kebab->phone }}</p>
            <p class="card-text">{{ $kebab->description }}</p>
            <a href="{{ route('shops.show', $kebab->id) }}" class="btn btn-primary" style="color:white">Žiurėti</a>
        </div>
`;
        showMarker([{{ $kebab->latitude }}, {{ $kebab->longitude }}], LogoIcon, popupText);
    @endforeach
}

function showMarker(location, icon, popupText) {
    marker = L.marker(location, {icon: icon}).addTo(map);
    marker.bindPopup(popupText);
}
 </script>