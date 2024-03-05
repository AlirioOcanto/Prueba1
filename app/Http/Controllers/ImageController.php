<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function images(Sale $sale)
    {
        // dd($sale);
        return view('images.index', compact('sale'));
    }

    public function upload(Request $request, Sale $sale)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // save image in storage
        $path = $request->file('image')->store('public/products');

        // save image in database Image
        $sale->images()->create([
            'path' => $path,
            'sale_id' => $sale->id,
        ]);
        // dd("Image uploaded successfully!");
        return back();
    }

    public function destroy(Sale $sale, $image)
    {
        // dd($sale, $image);
        $image = $sale->images()->find($image);
        // dd($image);
        $image->delete();
        // delete image from storage /products

        Storage::delete($image->path);
        return back();
    }

}
