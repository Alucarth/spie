<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    //
    public function meta()
    {
        return $this->belongsTo('App\Meta');
    }
}
