<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Menampilkan halaman login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Proses Login.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Login
        $request->authenticate();

        $user = auth()->user();

        /*
        |--------------------------------------------------------------------------
        | Cek Status User
        |--------------------------------------------------------------------------
        */

        if (!$user->status) {

            Auth::logout();

            return back()->withErrors([
                'email' => 'Akun Anda telah dinonaktifkan Administrator.',
            ])->onlyInput('email');
        }

        /*
        |--------------------------------------------------------------------------
        | Update Last Login
        |--------------------------------------------------------------------------
        */

        $user->update([
            'last_login_at' => now(),
            'last_login_ip' => $request->ip(),
        ]);

        $request->session()->regenerate();

        /*
        |--------------------------------------------------------------------------
        | Redirect Berdasarkan Role
        |--------------------------------------------------------------------------
        */

        return redirect()->route('dashboard');

        /*
        |--------------------------------------------------------------------------
        | Jika User Tidak Memiliki Role
        |--------------------------------------------------------------------------
        */

        Auth::logout();

        return redirect()->route('login')->withErrors([
            'email' => 'Role akun belum ditentukan. Silakan hubungi Administrator.',
        ]);
    }

    /**
     * Logout.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}