<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Jurusan;
use App\Models\Gelombang;
use App\Models\Slider;
use App\Models\Pendaftar;
use App\Models\VisiMisi;
use App\Models\Guru;
use App\Models\KepalaSekolah;
use App\Models\Galeri;
use App\Models\KategoriGaleri;
use App\Models\Berita;


class HomeController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        $jurusans = Jurusan::where('status', 1)->get();

        $gelombangs = Gelombang::orderBy('tanggal_mulai')->get();

        $sliders = Slider::where('aktif', 1)
            ->orderBy('urutan')
            ->get();

        $totalPendaftar = Pendaftar::count();

        $totalJurusan = Jurusan::where('status', 1)->count();

        $totalGelombang = Gelombang::where('status', 1)->count();

        $visiMisi = VisiMisi::first();

        $gurus = Guru::where('status',1)
            ->orderBy('urutan')
            ->get();

        $kepsek = KepalaSekolah::first();

        $kategoriGaleri = KategoriGaleri::where('status',1)
    ->orderBy('urutan')
    ->get();

$galeris = Galeri::where('status',1)
    ->with('kategori')
    ->orderBy('urutan')
    ->get();

    $beritas = Berita::where('status',1)
    ->latest()
    ->take(3)
    ->get();

        return view('home.index', compact(
            'setting',
            'jurusans',
            'gelombangs',
            'sliders',
            'totalPendaftar',
            'totalJurusan',
            'totalGelombang',
            'visiMisi',
            'gurus',
            'kepsek',
            'kategoriGaleri',
            'galeris',
            'beritas'
        ));
    }
}