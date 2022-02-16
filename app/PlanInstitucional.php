<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanInstitucional extends Model
{
    //
    protected $table ="plan_institucional";

    public function accion()
    {
        return $this->belongsTo('App\Accion');
    }
}
