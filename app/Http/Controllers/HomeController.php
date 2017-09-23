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

        $sum = 0;
        $count = 0;
        $average = 0;
        $serv = \App\Service::all()->sortBy('name');

        foreach ($serv as $item)
        {
            $sum += \App\Service::getTotalPrice($item->id);
            $count++;
        }
        $average = $sum / $count;
        return view('home')->with(compact('customers', 'services', 'made_services', 'average'));
    }
}
