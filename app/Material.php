<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public function buyingMaterial()
    {
        return $this->hasMany('\App\BuyingMaterial');
    }
}

