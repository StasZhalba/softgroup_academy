<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function show(){
//        $data = array('title' => 'Hello');
//        return view('temlate', $data);
        return view('temlate')->with('title', 'Hello');
    }
}
