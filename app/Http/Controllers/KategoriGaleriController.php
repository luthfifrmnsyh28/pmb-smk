<?php

namespace App\Http\Controllers;

use App\Models\KategoriGaleri;
use Illuminate\Http\Request;

class KategoriGaleriController extends Controller
{
    public function index()
    {
        $kategori = KategoriGaleri::orderBy('urutan')->get();

        return view('kategori-galeri.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori-galeri.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'   => 'required',
            'status' => 'required',
            'urutan' => 'nullable'
        ]);

        KategoriGaleri::create($data);

        return redirect()
            ->route('kategori-galeri.index')
            ->with('success','Kategori berhasil ditambah');
    }

    public function edit(KategoriGaleri $kategori_galeri)
    {
        return view('kategori-galeri.edit', compact('kategori_galeri'));
    }

    public function update(Request $request, KategoriGaleri $kategori_galeri)
    {
        $data = $request->validate([
            'nama'   => 'required',
            'status' => 'required',
            'urutan' => 'nullable'
        ]);

        $kategori_galeri->update($data);

        return redirect()
            ->route('kategori-galeri.index')
            ->with('success','Kategori berhasil diubah');
    }

    public function destroy(KategoriGaleri $kategori_galeri)
    {
        $kategori_galeri->delete();

        return back()
            ->with('success','Kategori berhasil dihapus');
    }
}