<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function Endereco(){
        return $this->hasOne('App\Endereco');
    }
}
