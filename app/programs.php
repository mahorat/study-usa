<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class programs extends Model
{
    //
    public $timestamps = false;

    public function level()
    {
        return $this->belongsTo('App\DegreeLevel');
    }
}
