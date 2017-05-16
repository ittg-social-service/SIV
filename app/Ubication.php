<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubication extends Model
{
    //
    public function device(){
        return $this->belongsTo('App\Device');
    }

}
