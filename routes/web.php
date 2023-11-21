<?php

use App\Http\Controllers\ProfileController;
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

//  Route::get('/', function () {
//      return view('welcome');
//  });

Route::get('/', 'App\Http\Controllers\LeagueController@show');
Route::get('news', 'App\Http\Controllers\NewsController@ShowNews');
Route::get('news/{id}', 'App\Http\Controllers\NewsController@ShowNew');
Route::delete('news/{id}','App\Http\Controllers\NewsController@destroy')->name('news.destroy');
Route::put('AddNew/{id}','App\Http\Controllers\NewsController@update')->name('news.update');
Route::get('AddNew/{id}', 'App\Http\Controllers\NewsController@edit');
Route::get('AddNew', 'App\Http\Controllers\NewsController@create');
Route::post('AddNew', 'App\Http\Controllers\NewsController@store');
Route::get('calendary', 'App\Http\Controllers\CalendaryController@calendaryShow');
Route::delete('calendary/{id}','App\Http\Controllers\CalendaryController@destroyMatch')->name('match.destroy');

Route::get('AddMatch', 'App\Http\Controllers\CalendaryController@createMatch');
Route::post('AddMatch', 'App\Http\Controllers\CalendaryController@storeMatch');

Route::get('statistics', 'App\Http\Controllers\CalendaryController@show');

Route::get('info/{id}', 'App\Http\Controllers\InfoController@showinfo');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
