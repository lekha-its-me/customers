<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Service extends Model
{
//    public function __construct(Service $service)
//    {
//        $this->service = $service;
//    }

    public static function getTotalPrice($service)
    {
        $totalPrice = DB::table('customer_service')
            ->where('service_id', $service)
            ->sum('price');
        return $totalPrice;
    }

    public static function getTotalPriceByDate($service, $beginDate, $endDate)
    {
        $totalPrice = DB::table('customer_service')
            ->where('created_at','>',$beginDate)
            ->where('created_at','<',$endDate)
            ->where('service_id', $service)
            ->sum('price');
        return $totalPrice;
    }

    public static function getTotal($beginDate, $endDate)
    {
        $totalPrice = DB::table('customer_service')
            ->where('created_at','>',$beginDate)
            ->where('created_at','<',$endDate)
            ->sum('price');
        return $totalPrice;
    }

    public function customers()
    {
        return $this->belongsToMany('\App\Customer')
            ->withPivot('price')
            ->withTimestamps();
    }
}
