<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeSettingsController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ContactSettingsController;
use App\Http\Controllers\FooterSettingsController;
use App\Http\Controllers\MessageController;

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

Route::get('/rooms', [RoomController::class, 'index'])->name('rooms');

Route::get('/header', function () {
    return view('header-preview');
});

Route::get('/contact', [ContactSettingsController::class, 'contact'])->name('contact');
Route::post('/contact/messages', [MessageController::class, 'store'])->name('contact.message.store');
Route::post('/contact', [MessageController::class, 'store'])->name('contact.message.legacy');

Route::get('/admin/login', function () {
    $rooms = (new RoomController)->rooms();
    $contact = (new ContactSettingsController)->settings();
    return view('admin.dashboard', ['roomCount' => count($rooms), 'imageCount' => collect($rooms)->sum(function ($room) { return count($room['images'] ?? []); }), 'contactSettings' => $contact]);
})->name('admin.login');

Route::get('/admin/home-settings', [HomeSettingsController::class, 'edit'])->name('admin.home-settings');
Route::post('/admin/home-settings', [HomeSettingsController::class, 'update'])->name('admin.home-settings.update');
Route::get('/admin/contact-settings', [ContactSettingsController::class, 'edit'])->name('admin.contact-settings');
Route::post('/admin/contact-settings', [ContactSettingsController::class, 'update'])->name('admin.contact-settings.update');
Route::get('/admin/footer-settings', [FooterSettingsController::class, 'edit'])->name('admin.footer-settings');
Route::get('/admin/messages', [MessageController::class, 'admin'])->name('admin.messages');
Route::delete('/admin/messages/{id}', [MessageController::class, 'destroy'])->name('admin.messages.destroy');
Route::post('/admin/footer-settings', [FooterSettingsController::class, 'update'])->name('admin.footer-settings.update');
Route::get('/admin/rooms', [RoomController::class, 'admin'])->name('admin.rooms');
Route::post('/admin/rooms', [RoomController::class, 'store'])->name('admin.rooms.store');
Route::delete('/admin/rooms/{room}', [RoomController::class, 'destroy'])->name('admin.rooms.destroy');
Route::post('/admin/rooms/{room}/images/{image}/replace', [RoomController::class, 'replaceImage'])->name('admin.rooms.image.replace');
Route::delete('/admin/rooms/{room}/images/{image}', [RoomController::class, 'deleteImage'])->name('admin.rooms.image.delete');
