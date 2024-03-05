<?php

namespace App\Http\Controllers;

use App\Models\Hydrography;
use App\Models\Reunion;
use Illuminate\Http\Request;

class ReunionController extends Controller
{
    public function storeReunion(Request $request) {

        $request->validate([
            'title' => 'required',
            'user_name' => 'required',
            'user_phone' => 'required',
            'user_email' => 'required',
            'day' => 'required',
            'user_address' => 'required',
            'description' => 'required',
            'status' => 'required',
            'billing' => 'required',
        ]);

        $data = request()->all();

        $data['day'] = date('Y-m-d', strtotime($data['day']));


        $reunion = new Reunion();
        $reunion->title = $request->title;
        $reunion->user_name = $request->user_name;
        $reunion->user_phone = $request->user_phone;
        $reunion->day = $data['day'];
        $reunion->user_email = $request->user_email;
        $reunion->user_address = $request->user_address;
        $reunion->description = $request->description;
        $reunion->status = $request->status;
        $reunion->billing = $request->billing;
        $reunion->hydrographies_id = $request->hydrographies_id;
        $reunion->save();

        return redirect()->route('hydrography.list');
    }
}
