<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShortUrlController;
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


Route::middleware('auth')->group(function () {
    Route::resource('short-url', 'App\Http\Controllers\ShortUrlController')->except(['edit', 'update']);
    Route::get('/{short_url}', [ShortUrlController::class, 'visit'])->name('visit');
    Route::get('auth/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('auth/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('auth/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
