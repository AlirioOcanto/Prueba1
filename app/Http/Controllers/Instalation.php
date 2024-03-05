<?php

namespace App\Http\Controllers;

use App\Models\Instalation as ModelsInstalation;
use App\Models\Sale;
use Illuminate\Http\Request;

class Instalation extends Controller
{
    public function create(Sale $sale)
    {
        // dd($sale);
        return view('instalation.create', ['sale' => $sale]);
    }

    public function store(Request $request, Sale $sale)
    {
        $request->validate([
            'description' => 'required'
        ]);

        $resultInstalation = ModelsInstalation::create([
            'sale_id' => $sale->id,
            'description' => $request->description
        ]);
        return redirect()->route('sales.list');
    }

    public function edit(Sale $sale)
    {
        $instalation = ModelsInstalation::where('sale_id', $sale->id)->first();
        return view('instalation.edit', ['sale' => $sale, 'instalation' => $instalation]);
    }

    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'description' => 'required'
        ]);

        $instalation = ModelsInstalation::where('sale_id', $sale->id)->first();
        $instalation->description = $request->description;
        $instalation->save();
        return redirect()->route('sales.list');
    }

    public function destroy(Sale $sale)
    {
        $instalation = ModelsInstalation::where('sale_id', $sale->id)->first();
        $instalation->delete();
        return redirect()->route('sales.list');
    }


}
