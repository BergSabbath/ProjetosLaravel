<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loja extends Model
{
    public function Alimento(){
        return $this->hasOne('App\Alimento');
    }
}
