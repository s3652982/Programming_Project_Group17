<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
           $config['center'] =  '-37.813287, 144.966644';
           $config['zoom'] = '13';
           $config['map_height'] = '500px';
            $config['geocodeCaching'] = true;
           $config['scrollwheel'] = false;

           GMaps::initialize($config);

           //Marker
    $marker['position'] = '-37.8379942,144.9753276';
    $marker['infowindow_content'] = 'Car Park No.2';
    $marker['icon'] = 'http://maps.google.com/mapfiles/kml/pal2/icon47.png';
            GMaps::add_marker($marker);

            $marker['position'] = '-37.813287, 144.966644';
    $marker['infowindow_content'] = 'Car Park No.1';
    $marker['icon'] = 'http://maps.google.com/mapfiles/kml/pal2/icon47.png';
    GMaps::add_marker($marker);

           $map = GMaps::create_map();
           return view('welcome')->with('map', $map);
});

Auth::routes(); //artisan created this

Route::get('/home', 'HomeController@index')->name('home');
