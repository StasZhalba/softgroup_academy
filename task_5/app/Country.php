<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    //protected $primaryKey = 'id';
    public $incrementing = FALSE;
    public $timestamps = FALSE;

    protected $fillable = ['name'];

    public function cities(){
        return $this->hasMany('App\City', 'countryId');
    }

    public function authors(){
        return $this->hasMany('App\Author', 'countryId');
    }
}
