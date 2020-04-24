<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    #panel {
        position: absolute;
        top: 0px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 0px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 0px;
        padding-left: 10px;
    }
</style>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        #map{
            height: 400px;
            width: 1000px;
        }

        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
    {!! $map['js'] !!}
</head>
<body>
<script src="https://maps.googleapis.com/maps/api/js?signed_in=true&callback=initMap&key=AIzaSyCRtqgN4NPo8nBZvXdpPxTgdeoQHT_y8f4"
        async defer></script>
<script>
    function initMap() {
        var lat_lng = {lat: -34.397, lng: 150.644};
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 6,
            center: lat_lng
        });
        directionsDisplay.setMap(map);

        var onChangeHandler = function() {
            calculateAndDisplayRoute(directionsService, directionsDisplay);
        };
        document.getElementById('Source').addEventListener('change', onChangeHandler);
        document.getElementById('Destination').addEventListener('change', onChangeHandler);
    }

    function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
            origin: document.getElementById('Source').value,
            destination: document.getElementById('Destination').value,
            travelMode: google.maps.TravelMode.DRIVING
        }, function(response, status) {
            if (status === google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
            } else {
                window.alert('Request for getting direction is failed due to ' + status);
            }
        });
    }
</script>
<div id="panel">
    <b>Source: </b>
    <select id="Source">
        <option value="-37.813287, 144.966644">No.1</option>
        <option value="-37.8379942,144.9753276">No.2</option>
        <option value="-37.812139, 144.964010">No.3</option>
        <option value="-37.817589, 144.965019">No.4</option>
    </select>
    <b>Destination: </b>
    <select id="Destination">
        <option value="-37.813287, 144.966644">No.1</option>
        <option value="-37.8379942,144.9753276">No.2</option>
        <option value="-37.812139, 144.964010">No.3</option>
        <option value="-37.817589, 144.965019">No.4</option>
    </select>
</div>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Laravel
        </div>
        <div id="map"></div>


    </div>
</div>
</body>
</html>