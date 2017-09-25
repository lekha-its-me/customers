<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;

use App\Http\Requests;

class BuyingMaterialController extends Controller
{
    public function buy()
    {
        $materials = \App\Material::all()->sortBy('title');
        return view('buyingMaterial.index')->with(compact('materials'));
    }

    public function save(Request $request)
    {
        $item = $request->input('material');
        $price = $request->input('price');

        $buyingMaterial = new \App\BuyingMaterial();
        $buyingMaterial->price = $price;
        $material = \App\Material::find($item);
        $material->buyingMaterial()->save($buyingMaterial);


        return redirect( url('materials'))->with('status', 'Продажа совершена!');
    }

    public function totalBuyingPrice()
    {
        $priceArr = [];
        $sum = 0;
        $materials = \App\Material::all()->sortBy('title');

        foreach ($materials as $item)
        {
            $priceArr[] = array($item->title => \App\BuyingMaterial::getTotalPrice($item->id));
            $sum += \App\BuyingMaterial::getTotalPrice($item->id);

        }
        return view("buyingMaterial.report")->with(compact('priceArr', 'sum'));
    }

    function totalBuyingPriceByDate(Request $request)
    {
        $beginDate = $request->input("beginDate");
        $endDate = $request->input("endDate");
        $priceArr = [];
        $sum = 0;
        $materials = \App\Material::all()->sortBy('title');


        foreach ($materials as $item)
        {
            $priceArr[] = array($item->title => \App\BuyingMaterial::getTotalPriceByDate($item->id, $beginDate, $endDate));
            $sum += \App\BuyingMaterial::getTotalPriceByDate($item->id, $beginDate, $endDate);
        }
        return view("buyingMaterial.report")->with(compact('priceArr', 'sum', 'beginDate', 'endDate'));
    }

    function totalPriceByDate(Request $request)
    {
        $beginDate = $request->input("beginDate");
        $endDate = $request->input("endDate");
        $priceArr = [];
        $sum = 0;

        $services = \App\Service::getTotal($beginDate, $endDate);
        $materials = \App\BuyingMaterial::getTotal($beginDate, $endDate);

        $total = $services - $materials;

        return view("sell.total")->with(compact('total', 'services', 'materials', 'beginDate', 'endDate'));
    }

    function showReport()
    {
        return view("sell.total");
    }
}
