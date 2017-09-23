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

        $average = intval($sum / $count);
        return view('home')->with(compact('customers', 'services', 'made_services', 'average'));
    }
}
