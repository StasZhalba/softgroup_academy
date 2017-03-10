<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 28.02.2017
 * Time: 19:01
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;

class FirstController extends Controller
{

    public function show(){
        //DB::delete('DELETE FROM `countries` WHERE `id`=?', ['7']);
        //$result = DB::connection()->getPdo()->lastInsertId();
        $array = DB::select("SELECT * FROM `countries` ");
        //DB::insert("INSERT INTO `countries` (`name`) VALUES (?)", ['Russia']);
        dump($array);
    }

}