<?php

namespace App\Http\Controllers;

use App\Models\KepalaSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KepalaSekolahController extends Controller
{
    public function edit()
    {
        $kepsek = KepalaSekolah::first();

        if(!$kepsek){

            $kepsek = KepalaSekolah::create([
                'nama'=>'',
                'nip'=>'',
                'jabatan'=>'Kepala Sekolah',
                'sambutan'=>''
            ]);

        }

        return view('kepala-sekolah.edit', compact('kepsek'));
    }

    public function update(Request $request)
    {
        $kepsek = KepalaSekolah::first();

        $data = $request->validate([
            'nama'=>'required',
            'nip'=>'nullable',
            'jabatan'=>'nullable',
            'sambutan'=>'nullable',
            'foto'=>'nullable|image'
        ]);

        if($request->hasFile('foto')){

            if($kepsek->foto){
                Storage::disk('public')->delete($kepsek->foto);
            }

            $data['foto'] = $request->file('foto')
                ->store('kepala-sekolah','public');
        }

        $kepsek->update($data);

        return back()->with(
            'success',
            'Profil Kepala Sekolah berhasil diperbarui'
        );
    }
}