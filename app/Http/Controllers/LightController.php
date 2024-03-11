<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Illumination;
use App\Models\Light;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LightController extends Controller
{
    public function create()
    {
        $brandsAuto = Brand::all();
        // dd($brandsAuto);
        $brands = Light::all();
        return view('lightnings.create', [
            'brandsAuto' => $brandsAuto,
            'brands' => $brands,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'light_id' => 'required',
            'model' => 'required',
            'model_year' => 'required',
            'version' => 'required',
            'price' => 'required',
            'brand_id' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        // dd($request->all()  );
        // save image in the storage
        $path = $request->file('image')->store('public/products');

        $light = Illumination::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'light_id' => $request->light_id,
            'model' => $request->model,
            'model_year' => $request->model_year,
            'version' => $request->version,
            'brand' => $request->brand,
            'brand_id' => $request->brand_id,
            'image' => $path,
            'productor_name' => $request->productor_name,
            'productor_phone' => $request->productor_phone,
            'productor_email' => $request->productor_email,
            'productor_website' => $request->productor_website,
        ]);
        // dd($light);

        return redirect()->route('lightning.list');
    }

    public function search(Request $request)
    {
        // $search = $request->get('search');
        $brand = $request->get('brand');
        $model = $request->get('model');
        // dd($brand, $model);

        if($brand && $model) {
            $lights = Illumination::where('light_id', $brand)
                ->where('model', $model)
                ->paginate(5);
        } else if($brand) {
            $lights = Illumination::where('light_id', $brand)->paginate(5);
            // $lights = Illumination::where('name', 'like', '%'.$search.'%')->paginate(5);

        }else {
            $lights = Illumination::where('model', $model)->paginate(5);
            // $lights = Illumination::where('name', 'like', '%'.$search.'%')->paginate(5);
        }

        $light_brands = Light::all();
        return view('lightnings.list', [
            'lights' => $lights,
            'light_brands' => $light_brands,
        ]);


    }

    public function show(Illumination $light)
    {
        return view('lightnings.show', [
            'light' => $light,
        ]);
    }

    public function list()
    {
        $lights = Illumination::paginate(5);
        $light_brands = Light::all();
        // dd($lights);
        return view('lightnings.list', [
            'lights' => $lights,
            'light_brands' => $light_brands,
        ]);
    }

    public function images(Light $light)
    {
        dd("jeje");
        return view('lightnings.imageupload', [
            'light' => $light,
        ]);
    }

    public function edit(Illumination $light)
    {
        $brandsAuto = Brand::all();
        $brands = Light::all();
        return view('lightnings.edit', [
            'light' => $light,
            'brandsAuto' => $brandsAuto,
            'brands' => $brands,
        ]);
    }

    // update
    public function update(Request $request, Illumination $light)
    {
        $request->validate([
            'name' => 'required',
            'light_id' => 'required',
            'model' => 'required',
            'model_year' => 'required',
            'version' => 'required',
            'price' => 'required',
            'brand_id' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        // if the image is updated
        if ($request->hasFile('image')) {
            // save image in the storage
            $path = $request->file('image')->store('public/products');
            // delete the old image
            Storage::delete($light->image);
            $light->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'light_id' => $request->light_id,
                'model' => $request->model,
                'model_year' => $request->model_year,
                'version' => $request->version,
                'brand' => $request->brand,
                'brand_id' => $request->brand_id,
                'image' => $path,
            ]);
        } else {
            $light->update($request->all());
        }
        return redirect()->route('lightning.list');
    }

    // delete
    public function destroy(Light $light)
    {
        $light->delete();
        return redirect()->route('lightning.list');
    }
}
