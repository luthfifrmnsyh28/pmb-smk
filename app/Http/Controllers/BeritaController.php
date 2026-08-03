<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->get();

        return view('berita.index', compact('berita'));
    }

    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([

            'judul' => 'required',

            'thumbnail' => 'nullable|image',

            'isi' => 'required',

            'status' => 'required'

        ]);

        $data['slug'] = Str::slug($request->judul);

        if($request->hasFile('thumbnail')){

            $data['thumbnail'] = $request
                ->file('thumbnail')
                ->store('berita','public');
        }

        Berita::create($data);

        return redirect()
    ->route('admin-berita.index')
    ->with('success','Berita berhasil ditambah');
    }

    public function edit(Berita $berita)
    {
        return view('berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $data = $request->validate([

            'judul' => 'required',

            'thumbnail' => 'nullable|image',

            'isi' => 'required',

            'status' => 'required'

        ]);

        $data['slug'] = Str::slug($request->judul);

        if($request->hasFile('thumbnail')){

            if($berita->thumbnail){

                Storage::disk('public')
                    ->delete($berita->thumbnail);
            }

            $data['thumbnail'] = $request
                ->file('thumbnail')
                ->store('berita','public');
        }

        $berita->update($data);

        return redirect()
    ->route('admin-berita.index')
    ->with('success','Berita berhasil diubah');
    }

    public function destroy(Berita $berita)
    {
        if($berita->thumbnail){

            Storage::disk('public')
                ->delete($berita->thumbnail);
        }

        $berita->delete();

        return back()
            ->with('success','Berita berhasil dihapus');
    }

    public function show(Berita $berita)
{
    return redirect()
        ->route('admin-berita.edit', $berita->id);
}
}