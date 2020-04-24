<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Carabc</title>
        <script>
            function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            
        }

            function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            
        }
            function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
        }       

            function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.body.style.backgroundColor = "white";
        }
            // JS for side bar

            

            function getLocation() {
            if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
            } else { 
            document.getElementById("demo").innerHTML = "Geolocation is not supported by this browser.";
            }
        }       

            function showPosition(position) {
            document.getElementById("demo").innerHTML = "Latitude: " + position.coords.latitude + 
            "<br>Longitude: " + position.coords.longitude;
        }
        </script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- Styles -->
        <style>
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

            .button {
                margin-top: 1px;
                margin-right: 2px;
                position:absolute;
                top:0;
                left:0;
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

            .sidenav {
                height: 100%; /* 100% Full-height */
                width: 0; /* 0 width - change this with JavaScript */
                position: fixed; /* Stay in place */
                z-index: 1; /* Stay on top */
                top: 0;
                left: 0;
                background-color: #111; /* Black*/
                overflow-x: hidden; /* Disable horizontal scroll */
                padding-top: 60px; /* Place content 60px from the top */
                transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
                }

                /* The navigation menu links */
                .sidenav a {
                padding: 8px 8px 8px 32px;
                text-decoration: none;
                font-size: 25px;
                color: #818181;
                display: block;
                transition: 0.3s;
                }

                /* When you mouse over the navigation links, change their color */
                .sidenav a:hover {
                color: #f1f1f1;
                }

                /* Position and style the close button (top right corner) */
                .sidenav .closebtn {
                position: absolute;
                top: 0;
                right: 25px;
                font-size: 36px;
                margin-left: 50px;
                }

               /* .sidenav .button {
                position: absolute;
                right: 25px;
                font-size: 36px;
                margin-left: 50px;
               } */

                /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
                @media screen and (max-height: 450px) {
                .sidenav {padding-top: 15px;}
                .sidenav a {font-size: 18px;}
                }


        </style>
        
        {!! $map['js'] !!}
    </head>
    <body>
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
             @endif
        </div>
                        
                <div class="content">
                
                <div class="title m-b-md">
                    Carabc 
                </div>



                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    {{-- <a href="#">Car List</a> --}}
                    <div class="card-header">
                        Car List
                    </div>
                    <div class="card card-default">
                    
                    
                    @foreach($cars as $car)
                    
                        <li class="list-group-item">
                            {{$car->id}}
                            {{$car->licenseplate}}
                        <a href="{{$car->id}}" class="btn btn-outline-dark btn-sm float:righht" >View</a>
                        </li>   
                   
                    @endforeach
                    
                    </div>
                </div>   

                <div class="top-left button">
                    <button type="button" class="btn btn-secondary" onclick="openNav()">Find Your Cars</button>
                </div>    

                <button onclick="getLocation()">Try It To Get Your Location</button>

                <p id="demo"></p>


       
                 
                  
            {!! $map['html'] !!}
               

                
</html>
