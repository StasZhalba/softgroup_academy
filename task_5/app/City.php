<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $table = 'cities';

    public function country(){
        return $this->belongsTo('App\Country', 'id');
    }

    /*public function getNameAttribute($value){
        return 'Hello world ' . $value;
    }

    public function setNameAttribute($value){
        $this->attributes['name'] = ' | ' . $value;
    }*/
}
