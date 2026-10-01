<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminPasswordController extends Controller
{
    protected function credentialsPath(): string
    {
        return storage_path('app/admin-auth.json');
    }

    public function getCredentials(): array
    {
        $path = $this->credentialsPath();
        if (File::exists($path)) {
            $data = json_decode(File::get($path), true);
            if (is_array($data) && !empty($data['email']) && !empty($data['password'])) {
                return $data;
            }
        }

        $default = [
            'email' => 'admin@indusresort.com',
            'password' => Hash::make('admin123')
        ];
        File::put($path, json_encode($default, JSON_PRETTY_PRINT));
        return $default;
    }

    public function edit()
    {
        if (!session('admin_authenticated')) {
            return redirect()->route('admin.login');
        }

        $creds = $this->getCredentials();
        return view('admin.change-password', [
            'adminEmail' => $creds['email'] ?? 'admin@indusresort.com'
        ]);
    }

    public function update(Request $request)
    {
        if (!session('admin_authenticated')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ], [
            'password.confirmed' => 'The password confirmation does not match.',
            'password.min' => 'The new password must be at least 6 characters.',
        ]);

        $creds = $this->getCredentials();
        $stored = $creds['password'] ?? '';

        // Check if current password matches (supports bcrypt hash or plain text legacy)
        $isMatch = Hash::check($request->current_password, $stored) || ($request->current_password === $stored);

        if (!$isMatch) {
            return back()->withErrors(['current_password' => 'The current password you entered is incorrect.'])->withInput();
        }

        $creds['password'] = Hash::make($request->password);
        File::put($this->credentialsPath(), json_encode($creds, JSON_PRETTY_PRINT));

        return redirect()->route('admin.change-password')->with('success', 'Password has been changed successfully! Remember to use your new password the next time you sign in.');
    }
}
