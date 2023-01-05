<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SystemColorController;
use App\Http\Controllers\SponsorController;


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
//     return view('welcome');
// });
Route::view('/', 'landing.home')->name('home');
Route::view('/about-us', 'landing.about_us')->name('about_us');
Route::view('/partners', 'landing.partners')->name('partners');
Route::view('/contact-us', 'landing.contact')->name('contact_us');
Route::view('/admin-dashboard', 'admin.dashboard')->name('admin');

Auth::routes();

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/system-color', [SystemColorController::class, 'store'])->name('system_color');

    Route::resource('sponsors', SponsorController::class);
});
