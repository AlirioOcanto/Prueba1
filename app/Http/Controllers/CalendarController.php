<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Calendar;
use App\Models\Date;
use App\Models\Hydrography;
use App\Models\Illumination;
use App\Models\Light;
use App\Models\Reunion;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;






class CalendarController extends Controller
{
    public function index() {

        $firstDayOfMonth = Carbon::now()->startOfMonth();
        $lastDayOfMonth = Carbon::now()->endOfMonth();


        $total_pending_calendar = Calendar::where('status', 'pending')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count();
        $total_pending_date = Date::where('status', 'pending')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count();
        $total_pending_reunion = Reunion::where('status', 'pending')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count();
        $total_pending = $total_pending_calendar + $total_pending_date + $total_pending_reunion;

        $total_completed_calendar = Calendar::where('status', 'completed')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count();
        $total_completed_date = Date::where('status', 'completed')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count();
        $total_completed_reunion = Reunion::where('status', 'completed')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count();
        $total_completed = $total_completed_calendar + $total_completed_date + $total_completed_reunion;

        $total_rehused_calendar = Calendar::where('status', 'rehused')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count();
        $total_rehused_date = Date::where('status', 'rehused')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count();
        $total_rehused_reunion = Reunion::where('status', 'rehused')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count();
        $total_rehused = $total_rehused_calendar + $total_rehused_date + $total_rehused_reunion;

        // solo suma los valores de las instancias donde el status sea "completed" y suma su billing
        $total_billing_calendar = Calendar::where('status', 'completed')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->sum('billing');
        $total_billing_date = Date::where('status', 'completed')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->sum('billing');
        $total_billing_reunion = Reunion::where('status', 'completed')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->sum('billing');
        $total_billing = $total_billing_calendar + $total_billing_date + $total_billing_reunion;

        return view('calendar.index', [
            'total_pending' => $total_pending,
            'total_completed' => $total_completed,
            'total_rehused' => $total_rehused,
            'total_billing' => $total_billing,
            'firstDayOfMonth' => $firstDayOfMonth,
            'lastDayOfMonth' => $lastDayOfMonth
        ]);
    }

        public function createScreens() {
        $products = Sale::all();
        // dd($products);

        return view('calendar.create-pantalla', [
            'products' => $products
        ]);
    }


    public function storeScreens(Request $request) {
        // dd($request->all());
        $data = request()->all();
        // dd($data);
        $data['day'] = date('Y-m-d', strtotime($data['day']));
        // dd($data);
        $illumination = Calendar::create($data);
        // dd($illumination);
        // send flash message to the view
        session()->flash('success', 'Información guardada correctamente');
        return redirect()->route('calendar.index');
    }

    public function createIlluminations() {
        $products = Illumination::all();
        // dd($products);

        return view('calendar.create-iluminacion', [
            'products' => $products
        ]);
    }


    public function storeIlluminations(Request $request) {
        // dd($request->all());
        $data = request()->all();
        // dd($data);
        $data['day'] = date('Y-m-d', strtotime($data['day']));
        // dd($data);
        $illumination = Date::create($data);
        // dd($illumination);
        // send flash message to the view
        session()->flash('success', 'Información guardada correctamente');
        return redirect()->route('calendar.index');
    }

    public function createHydrography() {
        $products = Hydrography::all();
        // dd($products);

        return view('calendar.create-hidrografia', [
            'products' => $products
        ]);
    }

    public function storeHydrography(Request $request) {
        // dd($request->all());
        $data = request()->all();
        // dd($data);
        $data['day'] = date('Y-m-d', strtotime($data['day']));
        // dd($data);
        $illumination = Reunion::create($data);
        // dd($illumination);
        // send flash message to the view
        session()->flash('success', 'Información guardada correctamente');
        return redirect()->route('calendar.index');
    }

    public function listScreens() {
        $users = Calendar::paginate(15);
        // dd($products);
        // dd($users);
        return view('calendar.list-screens', [
            'users' => $users
        ]);
    }


    public function showScreens(Calendar $calendar) {
        // dd($calendar);
        return view('calendar.show-screens', [
            'calendar' => $calendar
        ]);
    }


    public function editScreens(Calendar $calendar) {
        // dd($calendar);
        $products = Sale::all();

        return view('calendar.calendar-edit', [
            'calendar' => $calendar,
            'products' => $products
        ]);
    }


      public function search(Request $request) {
        $search = $request->all();
        $title = $search['title'];
        $type = $search['type'];
        $users = null;
        // aplica un if si type es igual a "all", sino aplica un if else si type es igual a "pending" y sino aplica un else si type es igual a "completed"
        if ($type == 'all') {
            $users = Calendar::all();
        } else if ($type == 'pending') {
            $users = Calendar::where('status', 'like', '%' . $type . '%')->get();
        } else if($type == 'completed') {
            $users = Calendar::where('status', 'like', '%' . $type . '%')->get();
        }else {
            $users = Calendar::where('status', 'like', '%' . $type . '%')->get();
        }

        // dd($users);

        return view('calendar.list-screens', [
            'users' => $users,
            // 'title' => $title,
        ]);
    }

    public function update(Calendar $calendar, Request $request) {
        // dd($calendar);
        $data = request()->all();
        // dd($data);
        $calendar->update($data);
        // send flash message to the view
        session()->flash('success', 'Información actualizada correctamente');
        return redirect()->route('calendar.index');
    }


    public function listHydrography() {
        $users = Reunion::paginate(15);
        // dd($products);
        // dd($users);
        return view('calendar.hidrografia-calendar-list', [
            'users' => $users
        ]);
    }

    public function editHydrography(Reunion $calendar) {
        // dd($calendar);
        $products = Hydrography::all();

        return view('calendar.hidrografia-calendar-edit', [
            'reunion' => $calendar,
            'products' => $products
        ]);
    }

    public function updateHydrography(Reunion $calendar, Request $request) {
        // dd($calendar);
        $data = request()->all();
        // dd($data);
        $calendar->update($data);
        // send flash message to the view
        session()->flash('success', 'Información actualizada correctamente');
        return redirect()->route('calendar.hidrografia.list');
    }


    public function destroyHydrography(Reunion $calendar) {
        // dd($calendar);
        $calendar->delete();
        // send flash message to the view
        session()->flash('success', 'Información eliminada correctamente');
        return redirect()->route('calendar.hidrografia.list');
    }
}


