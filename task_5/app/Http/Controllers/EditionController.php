<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Edition;
use Illuminate\Http\Request;

class EditionController extends Controller
{
    public function getEditions($sort = 0){
        switch ($sort){
            case 1:
                $editions = Edition::orderBy('name', 'desc')->get();
                break;
            case 2:
                $editions = Edition::orderBy('address', 'desc')->get();
                break;
            case 3:
                $editions = Edition::orderBy('zip', 'desc')->get();
                break;
            case 4:
                $editions = Edition::orderBy('personId', 'desc')->get();
                break;
            default:
                $editions = Edition::all();
        }

        return view('editions')->with('items', $editions);
    }

    public function deleteEdition($id){
        Edition::destroy($id);
        return redirect()->route('editionAll');
    }

    public function addEdition(Request $request){
        $city = City::all();
        if ($request->isMethod('post')){
            //echo $request->input('name');
        }
        return view('edition_admin')->with('items', $city);
    }
}
