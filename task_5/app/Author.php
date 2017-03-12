<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $table = 'authors';

    public function country(){
        return $this->belongsTo('App\Country', 'countryId');
    }

    public function editions(){
        return $this->hasMany('App\Edition', 'authorId');
    }
}
