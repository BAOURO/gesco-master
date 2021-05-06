<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\CycleController;
use App\Http\Controllers\MentionController;
use App\Http\Controllers\ParcoursController;
use App\Http\Controllers\NiveauController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');


Route::resource('cycles', CycleController::class);
Route::resource('mentions', MentionController::class);
Route::resource('parcours', ParcoursController::class);
Route::resource('niveaux', NiveauController::class);
Route::resource('pays', PaysController::class);
Route::resource('regions', RegionController::class);
Route::resource('departements', DepartementController::class);
