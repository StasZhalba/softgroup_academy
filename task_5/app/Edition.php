<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    //
    protected $table = 'editions';
    public $timestamps = false;

    public function person(){
        return $this->belongsTo('App\Person', 'personId');
    }

    public function books(){
        return $this->hasMany('App\Book', 'editionId');
    }


}
