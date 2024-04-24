<?php

use App\Http\Controllers\PropertyController;
use App\Livewire\CreatePropertyForm;
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
    Route::get('/dashboard', function () {
        $cities = \App\Models\Location::all();
        $topProperties = \App\Models\Property::with('location')->take(5)->get();
        return view('homeview' ,[
            'cities' => $cities,
            'topProperties' =>  $topProperties
        ]);
    })->name('dashboard');

    Route::get('/searchResult', function () {
        return view('FilterAndSearchResult.index');
    })->name('search.index');

    Route::get('/explore',[PropertyController::class,'index'])->name('property.index');
    Route::get('/explore/{property}',[PropertyController::class,'show'])->name('property.show');

    Route::get('/property/create', CreatePropertyForm::class)
        ->name('property.create');


    Route::get('/checkout',function (){
        return view('checkout');
    });

});
