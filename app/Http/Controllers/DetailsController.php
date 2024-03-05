<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Illumination;
use Illuminate\Http\Request;

class DetailsController extends Controller
{

    public function create(Illumination $illumination)
    {
        // dd($illumination);
        return view('details.create', ['illumination' => $illumination]);
    }

    public function store(Illumination $illumination, Request $request)
    {
        // dd($illumination->id);
        $request->validate([
            'description' => 'required',
            // 'illumination_id' => 'required',
        ]);

        $detail = Detail::create([
            'description' => $request->description,
            'illumination_id' => $illumination->id,
        ]);

        // dd($detail);

        return redirect()->route('lightning.list');
    }

    public function edit(Illumination $illumination)
    {
        return view('details.edit', ['illumination' => $illumination]);
    }

    public function update(Illumination $illumination, Request $request)
    {
        $request->validate([
            'description' => 'required',
        ]);

        $illumination->detail->update([
            'description' => $request->description,
        ]);

        return redirect()->route('lightning.list');
    }

    public function destroy(Detail $detail)
    {
        $detail->delete();
        return redirect()->route('lightning.list');
    }


}
