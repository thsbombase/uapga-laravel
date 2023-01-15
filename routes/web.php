<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SystemColorController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CardController;
use App\Models\Sponsor;


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
    $logos = Sponsor::all();
    return view('landing.home', compact('logos'));
})->name('landing');

Route::view('/about-us', 'landing.about_us')->name('about_us');

Route::get('/partners', function () {
    $partners = Sponsor::where('type', 'partner')->get();
    return view('landing.partners', compact('partners'));
})->name('partners');

Route::get('/sponsors', function () {
    $sponsors = Sponsor::where('type', 'sponsor')->get();
    return view('landing.sponsors', compact('sponsors'));
})->name('sponsors');

Route::view('/contact-us', 'landing.contact')->name('contact_us');
Route::view('/admin-dashboard', 'admin.dashboard')->name('admin');

Auth::routes();

Route::middleware(['auth', 'verified'])->group(function () {

    Route::resource('card', CardController::class);
    Route::view('/scanner', 'admin.scanner')->name('scanner');
    Route::get('/verifyCard/{code}', [CardController::class, 'verifyCard'])->name('verifyCard');
    Route::get('/verifiedCard/{code}', [CardController::class, 'verifiedCard'])->name('verifiedCard');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/system-color', [SystemColorController::class, 'store'])->name('system_color');

    Route::resource('admin/sponsors', SponsorController::class);
    Route::resource('users', UserController::class);
    Route::post('/user-csv', [UserController::class, 'uploadCSV'])->name('user_csv');
    Route::resource('announcements', AnnouncementController::class);
});
