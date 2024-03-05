<?php

namespace App\Http\Controllers;

use App\Models\Light;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BrandLightController extends Controller
{

    public function index()
    {
        $brands = Light::paginate(10);
        return view('brandslight.index')->with('brands', $brands);
    }

    public function create(){
        return view('brandslight.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
        $brand = new Light();
        $brand->name = $request->name;
        // $brand->description = $request->description;
        $brand->save();

        // return flash message
        Session::flash('success', 'La marca se ha creado correctamente');


        return redirect()->back();
    }

    public function edit(Light $light){
        // dd($brand);
        return view('brandslight.edit')->with('brand', $light);
    }


    public function update(Request $request, Light $light){
        // dd($light);
        $request->validate([
            'name' => 'required',
        ]);
        $light->name = $request->name;
        // $brand->description = $request->description;
        $light->save();
        // return flash message
        Session::flash('success', 'La marca se ha actualizado correctamente');
        return redirect()->route('lightBrand.list');
    }

    public function destroy(Light $light){
        $light->delete();
        // return flash message
        Session::flash('success', 'La marca se ha eliminado correctamente');
        return redirect()->route('lightBrand.list');
    }



}
