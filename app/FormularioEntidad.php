<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormularioEntidad extends Model
{
    //
    protected $table ="formulario_entidades";

    public function formulario()
    {
        return $this->belongsTo('App\Formulario');
    }

    public function entidad()
    {
        return $this->belongsTo('App\Entidad');
    }
}
