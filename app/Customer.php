<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function services()
    {
        return $this->belongsToMany('App\Service')
            ->withPivot('price')
            ->withTimestamps();
    }
}
