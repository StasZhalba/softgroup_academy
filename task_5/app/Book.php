<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $table = 'books';

    public function author(){
        return $this->belongsTo('App\Author', 'id');
    }

    public function edition(){
        return $this->belongsTo('App\Edition', 'id');
    }

    public function genre(){
        return $this->belongsTo('App\Genre', 'id');
    }


}
