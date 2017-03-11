<?php

namespace App\Http\Controllers;

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
}
