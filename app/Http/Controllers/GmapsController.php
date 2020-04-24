<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \config\googlemaps;
use \FarhanWazir\GoogleMaps\GMaps;
use Illuminate\Support\Facades\DB;
use \App\Car;


class GmapsController extends Controller
{
   public function addMarker(){
      $db = DB::table('gmaps_geocache');
      //insert Marker: Car Park No.1 to No.10
      if($db -> where('address','=','Car Park No.1') -> count() > 0){
         echo 'Car Park No.1 already exist!';
         $result = false;
      }else{
         $result = $db -> insert([
            [
               'address' => 'Car Park No.1',
               'latitude' => '-37.813287',
               'longitude' => '144.966644',
               'numofcar' => 3
            ],
            [
               'address' => 'Car Park No.2',
               'latitude' => '-37.8379942',
               'longitude' => '144.9753276',
               'numofcar' => 0
            ],
            [
               'address' => 'Car Park No.3',
               'latitude' => '-37.812139',
               'longitude' => '144.964010',
               'numofcar' => 0
            ],
            [
               'address' => 'Car Park No.4',
               'latitude' => '-37.817589',
               'longitude' => '144.965019',
               'numofcar' => 2
            ],
            [
               'address' => 'Car Park No.5',
               'latitude' => '-37.812510',
               'longitude' => '144.972008',
               'numofcar' => 1
            ],
            [
               'address' => 'Car Park No.6',
               'latitude' => '-37.814532',
               'longitude' => '144.951874',
               'numofcar' => 1
            ],
            [
               'address' => 'Car Park No.7',
               'latitude' => '-37.831530',
               'longitude' => '144.967314',
               'numofcar' => 4
            ],
            [
               'address' => 'Car Park No.8',
               'latitude' => '-37.832405',
               'longitude' => '144.956261',
               'numofcar' => 2
            ],
            [
               'address' => 'Car Park No.9',
               'latitude' => '-37.829007',
               'longitude' => '144.970487',
               'numofcar' => 1
            ],
            [
               'address' => 'Car Park No.10',
               'latitude' => '-37.820962',
               'longitude' => '144.961751',
               'numofcar' => 2
            ]
   
         ]);
      }
           
      if($result == true){
         echo 'Added successfully!';
      }

      
   }
   public function Gmaps(){
    $config['center'] =  '-37.813287, 144.966644';
    $config['zoom'] = '13';
    $config['map_height'] = '500px';
    $config['map_width'] = '1000px';
    $config['geocodeCaching'] = true;
    $config['scrollwheel'] = false;
    
    
    $gmap = new GMaps();
    $gmap->initialize($config);

    
    // GMaps::initialize($config);

   //get car park marker from database
       $db = DB::table('gmaps_geocache');
       $data = $db -> get();
   foreach($data as $key => $value){
      $marker['position'] = $value -> latitude.', '.$value -> longitude;
      $marker['infowindow_content'] = $value -> address.' [Number of Cars:'.$value -> numofcar.']';
      $gmap->add_marker($marker);
   }
   //get car marker from database
      $car = $db -> where('numofcar','>','0') -> get();
      foreach($car as $key => $value){  
      $marker['position'] = $value -> latitude.', '.$value -> longitude;
      //$marker['infowindow_content'] = $value -> address;
      $marker['icon'] = 'http://maps.google.com/mapfiles/kml/pal2/icon47.png';
      $gmap->add_marker($marker);
   }
   
   
    $map = $gmap->create_map();
    //  $map = GMaps::create_map();
    return view('welcome')->with('cars', Car::all())->with('map', $map);
    
 
    
   }




   public function addCar(){
      $db = DB::table('cars');
      //insert car
      if($db -> where('licenseplate','=','ABC111') -> count() > 0){
         echo 'Car already exist!';
         $result = false;
      }else{
         $result = $db -> insert([
            [
               'licenseplate' => 'ABC111',
               'make' => 'maketest1',
               'model' => 'modeltest1',
               'carpark' => 'Car Park No.1'
            ],
            [
              'licenseplate' => 'ABC222',
              'make' => 'maketest2',
              'model' => 'modeltest2',
              'carpark' => 'Car Park No.4'
            ],
            [
              'licenseplate' => 'ABC333',
              'make' => 'maketest1',
              'model' => 'modeltest1',
              'carpark' => 'Car Park No.4'
            ],
            [
              'licenseplate' => 'ABC444',
              'make' => 'maketest1',
              'model' => 'modeltest1',
              'carpark' => 'Car Park No.5'
            ],
            [
              'licenseplate' => 'ABC555',
              'make' => 'maketest1',
              'model' => 'modeltest1',
              'carpark' => 'Car Park No.6'
            ],
            [
              'licenseplate' => 'ABC666',
              'make' => 'maketest1',
              'model' => 'modeltest1',
              'carpark' => 'Car Park No.7'
            ],
            [
              'licenseplate' => 'ABC777',
              'make' => 'maketest1',
              'model' => 'modeltest1',
              'carpark' => 'Car Park No.8'
            ],
            [
              'licenseplate' => 'ABC888',
              'make' => 'maketest1',
              'model' => 'modeltest1',
              'carpark' => 'Car Park No.9'
            ],
            [
              'licenseplate' => 'ABC999',
              'make' => 'maketest1',
              'model' => 'modeltest1',
              'carpark' => 'Car Park No.10'
            ],
            [
              'licenseplate' => 'ABC000',
              'make' => 'maketest1',
              'model' => 'modeltest1',
              'carpark' => 'Car Park No.10'
            ]
   
         ]);
      }
           
      if($result == true){
         echo 'Added successfully!';
      }   
   }


   public function showCar($carId)
   {
     return view('showCar')->with ('cars', Car::find($carId));
   }
}
