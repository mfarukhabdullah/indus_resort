<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContactSettingsController extends Controller
{
    public function defaults(): array
    {
        return ['email' => 'indusresort7861@gmail.com', 'phone' => '0300-0053333', 'location' => 'Governor House Road, Aliot Bazar, Kohala Road, Murree', 'hours' => 'Open 24 hours\nEvery day of the week'];
    }

    public function settings(): array
    {
        $path = storage_path('app/contact-settings.json');
        $saved = File::exists($path) ? json_decode(File::get($path), true) : [];
        return array_merge($this->defaults(), is_array($saved) ? $saved : []);
    }

    public function contact()
    {
        return view('contact', ['contactSettings' => $this->settings()]);
    }

    public function edit()
    {
        return view('admin.contact-settings', ['contactSettings' => $this->settings()]);
    }

    public function update(Request $request)
    {
        $data = $request->validate(['email' => ['required', 'email', 'max:120'], 'phone' => ['required', 'string', 'max:50'], 'location' => ['required', 'string', 'max:250'], 'hours' => ['required', 'string', 'max:250']]);
        File::put(storage_path('app/contact-settings.json'), json_encode($data, JSON_PRETTY_PRINT));
        return redirect()->route('admin.contact-settings')->with('success', 'Contact details updated across the website.');
    }
}
