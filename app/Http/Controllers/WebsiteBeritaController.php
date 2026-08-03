<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Setting;

class WebsiteBeritaController extends Controller
{
    public function index()
{
    $setting = Setting::first();

    $beritas = Berita::where('status',1)
        ->latest()
        ->paginate(6);

    return view(
        'website.berita.index',
        compact(
            'beritas',
            'setting'
        )
    );
}

    public function show($slug)
{
    $setting = Setting::first();

    $berita = Berita::where('slug',$slug)
        ->firstOrFail();

    $berita->increment('views');

    $terbaru = Berita::where('status',1)
        ->latest()
        ->take(5)
        ->get();

    return view(
        'website.berita.show',
        compact(
            'setting',
            'berita',
            'terbaru'
        )
    );
}
}