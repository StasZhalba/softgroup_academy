<?php

namespace App\Http\Controllers;

use App\Author;
use App\City;
use App\Edition;
use App\Person;
use Illuminate\Http\Request;
use DB;
use App\Country;

class Core extends Controller
{
    //
    public function getCountries(Request $request){
        /*$city = City::find(1);
        $country = Country::find(1);

        $city->country()->associate($country);
        $city->save();*/

        /*$cities = City::all();
        $country = Country::find(1);

        foreach ($cities as $city){
            $city->country()->associate($country);
            $city->save();
        }*/

    }
}
