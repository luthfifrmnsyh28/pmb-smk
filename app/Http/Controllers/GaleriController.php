<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\KategoriGaleri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::with('kategori')
            ->orderBy('urutan')
            ->get();

        return view('galeri.index', compact('galeri'));
    }

    public function create()
    {
        $kategori = KategoriGaleri::where('status',1)
            ->orderBy('nama')
            ->get();

        return view('galeri.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori_galeri_id' => 'required',
            'judul' => 'required',
            'foto' => 'required|image',
            'deskripsi' => 'nullable',
            'status' => 'required',
            'urutan' => 'nullable'
        ]);

        if($request->hasFile('foto')){
            $data['foto'] = $request->file('foto')
                ->store('galeri','public');
        }

        Galeri::create($data);

        return redirect()
            ->route('galeri.index')
            ->with('success','Galeri berhasil ditambahkan');
    }

    public function edit(Galeri $galeri)
    {
        $kategori = KategoriGaleri::where('status',1)->get();

        return view('galeri.edit', compact(
            'galeri',
            'kategori'
        ));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $data = $request->validate([
            'kategori_galeri_id' => 'required',
            'judul' => 'required',
            'foto' => 'nullable|image',
            'deskripsi' => 'nullable',
            'status' => 'required',
            'urutan' => 'nullable'
        ]);

        if($request->hasFile('foto')){

            if($galeri->foto){
                Storage::disk('public')
                    ->delete($galeri->foto);
            }

            $data['foto'] = $request->file('foto')
                ->store('galeri','public');
        }

        $galeri->update($data);

        return redirect()
            ->route('galeri.index')
            ->with('success','Galeri berhasil diubah');
    }

    public function destroy(Galeri $galeri)
    {
        if($galeri->foto){
            Storage::disk('public')
                ->delete($galeri->foto);
        }

        $galeri->delete();

        return back()
            ->with('success','Galeri berhasil dihapus');
    }
}