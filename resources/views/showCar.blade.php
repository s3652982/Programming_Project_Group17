@extends('layouts.app')

@section('content')





     
     <div class="container">
         <h1 class="text-center my-5">
            {{$cars->licenseplate}}
         </h1>

         <div class="row justify-content-center">
            <div class="card card-default">
                <div class="card-header">
                    Car Details
                </div>  
         

                <div class="car-body">
                     {{$cars->make}}
                     {{$cars->model}}
                     {{$cars->carpark}}
                </div>
             </div>
         </div>
     </div>
</body>

</html>
