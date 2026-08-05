<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\VisiMisi;
use App\Models\Kepsek;
use App\Models\Setting;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Gelombang;
use App\Models\Galeri;
use App\Models\Pendaftar;

class HomeController extends Controller
{
    public function index()
    {
        // SLIDER
        $sliders = Slider::where('aktif', 1)
            ->orderBy('urutan')
            ->get();

        // STATISTIK
        $totalPendaftar = Pendaftar::count();
        $totalJurusan   = Jurusan::count();
        $totalGelombang = Gelombang::where('status', 1)->count();

        // DATA UTAMA
        $visiMisi = VisiMisi::first();
        $kepsek   = Kepsek::first();
        $setting  = Setting::first();

        // LIST DATA
        $gurus      = Guru::latest()->get();
        $jurusans   = Jurusan::latest()->get();
        $gelombangs = Gelombang::latest()->get();
        $galeris    = Galeri::with('kategori')->latest()->get();

        return view('home.index', compact(
            'sliders',
            'totalPendaftar',
            'totalJurusan',
            'totalGelombang',
            'visiMisi',
            'kepsek',
            'setting',
            'gurus',
            'jurusans',
            'gelombangs',
            'galeris'
        ));
    }
}