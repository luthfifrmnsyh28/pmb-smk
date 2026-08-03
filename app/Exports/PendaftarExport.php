<?php

namespace App\Exports;

use App\Models\Pendaftar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PendaftarExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Pendaftar::with([
            'jurusan',
            'gelombang'
        ])->get()->map(function ($item) {

            return [

                $item->nomor_pendaftaran,

                $item->nama_lengkap,

                $item->nisn,

                $item->nik,

                $item->jurusan->nama_jurusan ?? '-',

                $item->asal_sekolah,

                $item->no_hp,

                $item->status,
            ];
        });
    }

    public function headings(): array
    {
        return [

            'Nomor Pendaftaran',
            'Nama Lengkap',
            'NISN',
            'NIK',
            'Jurusan',
            'Asal Sekolah',
            'No HP',
            'Status',
        ];
    }
}