<?php

use App\Http\Controllers\JournalController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\UniterController;
use App\Models\Produit;
use App\Models\Unite;
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

Route::get('/produit', function () {
  return view('produit');
});
Route::get('/unite', function () {
  return view('unite');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('produit', ProduitController::class);
Route::resource('unite', UniterController::class);
Route::resource('journal', JournalController::class);

Route::get('/unite-produit', function () {
  $unite = Unite::find(1);
  $produits = $unite->produit;
  return $produits; 
});

Route::get('/produit-unite', function () {
  $produit = Produit::find(1);
  $unites = $produit->unite;
  return $unites;
});