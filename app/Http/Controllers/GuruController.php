<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::orderBy('urutan')->get();

        return view('guru.index',compact('guru'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'nama'=>'required',
            'nip'=>'nullable',
            'jabatan'=>'required',
            'foto'=>'nullable|image',
            'deskripsi'=>'nullable',
            'status'=>'required',
            'urutan'=>'nullable'
        ]);

        if($request->hasFile('foto')){
            $data['foto']=$request->file('foto')
                ->store('guru','public');
        }

        Guru::create($data);

        return redirect()->route('guru.index')
            ->with('success','Data berhasil ditambah');
    }

    public function edit(Guru $guru)
    {
        return view('guru.edit',compact('guru'));
    }

    public function update(Request $request,Guru $guru)
    {
        $data=$request->validate([
            'nama'=>'required',
            'nip'=>'nullable',
            'jabatan'=>'required',
            'foto'=>'nullable|image',
            'deskripsi'=>'nullable',
            'status'=>'required',
            'urutan'=>'nullable'
        ]);

        if($request->hasFile('foto')){

            if($guru->foto){
                Storage::disk('public')->delete($guru->foto);
            }

            $data['foto']=$request->file('foto')
                ->store('guru','public');
        }

        $guru->update($data);

        return redirect()->route('guru.index')
            ->with('success','Berhasil diubah');
    }

    public function destroy(Guru $guru)
    {
        if($guru->foto){
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();

        return back()->with('success','Berhasil dihapus');
    }
}