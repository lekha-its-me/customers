<?php

namespace App\Http\Controllers;

use App\Material;
use Illuminate\Http\Request;

use App\Http\Requests;

class MaterialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAllMaterials()
    {
        $materials = \App\Material::all()->sortBy('name');
        return view("materials.index")->with(compact('materials'));
    }

    public function createMaterial()
    {
        return view('materials.add');
    }

    public function addMaterial(Request $request)
    {
        $title = $request->input("title");

        $material = new Material;
        $material->title = $title;
        $material->save();

        return redirect('materials')->with('status', 'Успешно добавлено!');
    }

    public function viewMaterial($id)
    {
        $material = \App\Material::findOrFail($id);
        return view('materials.edit')->with(compact('material'));
    }

    public function editMaterial(Request $request)
    {
        $title = $request->input("title");
        $id = $request->input("id");
        $material = \App\Material::findOrFail($id);

        $material->title = $title;
        $material->save();

        return redirect('materials')->with('status', 'Успешно изменено');

    }
}