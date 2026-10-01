<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Support\SiteDataStore;

class AdminPasswordController extends Controller
{
    public function getCredentials(): array
    {
        $data = SiteDataStore::get('admin-auth', []);
        if (is_array($data) && !empty($data['email']) && !empty($data['password'])) return $data;

        $default = [
            'email' => 'admin@indusresort.com',
            'password' => Hash::make('admin123')
        ];
        SiteDataStore::put('admin-auth', $default);
        return $default;
    }

    public function issueRememberToken(): string
    {
        $token = Str::random(64);

        DB::table('admin_credentials')->where('id', 1)->update([
            'remember_token' => hash('sha256', $token),
            'updated_at' => now(),
        ]);

        return $token;
    }

    public function hasValidRememberToken(?string $token): bool
    {
        if (!$token || !Schema::hasTable('admin_credentials')) {
            return false;
        }

        $storedHash = DB::table('admin_credentials')->where('id', 1)->value('remember_token');

        return is_string($storedHash) && hash_equals($storedHash, hash('sha256', $token));
    }

    public function clearRememberToken(): void
    {
        if (Schema::hasTable('admin_credentials')) {
            DB::table('admin_credentials')->where('id', 1)->update([
                'remember_token' => null,
                'updated_at' => now(),
            ]);
        }
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
        SiteDataStore::put('admin-auth', $creds);
        $this->clearRememberToken();

        return redirect()->route('admin.change-password')
            ->withCookie(cookie()->forget('admin_remember'))
            ->with('success', 'Password has been changed successfully! Remember to use your new password the next time you sign in.');
    }
}
