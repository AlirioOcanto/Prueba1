<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\BrandLightController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\HydrographyController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Instalation;
use App\Http\Controllers\LightController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ReunionController;
use App\Http\Controllers\SaleController;
use App\Models\Calendar;
use App\Models\Reunion;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('/dashboard', [SaleController::class, "index"])->name('dashboard');
    Route::get('/ventas',[SaleController::class, "index"])->name('sales.index');
    Route::get('/ventas/lista', [SaleController::class, "list"])->name('sales.list');
    Route::get('/ventas/create',[SaleController::class, "create"])->name('sales.create');
    Route::post('/ventas',[SaleController::class, "store"])->name('sales.store');
    Route::get('/ventas/{sale}',[SaleController::class, "show"])->name('sales.show');
    // Route::get('/ventas/{sale}',[SaleController::class, "show"])->name('sales.show');
    Route::get('/ventas/{sale}/edit',[SaleController::class, "edit"])->name('sales.edit');
    Route::put('/ventas/{sale}',[SaleController::class, "update"])->name('sales.update');
    Route::get('/ventas/destroy/{sale}',[SaleController::class, "destroy"])->name('sales.destroy');
    Route::post('/ventas/search',[SaleController::class, "search"])->name('sales.search');
    Route::get('/ventas/instalation/{sale}',[Instalation::class, "create"])->name('sales.instalation');
    Route::post('/ventas/instalation/{sale}',[Instalation::class, "store"])->name('sales.instalation.store');
    // put instalation
    Route::get('/ventas/instalation/{sale}/edit',[Instalation::class, "edit"])->name('sales.instalation.edit');
    Route::put('/ventas/instalation/{sale}',[Instalation::class, "update"])->name('sales.instalation.update');
    // delete instalation
    Route::delete('/ventas/instalation/{sale}',[Instalation::class, "destroy"])->name('sales.instalation.destroy');

    Route::get('/marcas', [BrandController::class, "index"])->name('brands.index');
    Route::get('/marcas/create', [BrandController::class, "create"])->name('brands.create');
    Route::post('/marcas', [BrandController::class, "store"])->name('brands.store');
    Route::get('/marcas/{brand}/edit', [BrandController::class, "edit"])->name('brands.edit');
    Route::put('/marcas/{brand}', [BrandController::class, "update"])->name('brands.update');
    Route::get('/marcas/destroy/{brand}', [BrandController::class, "destroy"])->name('brands.destroy');
    Route::get('/images/product/{sale}', [ImageController::class, "images"])->name('sales.images');
    Route::post('/images/product/{sale}', [ImageController::class, "upload"])->name('sales.images.upload');
    Route::delete('/images/product/{sale}/{image}', [ImageController::class, "destroy"])->name('sales.images.destroy');
    Route::get('/ligtning/create', [LightController::class, "create"])->name('lightning.create');
    Route::post('/ligtning', [LightController::class, "store"])->name('lightning.store');
    Route::get('/ligtning/lista', [LightController::class, "list"])->name('lightning.list');
    Route::get('/ligtning/{light}', [LightController::class, "show"])->name('lightning.show');
    Route::get('/ligtning/{light}/edit', [LightController::class, "edit"])->name('lightning.edit');
    Route::put('/ligtning/{light}', [LightController::class, "update"])->name('lightning.update');
    Route::get('/ligtning/destroy/{light}', [LightController::class, "destroy"])->name('lightning.destroy');
    Route::get('/ligtning/{light}/images', [PhotoController::class, "images"])->name('lightning.images');
    Route::post('/ligtning/{light}/images', [PhotoController::class, "upload"])->name('lightning.images.upload');
    Route::post('/lightning/search',[LightController::class, "search"])->name('lightning.search');
    Route::get('/lightning/instalation/{illumination}',[DetailsController::class, "create"])->name('lightning.instalation');
    Route::post('/lightning/instalation/{illumination}',[DetailsController::class, "store"])->name('lightning.instalation.store');
    // put instalation
    Route::get('/lightning/instalation/{illumination}/edit',[DetailsController::class, "edit"])->name('lightning.instalation.edit');
    Route::put('/lightning/instalation/{illumination}',[DetailsController::class, "update"])->name('lightning.instalation.update');
    // delete instalation
    Route::delete('/lightning/instalation/{illumination}',[DetailsController::class, "destroy"])->name('lightning.instalation.destroy');

    // delete
    Route::delete('/ligtning/{light}/images/{photo}', [PhotoController::class, "destroy"])->name('lightning.images.destroy');
    Route::get('/light/create', [BrandLightController::class, "create"])->name('lightBrand.create');
    Route::post('/light', [BrandLightController::class, "store"])->name('lightBrand.store');
    Route::get('/light/lista', [BrandLightController::class, "index"])->name('lightBrand.list');
    Route::get('/light/{light}', [BrandLightController::class, "show"])->name('lightBrand.show');
    Route::get('/light/{light}/edit', [BrandLightController::class, "edit"])->name('lightBrand.edit');
    Route::put('/light/{light}', [BrandLightController::class, "update"])->name('lightBrand.update');
    Route::get('/light/destroy/{light}', [BrandLightController::class, "destroy"])->name('lightBrand.destroy');

    Route::get('/hydrography/create', [HydrographyController::class, "create"])->name('hydrography.create');
    Route::post('/hydrography', [HydrographyController::class, "store"])->name('hydrography.store');
    Route::get('/hydrography/lista', [HydrographyController::class, "index"])->name('hydrography.list');
    Route::get('/hydrography/{hydrography}', [HydrographyController::class, "show"])->name('hydrography.show');
    Route::get('/hydrography/{hydrography}/edit', [HydrographyController::class, "edit"])->name('hydrography.edit');
    Route::put('/hydrography/{hydrography}', [HydrographyController::class, "update"])->name('hydrography.update');
    Route::delete('/hydrography/{hydrography}', [HydrographyController::class, "destroy"])->name('hydrography.destroy');
    // Route::get('/hydrography/destroy/{hydrography}', [HydrographyController::class, "destroy"])->name('hydrography.destroy');

    Route::get('/calendar', [CalendarController::class, "index"])->name('calendar.index');
    Route::get('/calendar/create/screens', [CalendarController::class, "createScreens"])->name('calendar.screens.create');
    Route::post('/calendar/create/screens', [CalendarController::class, "storeScreens"])->name('calendar.screens.store');
    Route::get('/calendar/illuminations/create', [CalendarController::class, "createIlluminations"])->name('calendar.illuminations.create');
    Route::post('/calendar/illuminations', [CalendarController::class, "storeIlluminations"])->name('calendar.illuminations.store');
    Route::get('/calendar/hidrografia/create', [CalendarController::class, "createHydrography"])->name('calendar.hidrografia.create');
    Route::post('/calendar/hidrografia', [CalendarController::class, "storeHydrography"])->name('calendar.hidrografia.store');
    Route::get('/calendar/screens/list', [CalendarController::class, "listScreens"])->name('calendar.screens.list');
    Route::get('/date/illumination/list', [DateController::class, "listDate"])->name('date.illumination.list');
    Route::put('/date/illumination/{date}', [DateController::class, "update"])->name('date.illumination.update');
    Route::delete('/date/illumination/{date}', [DateController::class, "destroy"])->name('date.illumination.destroy');
    // search date by query
    Route::get('/date/illumination/search', [DateController::class, "search"])->name('date.illumination.search');
    Route::get('/calendar/screens/search', [CalendarController::class, "search"])->name('calendar.screens.search');

    Route::get('/date/illuminations/show/{date}', [DateController::class, "showIlluminations"])->name('date.illuminations.show');
    Route::get('/date/illuminations/edit/{date}', [DateController::class, "editIlluminations"])->name('date.illuminations.edit');
    Route::get('/calendar/show/{calendar}', [CalendarController::class, "showScreens"])->name('calendar.screens.show');
    Route::get('/calendar/screens/edit/{calendar}', [CalendarController::class, "editScreens"])->name('calendar.screens.edit');

    Route::post('/hidrografias/reunion', [ReunionController::class, "storeReunion"])->name('hydrography.reunion.store');
    Route::get('/hidrografias/reunion/list', [ReunionController::class, "listReunion"])->name('hydrography.reunion.list');

    Route::get('/hidrografias/public', [HydrographyController::class, "watchHidrografias"])->name('hydrography.public');


});
