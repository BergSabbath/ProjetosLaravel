<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alimento extends Model
{
    public function Loja(){
        return $this->belongsTo('App\Loja');
    }
}
