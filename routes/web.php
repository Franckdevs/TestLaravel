<?php

use App\Http\Controllers\inscription;
use App\Http\Controllers\cars;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\controllerdesvehicule;
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

Route::post('/register', [inscription::class,"register"])->name('register');

Route::put('/modification', [inscription::class,"modification"])->name('modification');

Route::post('/create',[inscription::class,"create"])->name('formulaire');

Route::post('/connexion', [inscription::class,"connexion"])->name('connexion');

// Route pour supprimer la photo de profil
Route::delete('/supprimer-photo', [inscription::class, 'supprimerPhoto'])->name('supprimerphoto');

Route::get('/gestionutilisateur',[inscription::class,"index"]);

Route::delete('/supprimer/{id}', [inscription::class,'supprimer'])->name('supprimer');

Route::get('/utilisateur/{id}', [inscription::class, 'getUtilisateur'])->name('utilisateur');

Route::post('/cars', [controllerdesvehicule::class,"create"])->name('register');


Route::get('/listecars',[controllerdesvehicule::class,"index"]);

Route::delete('/supprimer/{id}', [controllerdesvehicule::class,'supprimer'])->name('supprimer');
/**
 * 
 */
Route::get('/listecars', function () {
    return view('listecars');
});

 Route::get('/cars', function () {
    return view('cars');
});

 Route::get('/', function () {
    return view('connexion');
});

Route::get('/inscription',function(){
    return view('inscription');
});


 
Route::get('/connexion',function(){
    return view('connexion');
});


Route::get('/acceuil',function(){
    return view('acceuil');
});


