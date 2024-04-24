<div x-data="{ map: null }" x-init="initMap()">
    <div wire:ignore id="map" style="height: 400px;"></div>
</div>

<script>
    function initMap() {
        const latitude = @json($latitude);
        const longitude = @json($longitude);

        const map = L.map('map').setView([latitude, longitude], 10);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        let circle = L.circle([latitude, longitude], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 500
        }).addTo(map);
        let marker = L.marker([latitude, longitude]).addTo(map);
    }
</script>
