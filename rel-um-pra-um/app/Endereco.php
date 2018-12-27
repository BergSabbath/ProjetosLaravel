<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    public function Cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
}
