<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    public function ubications()
    {
        return $this->hasMany('App\Ubication');
    }
    public function driver()
    {
      return $this->belongsTo('App\Driver');
    }

}
