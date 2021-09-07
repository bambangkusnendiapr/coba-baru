<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\CategoryController;

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
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', function() {
  return redirect()->route('dashboard');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
  //Dashboard
  Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

  Route::resources([
    'profil' => ProfilController::class,
    'category' => CategoryController::class,
  ]);

});