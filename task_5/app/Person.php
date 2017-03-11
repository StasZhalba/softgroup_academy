<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //
    protected $table = 'persons';

    public function editions(){
        return $this->hasMany('App\Edition', 'personId', 'id');
    }
}
