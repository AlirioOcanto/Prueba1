<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SaleController extends Controller
{
    public function index()
    {
        return view('sales.menu');
    }

    public function list()
    {
        // get all sale by order by desc and paginate the results
        $sales = Sale::orderBy('id', 'desc')->paginate(5);

        // $sales = Sale::paginate(5);
        $brands = Brand::all();

        return view('sales.index', ['sales' => $sales, 'brands' => $brands]);
    }

    public function show(Sale $sale)
    {
        return view('sales.show')->with('sale', $sale);
    }

    public function create()
    {

        $brands = Brand::all();
        return view('sales.create', ['brands' => $brands]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required',
            'model' => 'required',
            'model_year' => 'required',
            'version' => 'required',
            'image' => 'required',
        ]);
        $path = $request->file('image')->store('public/products');


        Sale::create([
            'brand_id' => $request->brand_id,
            'model' => $request->model,
            'model_year' => $request->model_year,
            'version' => $request->version,
            'price' => $request->price,
            'type' => $request->type,
            'description' => $request->description,
            'image' => $path
        ]);

        return redirect()->route('sales.index');
    }

    public function edit(Sale $sale)
    {
        $brands = Brand::all();
        return view('sales.edit',
            ['sale' => $sale, 'brands' => $brands]
        );
    }

    public function update(Request $request, Sale $sale)
    {
        // dd("update");
        $request->validate([
            'brand_id' => 'required',
            'model' => 'required',
            'model_year' => 'required',
            'version' => 'required'
        ]);
        // delete old image
        // if ($request->hasFile('image')) {
        //     Storage::delete($sale->image);
        // }

        if ($request->hasFile('image')) {
            Storage::delete($sale->image);
            $image = $request->file('image')->store('public/products');
            $sale->image = $image;
        }

        // $sale->update($request->all());
        $sale->brand_id = $request->brand_id;
        $sale->model = $request->model;
        $sale->model_year = $request->model_year;
        $sale->version = $request->version;
        $sale->price = $request->price;
        $sale->type = $request->type;
        $sale->description = $request->description;
        $sale->save();


        return redirect()->route('sales.index');
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();

        return redirect()->route('sales.list');
    }

    public function search(Request $request)
    {
        $search = $request->all();
        $brand = $request->brand;
        $model = $request->model;
        $sales = null;

        // apply the search in the database to Sale table with the model and brand fields and paginate the results
        if ($brand != null) {
            $sales = Sale::where('model', 'like', '%' . $model . '%')->where('brand_id', $brand)->paginate(5);
        } else {
            $sales = Sale::where('model', 'like', '%' . $model . '%')->paginate(5);
        }


        $brands = Brand::all();

        return view('sales.index', ['sales' => $sales, 'brands' => $brands]);
    }

}
