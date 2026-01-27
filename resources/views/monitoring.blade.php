@extends('layouts.main')

@section('content')
<div class="container">
    <!-- Map Container -->
    <div id="map" style="height: 600px; margin: 20px 0; border-radius: 8px;"></div>
</div>

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css" />

<!-- Leaflet JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>

<script>
    // Initialize map centered at Indonesia
    const map = L.map('map').setView([-6.967568, 107.659095], 20);
    
    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.de/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors',
        maxZoom: 20
    }).addTo(map);
    
    // Example marker
    @foreach($absens as $a)
        L.marker([{{$a->lat}}, {{$a->long}}])
            .bindPopup('{{ $a->user->name }}')
            .addTo(map);
    @endforeach
</script>

@endsection