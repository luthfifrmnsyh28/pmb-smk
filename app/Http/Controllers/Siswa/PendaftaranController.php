<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Pendaftar;
use App\Models\Jurusan;
use App\Models\Gelombang;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftar = Pendaftar::where('user_id', auth()->id())->first();

        $jurusans = Jurusan::where('status', 1)->get();

        $gelombangs = Gelombang::where('status', 1)->get();

        return view('siswa.pendaftaran.index', compact(
            'pendaftar',
            'jurusans',
            'gelombangs'
        ));
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'nama_lengkap' => 'required|string|max:255',
                'jurusan_id'   => 'required|exists:jurusans,id',

                'foto'   => 'nullable|image|max:2048',
                'ijazah' => 'nullable|mimes:pdf,jpg,jpeg,png|max:4096',
                'kk'     => 'nullable|mimes:pdf,jpg,jpeg,png|max:4096',
                'akta'   => 'nullable|mimes:pdf,jpg,jpeg,png|max:4096',
            ]);

            if (Pendaftar::where('user_id', auth()->id())->exists()) {
                return redirect()
                    ->route('pendaftaran.saya')
                    ->with('error', 'Anda sudah melakukan pendaftaran.');
            }

            $gelombang = Gelombang::where('status', 1)->first();

            if (!$gelombang) {
                return redirect()
                    ->route('pendaftaran.saya')
                    ->with('error', 'Belum ada gelombang pendaftaran yang aktif.');
            }

            // Generate nomor pendaftaran yang aman
$next = (Pendaftar::max('id') ?? 0) + 1;

do {

    $nomor = 'PMB-' . date('Y') . '-' . str_pad($next, 5, '0', STR_PAD_LEFT);

    $next++;

} while (Pendaftar::where('nomor_pendaftaran', $nomor)->exists());

            $data = [
                'user_id' => auth()->id(),
                'jurusan_id' => $request->jurusan_id,
                'gelombang_id' => $gelombang->id,
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
                $data['foto'] = $request->file('foto')->store('foto', 'public');
            }

            if ($request->hasFile('kk')) {
                $data['kk'] = $request->file('kk')->store('kk', 'public');
            }

            if ($request->hasFile('akta')) {
                $data['akta'] = $request->file('akta')->store('akta', 'public');
            }

            if ($request->hasFile('ijazah')) {
                $data['ijazah'] = $request->file('ijazah')->store('ijazah', 'public');
            }

            $pendaftar = Pendaftar::create($data);

            return redirect()
                ->route('pendaftaran.saya')
                ->with('success', 'Pendaftaran berhasil disimpan.');

        } catch (\Throwable $e) {

            dd(
                $e->getMessage(),
                $e->getFile(),
                $e->getLine()
            );

        }
    }
}