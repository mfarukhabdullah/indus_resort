<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeSettingsController;

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

Route::get('/', [HomeSettingsController::class, 'home'])->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/rooms', function () {
    return view('rooms');
})->name('rooms');

Route::get('/header', function () {
    return view('header-preview');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/admin/login', function () {
    return view('admin.dashboard');
})->name('admin.login');

Route::get('/admin/home-settings', [HomeSettingsController::class, 'edit'])->name('admin.home-settings');
Route::post('/admin/home-settings', [HomeSettingsController::class, 'update'])->name('admin.home-settings.update');
