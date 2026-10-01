<?php
namespace App\Http\Middleware;

use App\Http\Controllers\AdminPasswordController;
use Closure;
use Illuminate\Http\Request;
class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->is('admin/*') && !$request->session()->get('admin_authenticated')) {
            $auth = new AdminPasswordController();

            if ($auth->hasValidRememberToken($request->cookie('admin_remember'))) {
                $request->session()->regenerate();
                $request->session()->put('admin_authenticated', true);
            }
        }

        if ($request->is('admin/*') && !$request->is('admin/login') && !$request->session()->get('admin_authenticated')) return redirect()->route('admin.login');
        return $next($request);
    }
}
