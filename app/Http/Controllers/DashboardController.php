<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\Jurusan;
use App\Models\Gelombang;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        /*
        |--------------------------------------------------------------------------
        | Dashboard Admin
        |--------------------------------------------------------------------------
        */
        if ($user->hasRole('admin')) {

            $setting = Setting::first();

            $totalPendaftar = Pendaftar::count();
            $diterima = Pendaftar::where('status', 'diterima')->count();
            $ditolak = Pendaftar::where('status', 'ditolak')->count();
            $menunggu = Pendaftar::where('status', 'menunggu')->count();

            $totalJurusan = Jurusan::count();
            $totalGelombang = Gelombang::count();

            $chartJurusan = Jurusan::withCount('pendaftars')->get();

            $labels = $chartJurusan->pluck('nama_jurusan');
            $data = $chartJurusan->pluck('pendaftars_count');

            $pendaftarTerbaru = Pendaftar::latest()
                ->take(5)
                ->get();

            return view('dashboard', compact(
                'setting',
                'totalPendaftar',
                'diterima',
                'ditolak',
                'menunggu',
                'totalJurusan',
                'totalGelombang',
                'labels',
                'data',
                'pendaftarTerbaru'
            ));
        }

        /*
        |--------------------------------------------------------------------------
        | Dashboard Petugas
        |--------------------------------------------------------------------------
        */
        if ($user->hasRole('petugas')) {
            return view('petugas.dashboard');
        }

        /*
        |--------------------------------------------------------------------------
        | Dashboard Siswa
        |--------------------------------------------------------------------------
        */
        if ($user->hasRole('siswa')) {

    $pendaftar = Pendaftar::where('user_id', auth()->id())->first();

    return view('siswa.dashboard', compact('pendaftar'));
}

        /*
        |--------------------------------------------------------------------------
        | Role Tidak Dikenali
        |--------------------------------------------------------------------------
        */
        Auth::logout();

        return redirect()->route('login')->withErrors([
            'email' => 'Role akun belum ditentukan.'
        ]);
    }
}