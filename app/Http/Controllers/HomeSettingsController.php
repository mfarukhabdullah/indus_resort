<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeSettingsController extends Controller
{
    private function defaults(): array
    {
        return [
            'heading' => 'Indus Resort',
            'highlight' => 'Murree',
            'description' => 'A luxury mountain retreat where pine-scented air, misty valleys and warm hospitality come together for an unforgettable stay.',
            'hero_image' => 'images/hero-image.png',
        ];
    }

    public function settings(): array
    {
        $path = storage_path('app/home-settings.json');
        $saved = File::exists($path) ? json_decode(File::get($path), true) : [];

        return array_merge($this->defaults(), is_array($saved) ? $saved : []);
    }

    public function home()
    {
        return view('home', ['homeSettings' => $this->settings()]);
    }

    public function edit()
    {
        return view('admin.home-settings', ['homeSettings' => $this->settings()]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'heading' => ['required', 'string', 'max:100'],
            'highlight' => ['nullable', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:500'],
            'hero_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:20480'],
        ]);

        $settings = $this->settings();
        $settings['heading'] = $data['heading'];
        $settings['highlight'] = $data['highlight'] ?? '';
        $settings['description'] = $data['description'];

        if ($request->hasFile('hero_image')) {
            $directory = public_path('images/uploads');
            File::ensureDirectoryExists($directory);
            $filename = 'hero-' . now()->format('YmdHis') . '.' . $request->file('hero_image')->extension();
            $request->file('hero_image')->move($directory, $filename);
            $settings['hero_image'] = 'images/uploads/' . $filename;
        }

        File::put(storage_path('app/home-settings.json'), json_encode($settings, JSON_PRETTY_PRINT));

        return redirect()->route('admin.home-settings')->with('success', 'Home hero section updated successfully.');
    }
}
