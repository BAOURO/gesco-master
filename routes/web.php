<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('/cycles', ['App\Http\Controllers\CycleController', 'index'])->name('cycles.index');
Route::get('/mentions', ['App\Http\Controllers\MentionController', 'index'])->name('mentions.index');
Route::get('/parcours', ['App\Http\Controllers\ParcoursController', 'index'])->name('parcours.index');
Route::get('/niveaux', ['App\Http\Controllers\NiveauController', 'index'])->name('niveaux.index');
Route::get('/notes', '\App\Http\Controllers\NoteController@index')->name('notes.index');
Route::get('/inscriptions_niveau', '\App\Http\Controllers\NiveauController@inscriptions')->name('inscriptions.niveau');
Route::post('/getetudiants', '\App\Http\Controllers\EtudiantController@getEtudiants')->name('etudiants.getEtudiants');

//gestion des annees academiques
Route::get('/annees_create', '\App\Http\Controllers\AnneeController@index')->name('annees.index');
Route::get('/list_annees', '\App\Http\Controllers\AnneeController@show')->name('annees.list');
Route::post('/annees_create', '\App\Http\Controllers\AnneeController@store')->name('annees.create');

//gestion des enseignants
Route::get('/enseignants_create', '\App\Http\Controllers\EnseignantsController@create')->name('enseignants.index');
Route::get('/list_enseignants', '\App\Http\Controllers\EnseignantsController@show')->name('enseignants.list');
Route::post('/enseignants_create', '\App\Http\Controllers\EnseignantsController@store')->name('enseignants.create');



/*Route::resource('/pays', App\Http\Controllers\PaysController::class);
Route::resource('/regions', App\Http\Controllers\RegionController::class);
Route::resource('/departements', App\Http\Controllers\DepartementController::class);*/
