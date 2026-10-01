<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FooterSettingsController extends Controller
{
    public function defaults(): array
    {
        return ['description' => 'A serene mountain escape offering panoramic views, elegant rooms and warm Pakistani hospitality in the heart of Murree.', 'quick_links' => ['home', 'about', 'rooms', 'gallery', 'contact'], 'instagram' => 'https://instagram.com', 'facebook' => 'https://facebook.com', 'whatsapp' => 'https://wa.me/923000053333'];
    }

    public function settings(): array
    {
        $path = storage_path('app/footer-settings.json');
        $saved = File::exists($path) ? json_decode(File::get($path), true) : [];
        return array_merge($this->defaults(), is_array($saved) ? $saved : []);
    }

    public function edit()
    {
        return view('admin.footer-settings', ['footerSettings' => $this->settings()]);
    }

    public function update(Request $request)
    {
        $data = $request->validate(['description' => ['required', 'string', 'max:500'], 'quick_links' => ['nullable', 'array'], 'quick_links.*' => ['in:home,about,rooms,gallery,contact'], 'instagram' => ['nullable', 'url', 'max:250'], 'facebook' => ['nullable', 'url', 'max:250'], 'whatsapp' => ['nullable', 'url', 'max:250']]);
        $settings = ['description' => $data['description'], 'quick_links' => array_values(array_unique($data['quick_links'] ?? [])), 'instagram' => $data['instagram'] ?? '', 'facebook' => $data['facebook'] ?? '', 'whatsapp' => $data['whatsapp'] ?? ''];
        File::put(storage_path('app/footer-settings.json'), json_encode($settings, JSON_PRETTY_PRINT));
        return redirect()->route('admin.footer-settings')->with('success', 'Footer settings updated across the website.');
    }
}
