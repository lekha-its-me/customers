<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;

use App\Http\Requests;

use App\Customer;
use App\Service;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAllCustomers() {
        $customers = \App\Customer::paginate(5);

        return view('customers.customers')->with(compact('customers'));
    }

    public function createCustomer() {
        return view('customers.create');
    }

    function addCustomer(Request $request)
    {
        $name = $request->input("name");
        $surname = $request->input("surname");
        $phone = $request->input("phone");
        $birthday = $request->input("birthday");
        $comment = $request->input("comment");


        $customer = new Customer;
        $customer->name = $name;
        $customer->surname = $surname;
        $customer->phone = $phone;
        $customer->birthday = $birthday;
        $customer->comment = $comment;
        $customer->save();

        //return redirect()->route("peoples.list")->with('status', 'Успешно добавлено!');
        return redirect('customers')->with('status', 'Успешно добавлено!');
    }

    public function view2edit($id) {
        $customer = \App\Customer::findOrFail($id);
        return view("customers.edit")->with(compact('customer'));
    }

    public function editCustomer(Request $request) {
        $name = $request->input("name");
        $surname = $request->input("surname");
        $phone = $request->input("phone");
        $birthday = $request->input("birthday");
        $comment = $request->input("comment");
        $id = $request->input("id");

        $customer = \App\Customer::findOrFail($id);

        $customer->name = $name;
        $customer->surname = $surname;
        $customer->phone = $phone;
        $customer->birthday = $birthday;
        $customer->comment = $comment;
        $customer->save();

        //return redirect()->route("peoples.list");
        return redirect('customers')->with('status', 'Изменения сохранены');
    }

    public function viewCustomer($id) {
        $customer = \App\Customer::findOrFail($id);
        $listOfService = \App\Service::all();
        $services = $customer->services->sortByDesc('created_at');

        $totalPrice = DB::table('customer_service')
            ->where('customer_id', $id)
            ->sum('price');

        return view("customers.view")->with(compact('customer', 'services', 'listOfService', 'totalPrice'));
    }

    public function deleteCustomer($id)
    {
        $customer = \App\Customer::findOrFail($id);
        $customer->delete();
        return redirect("customers")->with('status', 'Запись удалена');
    }

    public function removeCustomer($id)
    {
        $customer = \App\Customer::findOrFail($id);
        return view("customers.delete")->with(compact('customer'));
    }
}
