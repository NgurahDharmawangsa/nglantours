<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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


// Route::get('/dashboard', function () {
//     return view('admin.index');
// })->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'count'])->middleware(['auth', 'must-admin'])->name('dashboard');

// Route::get('/destination', [DestinationController::class, 'index']);
Route::resource('/destination', DestinationController::class)->middleware(['auth', 'must-admin']);

Route::get('/destination-add', function () {
    return view('admin.destination.add-destination');
});

// Packages
// Route::get('/packages', function () {
//     return view('admin.packages.packages');
// });
Route::resource('/packages', PackagesController::class)->middleware(['auth', 'must-admin']);

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout']);