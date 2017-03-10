<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    //
    protected $table = 'editions';

    public function person(){
        return $this->belongsTo('App\Person', 'id');
    }

    public function books(){
        return $this->hasMany('App\Book', 'editionId');
    }


}
