@extends('layouts.main')
@section('styles')
    <style type="text/css">
        #map {
            height: 400px;
        }
    </style>
@endsection

@section('content')
    <div class="container mt-5">
        <div id="map"></div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        function initMap() {
            const myLatLng = {
                lat: 35.1692736,
                lng: 8.8276850
            };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 5,
                center: myLatLng,
            });

            new google.maps.Marker({
                position: myLatLng,
                map,
                title: "Hello Rajkot!",
            });
        }

        window.initMap = initMap;
    </script>

    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap"></script>
@endsection
