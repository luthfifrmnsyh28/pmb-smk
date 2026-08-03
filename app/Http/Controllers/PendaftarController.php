<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pendaftar;
use App\Models\Jurusan;
use App\Models\Gelombang;
use App\Exports\PendaftarExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftarController extends Controller
{
    public function index(Request $request)
{
    $query = Pendaftar::with([
        'jurusan',
        'gelombang',
        'user'
    ]);

    // Cari nama / nomor pendaftaran
    if ($request->filled('search')) {

        $query->where(function ($q) use ($request) {

            $q->where(
                'nama_lengkap',
                'like',
                '%' . $request->search . '%'
            );

            $q->orWhere(
                'nomor_pendaftaran',
                'like',
                '%' . $request->search . '%'
            );

        });

    }

    // Filter Status
    if ($request->filled('status')) {

        $query->where(
            'status',
            $request->status
        );

    }

    // Filter Jurusan
    if ($request->filled('jurusan')) {

        $query->where(
            'jurusan_id',
            $request->jurusan
        );

    }

    // Filter Gelombang
    if ($request->filled('gelombang')) {

        $query->where(
            'gelombang_id',
            $request->gelombang
        );

    }

    $pendaftars = $query
        ->latest()
        ->paginate(10);

    $jurusans = Jurusan::all();

    $gelombangs = Gelombang::all();

    return view(
        'pendaftar.index',
        compact(
            'pendaftars',
            'jurusans',
            'gelombangs'
        )
    );
}

    public function store(Request $request)
    {
        $request->validate([
            'jurusan_id' => 'required',
            'gelombang_id' => 'required',
            'nisn' => 'required',
            'nik' => 'required',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $nomor = 'PPDB-' . date('Y') . '-' .
            str_pad(
                Pendaftar::count() + 1,
                5,
                '0',
                STR_PAD_LEFT
            );

        $data = [
            'user_id' => Auth::id(),
            'jurusan_id' => $request->jurusan_id,
            'gelombang_id' => $request->gelombang_id,
            'nomor_pendaftaran' => $nomor,
            'nisn' => $request->nisn,
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'asal_sekolah' => $request->asal_sekolah,
            'no_hp' => $request->no_hp,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'status' => 'menunggu',
        ];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')
                ->store('foto', 'public');
        }

        if ($request->hasFile('ijazah')) {
            $data['ijazah'] = $request->file('ijazah')
                ->store('ijazah', 'public');
        }

        if ($request->hasFile('kk')) {
            $data['kk'] = $request->file('kk')
                ->store('kk', 'public');
        }

        if ($request->hasFile('akta')) {
            $data['akta'] = $request->file('akta')
                ->store('akta', 'public');
        }

        Pendaftar::create($data);

        return redirect()
            ->route('pendaftar.index')
            ->with('success', 'Pendaftaran berhasil disimpan');
    }

    public function show(Pendaftar $pendaftar)
{
    $pendaftar->load([
        'jurusan',
        'gelombang',
        'user'
    ]);

    return view(
        'pendaftar.show',
        compact('pendaftar')
    );
}

    public function edit(Pendaftar $pendaftar)
    {
        $jurusans = Jurusan::all();
        $gelombangs = Gelombang::all();

        return view('pendaftar.edit', compact(
            'pendaftar',
            'jurusans',
            'gelombangs'
        ));
    }

    public function update(Request $request, Pendaftar $pendaftar)
{
    $pendaftar->update([
        'status' => $request->status,
        'jurusan_id' => $request->jurusan_id,
    ]);

    return redirect()
        ->route('pendaftar.index')
        ->with('success', 'Data berhasil diperbarui');
}

    public function destroy(Pendaftar $pendaftar)
    {
        $pendaftar->delete();

        return redirect()
            ->route('pendaftar.index')
            ->with('success', 'Data berhasil dihapus');

            
    }
public function cetak(Pendaftar $pendaftar)
{
    $pdf = Pdf::loadView(
        'pendaftar.pdf',
        compact('pendaftar')
    );

    return $pdf->download(
        'Bukti-Pendaftaran-' .
        $pendaftar->nomor_pendaftaran .
        '.pdf'
    );
}
    
public function kartu(Pendaftar $pendaftar)
{
    $pdf = Pdf::loadView(
        'pendaftar.kartu',
        compact('pendaftar')
    );

    return $pdf->download(
        'Kartu-Peserta-' .
        $pendaftar->nomor_pendaftaran .
        '.pdf'
    );
}

public function exportExcel()
{
    return Excel::download(
        new PendaftarExport,
        'Data-Pendaftar.xlsx'
    );
}
}