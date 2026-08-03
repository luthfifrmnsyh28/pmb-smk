<?php

namespace App\Http\Controllers;

use App\Models\Gelombang;
use Illuminate\Http\Request;

class GelombangController extends Controller
{
    public function index()
    {
        $gelombangs = Gelombang::latest()->get();

        return view('gelombang.index', compact('gelombangs'));
    }

    public function create()
    {
        return view('gelombang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_gelombang' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'kuota' => 'required|integer|min:1',
            'status' => 'required|boolean',
        ]);

       

        Gelombang::create([
            'nama_gelombang' => $request->nama_gelombang,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'kuota' => $request->kuota,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('gelombang.index')
            ->with('success', 'Gelombang berhasil ditambahkan');
    }

    public function edit(Gelombang $gelombang)
    {
        return view('gelombang.edit', compact('gelombang'));
    }

    public function update(Request $request, Gelombang $gelombang)
    {
        $request->validate([
            'nama_gelombang' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'kuota' => 'required|integer|min:1',
            'status' => 'required|boolean',
        ]);

        

        $gelombang->update([
            'nama_gelombang' => $request->nama_gelombang,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'kuota' => $request->kuota,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('gelombang.index')
            ->with('success', 'Gelombang berhasil diperbarui');
    }

    public function destroy(Gelombang $gelombang)
    {
        $gelombang->delete();

        return redirect()
            ->route('gelombang.index')
            ->with('success', 'Gelombang berhasil dihapus');
    }
}