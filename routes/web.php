<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SystemColorController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnnouncementController;


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
Route::view('/', 'landing.home')->name('landing');
Route::view('/about-us', 'landing.about_us')->name('about_us');
Route::view('/partners', 'landing.partners')->name('partners');
Route::view('/contact-us', 'landing.contact')->name('contact_us');
Route::view('/admin-dashboard', 'admin.dashboard')->name('admin');

Auth::routes();

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/scanner', 'admin.scanner')->name('scanner');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/system-color', [SystemColorController::class, 'store'])->name('system_color');

    Route::resource('sponsors', SponsorController::class);
    Route::resource('users', UserController::class);
    Route::resource('announcements', AnnouncementController::class);
});
