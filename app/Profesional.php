<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesional extends Model
{
    protected $table = "profesionales";
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
