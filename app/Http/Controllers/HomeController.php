<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = DB::table('customers')->count();
        $services = DB::table('services')->count();
        $made_services = DB::table('customer_service')->count();

        $sum = DB::table('customer_service')->sum('price');
        $count = DB::table('customer_service')->count();

        $last_arr = [];
        $last_arr_item = [];
        $last = DB::table('customer_service')->latest()->take(5)->get();
        foreach ($last as $item)
        {
            $customer = DB::table('customers')->where('id', $item->customer_id)->first();
            array_push($last_arr_item, $customer->name.' '.((isset($customer->surname))?$customer->surname:''));
            $service = DB::table('services')->where('id', $item->service_id)->first();
            array_push($last_arr_item, $service->name);
            array_push($last_arr_item, $item->price);
            array_push($last_arr, $last_arr_item);
            $last_arr_item = [];
        }

        $average = intval($sum / $count);
        return view('home')->with(compact('customers', 'services', 'made_services', 'average', 'last_arr'));
    }
}
