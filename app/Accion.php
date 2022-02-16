<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accion extends Model
{
    //
    protected $table="acciones";

    public function resultado()
    {
        return $this->belongsTo('App\Resultado');
    }
}
