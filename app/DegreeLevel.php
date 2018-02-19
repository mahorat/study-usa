<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DegreeLevel extends Model
{
    //  
    public function program(){
        return $this->hasOne('App\programs');
    }
}
