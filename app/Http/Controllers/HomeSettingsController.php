<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Support\SiteDataStore;

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
        $saved = SiteDataStore::get('home-settings', []);

        return array_merge($this->defaults(), is_array($saved) ? $saved : []);
    }

    public function home()
    {
        $rooms = (new RoomController)->rooms();
        return view('home', [
            'homeSettings' => $this->settings(),
            'rooms' => array_slice($rooms, 0, 3)
        ]);
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
            $filename = basename($request->file('hero_image')->getClientOriginalName());
            $request->file('hero_image')->move($directory, $filename);
            $settings['hero_image'] = 'images/uploads/' . $filename;
        }

        SiteDataStore::put('home-settings', $settings);

        return redirect()->route('admin.home-settings')->with('success', 'Home hero section updated successfully.');
    }
}
