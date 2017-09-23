<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Response;

use App\Customer;
use App\Service;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAllServices() {
        $services = \App\Service::all()->sortBy('name')/*paginate(5)*/;

        return view('services.services')->with(compact('services'));
    }

    public function createService() {
        return view('services.create');
    }

    function addService(Request $request)
    {
        $name = $request->input("name");
        $basic_price = $request->input("basic_price");

        $service = new Service;
        $service->name = $name;
        $service->basic_price = $basic_price;
        $service->save();

        //return redirect()->route("peoples.list")->with('status', 'Успешно добавлено!');
        return redirect('services')->with('status', 'Успешно добавлено!');
    }

    public function view2edit($id) {
        $service = \App\Service::findOrFail($id);
        return view("services.edit")->with(compact('service'));
    }

    public function editService(Request $request) {
        $name = $request->input("name");
        $basic_price = $request->input("basic_price");
        $id = $request->input("id");

        $service = \App\Service::findOrFail($id);

        $service->name = $name;
        $service->basic_price = $basic_price;
        $service->save();

        //return redirect()->route("peoples.list");
        return redirect('services')->with('status', 'Изменения сохранены');
    }

    public function viewService($id) {
        $service = \App\Service::findOrFail($id);
        return view("services.view")->with(compact('service', 'services', 'listOfService'));
    }

    public function deleteService($id)
    {
        $service = \App\Service::findOrFail($id);
        $service->delete();
        return redirect("services")->with('status', 'Запись удалена');
    }

    public function removeService($id)
    {
        $service = \App\Service::findOrFail($id);
        return view("services.delete")->with(compact('service'));
    }

    public function getServicePrice($id)
    {
        $service = \App\Service::findOrFail($id);
        if($service)
        {
            return response()->json([
                'price' => $service->basic_price,
            ]);
        }

    }
}
