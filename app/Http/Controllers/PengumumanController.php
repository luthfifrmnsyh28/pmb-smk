<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        return view('pengumuman.index');
    }

    public function cek(Request $request)
    {
        $request->validate([
            'nomor_pendaftaran' => 'required'
        ]);

        $pendaftar = Pendaftar::where(
            'nomor_pendaftaran',
            $request->nomor_pendaftaran
        )->first();

        return view(
            'pengumuman.hasil',
            compact('pendaftar')
        );
    }
}