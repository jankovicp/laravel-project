<?php

use App\Http\Controllers\Admin\AccommodationController;
use App\Http\Controllers\User\BookedAccommodationController;
use App\Models\Accommodation;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AccommodationController::class, 'welcome']);

Route::get('/test', [AccommodationController::class, 'test']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Route::resource('accommodations' , BookedAccommodationController::class)->middleware('admin');
Route::group([
    'prefix' => 'admin',
    'middleware' => 'admin',
], function(){
  Route::resource('accommodations' , AccommodationController::class);

});

Route::group([
    'prefix' => 'user',
    'middleware' => 'user',
], function(){
  Route::get('/bookedaccommodations', [BookedAccommodationController::class, 'index'])->name('bookedaccommodations.index');
   Route::get('/bookedaccommodations/{accommodation}/create', [BookedAccommodationController::class, 'create'])->name('bookedaccommodations.create');
   Route::post('/bookedaccommodations/{accommodation}', [BookedAccommodationController::class, 'store'])->name('bookedaccommodations.store');


});

require __DIR__.'/auth.php';


