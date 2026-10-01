<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeSettingsController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ContactSettingsController;
use App\Http\Controllers\FooterSettingsController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\AdminPasswordController;

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

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');


Route::get('/header', function () {
    return view('header-preview');
});

Route::get('/contact', [ContactSettingsController::class, 'contact'])->name('contact');
Route::post('/contact/messages', [MessageController::class, 'store'])->name('contact.message.store');
Route::post('/contact', [MessageController::class, 'store'])->name('contact.message.legacy');

Route::get('/sitemap.xml', function (\Illuminate\Http\Request $request) {
    $baseUrl = $request->getSchemeAndHttpHost();
    $pages = [
        ['path' => '/', 'priority' => '1.0', 'changefreq' => 'weekly'],
        ['path' => '/about', 'priority' => '0.8', 'changefreq' => 'monthly'],
        ['path' => '/rooms', 'priority' => '0.9', 'changefreq' => 'weekly'],
        ['path' => '/gallery', 'priority' => '0.7', 'changefreq' => 'weekly'],
        ['path' => '/contact', 'priority' => '0.7', 'changefreq' => 'monthly'],
    ];

    $lastModified = now()->toDateString();
    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

    foreach ($pages as $page) {
        $xml .= "  <url>\n";
        $xml .= '    <loc>' . e($baseUrl . $page['path']) . "</loc>\n";
        $xml .= '    <lastmod>' . $lastModified . "</lastmod>\n";
        $xml .= '    <changefreq>' . $page['changefreq'] . "</changefreq>\n";
        $xml .= '    <priority>' . $page['priority'] . "</priority>\n";
        $xml .= "  </url>\n";
    }

    $xml .= '</urlset>';

    return response($xml, 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
})->name('sitemap');

Route::get('/admin/login', function () {
    if (session('admin_authenticated')) {
        $rooms = (new RoomController)->rooms();
        $galleryImages = (new GalleryController)->images();
        $messages = (new MessageController)->messages();
        $contact = (new ContactSettingsController)->settings();

        return view('admin.dashboard', [
            'roomCount' => count($rooms),
            'imageCount' => count($galleryImages),
            'messageCount' => count($messages),
            'contactSettings' => $contact,
        ]);
    }
    return view('admin.login');
})->name('admin.login');
Route::post('/admin/login', function (\Illuminate\Http\Request $request) {
    $data = $request->validate(['email' => ['required','email'], 'password' => ['required','string']]);
    $auth = new AdminPasswordController();
    $creds = $auth->getCredentials();
    
    $emailMatches = strtolower(trim($data['email'])) === strtolower(trim($creds['email']));
    $stored = $creds['password'] ?? '';
    $passwordMatches = \Illuminate\Support\Facades\Hash::check($data['password'], $stored) || ($data['password'] === $stored);
    
    if (!$emailMatches || !$passwordMatches) {
        return back()->withErrors(['email' => 'Invalid admin email or password.'])->withInput();
    }
    $request->session()->regenerate();
    $request->session()->put('admin_authenticated', true);

    if ($request->boolean('remember')) {
        $token = $auth->issueRememberToken();

        return redirect()->route('admin.login')->withCookie(
            cookie('admin_remember', $token, 60 * 24 * 30, null, null, false, true, false, 'lax')
        );
    }

    $auth->clearRememberToken();

    return redirect()->route('admin.login')->withCookie(cookie()->forget('admin_remember'));
})->name('admin.login.submit');
Route::post('/admin/logout', function (\Illuminate\Http\Request $request) {
    (new AdminPasswordController())->clearRememberToken();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('admin.login')->withCookie(cookie()->forget('admin_remember'));
})->name('admin.logout');

Route::get('/admin/change-password', [AdminPasswordController::class, 'edit'])->name('admin.change-password');
Route::post('/admin/change-password', [AdminPasswordController::class, 'update'])->name('admin.change-password.update');

Route::get('/admin/home-settings', [HomeSettingsController::class, 'edit'])->name('admin.home-settings');
Route::get('/admin/seo-settings', [SeoController::class, 'edit'])->name('admin.seo-settings');
Route::post('/admin/seo-settings', [SeoController::class, 'update'])->name('admin.seo-settings.update');
Route::post('/admin/home-settings', [HomeSettingsController::class, 'update'])->name('admin.home-settings.update');
Route::get('/admin/contact-settings', [ContactSettingsController::class, 'edit'])->name('admin.contact-settings');
Route::post('/admin/contact-settings', [ContactSettingsController::class, 'update'])->name('admin.contact-settings.update');
Route::get('/admin/footer-settings', [FooterSettingsController::class, 'edit'])->name('admin.footer-settings');
Route::get('/admin/messages', [MessageController::class, 'admin'])->name('admin.messages');
Route::get('/admin/gallery', [GalleryController::class, 'admin'])->name('admin.gallery');
Route::post('/admin/gallery', [GalleryController::class, 'store'])->name('admin.gallery.store');
Route::post('/admin/gallery/{index}/replace', [GalleryController::class, 'replace'])->name('admin.gallery.replace');
Route::delete('/admin/gallery/{index}', [GalleryController::class, 'destroy'])->name('admin.gallery.destroy');
Route::delete('/admin/messages/{id}', [MessageController::class, 'destroy'])->name('admin.messages.destroy');
Route::post('/admin/footer-settings', [FooterSettingsController::class, 'update'])->name('admin.footer-settings.update');
Route::get('/admin/rooms', [RoomController::class, 'admin'])->name('admin.rooms');
Route::post('/admin/rooms', [RoomController::class, 'store'])->name('admin.rooms.store');
Route::delete('/admin/rooms/{room}', [RoomController::class, 'destroy'])->name('admin.rooms.destroy');
Route::post('/admin/rooms/{room}/images/{image}/replace', [RoomController::class, 'replaceImage'])->name('admin.rooms.image.replace');
Route::delete('/admin/rooms/{room}/images/{image}', [RoomController::class, 'deleteImage'])->name('admin.rooms.image.delete');
