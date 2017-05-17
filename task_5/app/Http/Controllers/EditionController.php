<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Edition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Validator;

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
            $edition = new Edition;
            $edition->name = $request->name;
            $edition->address = $request->country_city . ', ' . $request->street . ', ' . $request->home;
            $edition->zip = $request->ZIP;
            $edition->personId = $request->contact_person;
            $edition->save();
            echo "Edition is saved";
        }
        return view('edition_admin')->with('items', $city);
    }

    public function upload(Request $request){
        if ($request->isMethod('post')){
            print_r($request->all());
        }
        return view('addImages');
    }

    public function index(){
        return view('addImages');
    }

    
}
