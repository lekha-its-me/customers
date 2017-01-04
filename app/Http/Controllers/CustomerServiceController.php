<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Collection;
use App\Http\Requests;
use App\Customer;
use App\Service;
use DB;
class CustomerServiceController extends Controller
{
    public function sell()
    {
        $customers = \App\Customer::all()->sortBy('name');
        $services = \App\Service::all()->sortBy('name');
        return view("sell.sell")->with(compact('customers', 'services'));
    }

    public function sell_with_customer($id)
    {
        $customer = \App\Customer::findOrFail($id);
        $services = \App\Service::all()->sortBy('name');
        return view("sell.sell_with_customer")->with(compact('customer', 'services'));
    }

    public function transaction(Request $request)
    {
        $customer = $request->input("customer");
        $service = $request->input("service");
        $price = $request->input("price");
        $customer_id = $request->input("customer_id");
        $service_id = $request->input("service_id");

        $customer = \App\Customer::findOrFail($customer_id);

        $customer->services()->attach($service_id, ['price' => $price]);
        return redirect( url('customers', [$customer->id]) )->with('status', 'Продажа совершена!');
    }
    function viewTransaction()
    {
        $servicesCount = \App\Service::getTotalPrice(2);
         return view("sell.view")->with(compact('servicesCount'));
    }

    function totalServicePrice()
    {
        $priceArr = [];
        $sum = 0;
        $services = \App\Service::all()->sortBy('name');

        foreach ($services as $item)
        {
//            $priceArr = array_add(['name' => $item->name], 'price', \App\Service::getTotalPrice($item->id));
//            echo $item->name;
//            echo \App\Service::getTotalPrice($item->id);
            $priceArr[] = array($item->name => \App\Service::getTotalPrice($item->id));
            $sum += \App\Service::getTotalPrice($item->id);

        }
        return view("sell.view")->with(compact('priceArr', 'sum'));
//        return view("sell.view", ['priceArr' => $priceArr]);
    }

    function totalServicePriceByDate(Request $request)
    {
        $beginDate = $request->input("beginDate");
        $endDate = $request->input("endDate");
        $priceArr = [];
        $sum = 0;
        $services = \App\Service::all()->sortBy('name');

//        $services = DB::table('customer_service')
//            ->where('created_at','>=',$beginDate)
//            ->where('created_at','<=',$endDate)
//            ->sum('price');

        foreach ($services as $item)
        {
            $priceArr[] = array($item->name => \App\Service::getTotalPriceByDate($item->id, $beginDate, $endDate));
            $sum += \App\Service::getTotalPriceByDate($item->id, $beginDate, $endDate);
        }
        return view("sell.view")->with(compact('priceArr', 'sum', 'beginDate', 'endDate'));
    }
}
