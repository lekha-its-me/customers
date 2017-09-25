<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class BuyingMaterial extends Model
{
    public function material()
    {
        return $this->belongsTo('\App\Material');
    }

    public static function getTotalPrice($material)
    {
        $totalPrice = DB::table('buying_materials')
            ->where('material_id', $material)
            ->sum('price');
        return $totalPrice;
    }

    public static function getTotalPriceByDate($material, $beginDate, $endDate)
    {
        $totalPrice = DB::table('buying_materials')
            ->where('created_at','>',$beginDate)
            ->where('created_at','<',$endDate)
            ->where('material_id', $material)
            ->sum('price');
        return $totalPrice;
    }

    public static function getTotal($beginDate, $endDate)
    {
        $totalPrice = DB::table('buying_materials')
            ->where('created_at','>',$beginDate)
            ->where('created_at','<',$endDate)
            ->sum('price');
        return $totalPrice;
    }

}
