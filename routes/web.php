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

/***Route des cycles */
Route::get('/cycles', ['App\Http\Controllers\CycleController', 'index'])->name('cycles.index');
Route::get('/cycles/create', ['App\Http\Controllers\CycleController', 'create'])->name('cycles.create');
Route::post('/cycles', ['App\Http\Controllers\CycleController', 'store'])->name('cycles.store');
Route::get('/cycles/{cycle}', ['App\Http\Controllers\CycleController', 'show'])->name('cycles.show');
Route::get('/cycles/{cycle}/edit', ['App\Http\Controllers\CycleController', 'edit'])->name('cycles.edit');
Route::patch('/cycles/{cycle}', ['App\Http\Controllers\CycleController', 'update'])->name('cycles.update');
Route::get('/cycles/{cycle}', ['App\Http\Controllers\CycleController', 'destroy'])->name('cycles.destroy');

/**Route des mentions */
Route::get('/mentions', ['App\Http\Controllers\MentionController', 'index'])->name('mentions.index');
Route::get('/mentions/create', ['App\Http\Controllers\MentionController', 'create'])->name('mentions.create');
Route::post('/mentions', ['App\Http\Controllers\MentionController', 'store'])->name('mentions.store');
Route::get('/mentions/{mention}', ['App\Http\Controllers\MentionController', 'show'])->name('mentions.show');
Route::get('/mentions/{mention}/edit', ['App\Http\Controllers\MentionController', 'edit'])->name('mentions.edit');
Route::patch('/mentions/{mention}', ['App\Http\Controllers\MentionController', 'update'])->name('mentions.update');
Route::delete('/mentions/{mention}', ['App\Http\Controllers\MentionController', 'destroy'])->name('mentions.destroy');

/**Route des parcours */
Route::get('/parcours', ['App\Http\Controllers\ParcoursController', 'index'])->name('parcours.index');
Route::get('/parcours/create', ['App\Http\Controllers\ParcoursController', 'create'])->name('parcours.create');
Route::post('/parcours', ['App\Http\Controllers\ParcoursController', 'store'])->name('parcours.store');
Route::get('/parcours/{parcour}', ['App\Http\Controllers\ParcoursController', 'show'])->name('parcours.show');
Route::get('/parcours/{parcour}/edit', ['App\Http\Controllers\ParcoursController', 'edit'])->name('parcours.edit');
Route::patch('/parcours/{parcour}', ['App\Http\Controllers\ParcoursController', 'update'])->name('parcours.update');
Route::delete('/parcours/{parcour}', ['App\Http\Controllers\ParcoursController', 'destroy'])->name('parcours.destroy');

/**Route pour les niveaux */
Route::get('/niveaux', ['App\Http\Controllers\NiveauController', 'index'])->name('niveaux.index');
Route::get('/niveaux/create', ['App\Http\Controllers\NiveauController', 'create'])->name('niveaux.create');
Route::post('/niveaux', ['App\Http\Controllers\NiveauController', 'store'])->name('niveaux.store');
Route::get('/niveaux/{niveau}', ['App\Http\Controllers\NiveauController', 'show'])->name('niveaux.show');
Route::get('/niveaux/{niveau}/edit', ['App\Http\Controllers\NiveauController', 'edit'])->name('niveaux.edit');
Route::patch('/niveaux/{niveau}', ['App\Http\Controllers\NiveauController', 'update'])->name('niveaux.update');
Route::delete('/niveaux/{niveau}', ['App\Http\Controllers\NiveauController', 'destroy'])->name('niveaux.destroy');

/**Route pour les etudiants */
Route::get('/etudiants', ['App\Http\Controllers\EtudiantController', 'index'])->name('etudiants.index');
Route::get('/etudiants/create', ['App\Http\Controllers\EtudiantController', 'create'])->name('etudiants.create');
Route::post('/etudiants', ['App\Http\Controllers\EtudiantController', 'store'])->name('etudiants.store');
Route::get('/etudiants/{etudiant}', ['App\Http\Controllers\EtudiantController', 'show'])->name('etudiants.show');
Route::get('/etudiants/{etudiant}/edit', ['App\Http\Controllers\EtudiantController', 'edit'])->name('etudiants.edit');
Route::patch('/etudiants/{etudiant}', ['App\Http\Controllers\EtudiantController', 'update'])->name('etudiants.update');
Route::delete('/etudiants/{etudiant}', ['App\Http\Controllers\EtudiantController', 'destroy'])->name('etudiants.destroy');

/**Route des annees academiques */
Route::get('/annees', ['App\Http\Controllers\AnneeController', 'index'])->name('annees.index');
Route::get('/annees/create', ['App\Http\Controllers\AnneeController', 'create'])->name('annees.create');
Route::post('/annees', ['App\Http\Controllers\AnneeController', 'store'])->name('annees.store');
Route::get('/annees/{annee}', ['App\Http\Controllers\AnneeController', 'show'])->name('annees.show');
Route::get('/annees/{annee}/edit', ['App\Http\Controllers\AnneeController', 'edit'])->name('annees.edit');
Route::patch('/annees/{annee}', ['App\Http\Controllers\AnneeController', 'update'])->name('annees.update');
Route::delete('/annees/{annee}', ['App\Http\Controllers\AnneeController', 'destroy'])->name('annees.destroy');


//gestion des enseignants
Route::get('/enseignants_create', '\App\Http\Controllers\EnseignantsController@create')->name('enseignants.index');
Route::get('/list_enseignants', '\App\Http\Controllers\EnseignantsController@show')->name('enseignants.list');
Route::post('/enseignants_create', '\App\Http\Controllers\EnseignantsController@store')->name('enseignants.create');

Route::get('/notes', '\App\Http\Controllers\NoteController@index')->name('notes.index');
//Route::get('/inscriptions_niveau', '\App\Http\Controllers\NiveauController@inscriptions')->name('inscriptions.niveau');
//Route::post('/getetudiants', '\App\Http\Controllers\EtudiantController@getEtudiants')->name('etudiants.getEtudiants');




