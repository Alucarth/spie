<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    //
    public function eje()
    {
        return $this->belongsTo('App\Eje');
    }
}
