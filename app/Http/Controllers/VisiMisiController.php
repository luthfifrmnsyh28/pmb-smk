<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function index()
    {
        $visi = VisiMisi::first();

        if (!$visi) {

            $visi = VisiMisi::create([
                'visi'   => '',
                'misi'   => '',
                'tujuan' => '',
                'motto'  => '',
                'budaya' => '',
            ]);

        }

        return redirect()->route('visi-misi.edit', $visi->id);
    }

    public function edit(VisiMisi $visi_misi)
{
    return view('visi-misi.edit', [
        'visi_misi' => $visi_misi
    ]);
}

   public function update(Request $request, VisiMisi $visi_misi)
{
    $request->validate([
        'visi' => 'required',
        'misi' => 'required',
    ]);

    $visi_misi->update([
        'visi'   => $request->visi,
        'misi'   => $request->misi,
        'tujuan' => $request->tujuan,
        'motto'  => $request->motto,
        'budaya' => $request->budaya,
    ]);

    return redirect()
        ->back()
        ->with('success', 'Visi Misi berhasil diperbarui.');
}
}