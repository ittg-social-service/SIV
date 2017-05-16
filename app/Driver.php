<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    //
    public function device(){
      return $this->hasOne('App\Device');
    }

}
