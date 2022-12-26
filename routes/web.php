<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//routes for admin only
Route::middleware(['auth', 'can:isAdmin'])->group(function () {
    Route::get('/districts', [DistrictController::class, 'index'])->name('district.index');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/{id}/update', [UserController::class, 'update'])->name('users.update');
    Route::post('/users', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
});

// routes for all users
Route::middleware('auth')->group(function () {
    Route::get('/update-database', [ClientController::class, 'create'])->name('client.create');
    Route::get('/clients', [ClientController::class, 'index'])->name('client.list');
    Route::get('/appointments', [ClientController::class, 'appointments'])->name('client.appointment');
    Route::get('/send-sms', [ClientController::class, 'sendSms'])->name('client.send-sms');
});
