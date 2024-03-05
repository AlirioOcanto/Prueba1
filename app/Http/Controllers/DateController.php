<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\Illumination;
use Illuminate\Http\Request;

class DateController extends Controller
{

    public function listDate() {
        $users = Date::all();
        return view('calendar.date-list', [
            'users' => $users
        ]);
    }

    public function showIlluminations(Date $date) {
        return view('dates.show', [
            'calendar' => $date
        ]);
    }

    public function editIlluminations(Date $date) {
        $products = Illumination::all();


        return view('dates.edit', [
            'calendar' => $date,
            'products' => $products
        ]);
    }

    public function update(Request $request, Date $date) {
        $data = request()->all();
        $date->update($data);
        session()->flash('success', 'Información actualizada correctamente');
        return redirect()->route('calendar.index');
    }

    public function destroy(Date $date) {
        $date->delete();
        session()->flash('success', 'Información eliminada correctamente');
        return redirect()->route('calendar.index');
    }


    public function search(Request $request) {
        $search = $request->all();
        $title = $search['title'];
        $type = $search['type'];
        $users = null;
        // aplica un if si type es igual a "all", sino aplica un if else si type es igual a "pending" y sino aplica un else si type es igual a "completed"
        if ($type == 'all') {
            $users = Date::all();
        } else if ($type == 'pending') {
            $users = Date::where('status', 'like', '%' . $type . '%')->get();
        } else if($type == 'completed') {
            $users = Date::where('status', 'like', '%' . $type . '%')->get();
        }else {
            $users = Date::where('status', 'like', '%' . $type . '%')->get();
        }

        return view('calendar.date-list', [
            'users' => $users,
            'title' => $title,
        ]);
    }

}

