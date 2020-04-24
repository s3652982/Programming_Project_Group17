<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

     public function getCar(){
        return view('welcome')->with('cars', Car::all());
     }

    
    }
