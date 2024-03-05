<?php

namespace App\Http\Controllers;

use App\Models\Illumination;
use App\Models\Light;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function images(Illumination $light)
    {
        // dd($sale);
        return view('lightnings.imageupload', compact('light'));
    }

    public function upload(Request $request, Light $light)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // save image in storage
        $path = $request->file('image')->store('public/products');

        // save image in database Image
        $photo = Photo::create([
            "path" => $path,
            "illumination_id" => $light->id
        ]);

        return back();
    }

    public function destroy(Light $light, Photo $photo)
    {
        // delete image from storage
        $photo->delete();
        // delete image from database
        Storage::delete($photo->path);
        return back();
    }


}
