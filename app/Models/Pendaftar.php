<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    protected $fillable = [
        'user_id',
        'jurusan_id',
        'gelombang_id',
        'nomor_pendaftaran',
        'nisn',
        'nik',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'asal_sekolah',
        'no_hp',
        'nama_ayah',
        'nama_ibu',
        'foto',
        'ijazah',
        'kk',
        'akta',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function gelombang()
    {
        return $this->belongsTo(Gelombang::class);
    }
}