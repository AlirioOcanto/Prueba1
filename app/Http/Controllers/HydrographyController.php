<?php

namespace App\Http\Controllers;

use App\Models\Hydrography;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class HydrographyController extends Controller
{
    public function index(){
        $hidrographies = Hydrography::all();
        // dd($hidrographies);
        return view('hydrography.index')->with('hidrographies', $hidrographies);
    }

    public function create(){
        return view('hydrography.create');
    }

    public function store(Request $request){
        $request->validate([
            'image' => 'required',
            'type' => 'required'
        ]);
        $image = $request->file('image')->store('public/hydrographies');
        $hydrography = Hydrography::create([
            'image' => $image,
            'type' => $request->type
        ]);
        // send flash message
        Session::flash('success', 'La hidrografía se ha creado correctamente');
        // dd("Hidrografía creada");
        // $hidrographies = Hydrography::paginate(10);
        // return view('hydrography.index')->with('hidrographies', $hidrographies);
        return redirect()->route('hydrography.list');
    }

    public function show(Hydrography $hydrography){
        // $hydrography = Hydrography::find($id);
        return view('hydrography.show')->with('hydrography', $hydrography);
    }

    public function edit(Hydrography $hydrography){
        return view('hydrography.edit')->with('hydrography', $hydrography);
    }

    public function update(Request $request, Hydrography $hydrography){
        $request->validate([
            'type' => 'required',
            'image' => 'required'
        ]);
        if($request->hasFile('image')){
            Storage::delete($hydrography->image);
            $image = $request->file('image')->store('public/hydrographies');
            $hydrography->image = $image;
        }
        $hydrography->type = $request->type;
        $hydrography->save();
        // delete old image
        Session::flash('success', 'La hidrografía se ha actualizado correctamente');
        return redirect()->route('hydrography.list');
    }



    public function images(Request $request) {
        dd("images");
        $hidrographies = Hydrography::all();
        return view('hydrography.images')->with('hidrographies', $hidrographies);
    }


    public function destroy(Hydrography $hydrography){
        // dd($hydrography);
        Storage::delete($hydrography->image);
        $hydrography->delete();
        // dd("Hidrografía eliminada");
        Session::flash('success', 'La hidrografía se ha eliminado correctamente');
        return redirect()->back();
    }


    public function watchHidrografias(){
        $hidrographies = Hydrography::all();
        return view('hydrography.public')->with('hidrographies', $hidrographies);
    }


}
