<?php

use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackagesController;
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

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [HomeController::class, 'index']);


Route::get('/dashboard', function () {
    return view('admin.index');
});

// Route::get('/destination', [DestinationController::class, 'index']);
Route::resource('/destination', DestinationController::class);

Route::get('/destination-add', function () {
    return view('admin.destination.add-destination');
});

// Packages
// Route::get('/packages', function () {
//     return view('admin.packages.packages');
// });
Route::resource('/packages', PackagesController::class);

Route::get('/login', function () {
    return view('login');
})->name('login');
