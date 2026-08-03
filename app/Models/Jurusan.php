<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $fillable = [
        'kode_jurusan',
        'nama_jurusan',
        'kuota',
        'deskripsi',
        'status',
    ];

    public function pendaftars()
    {
        return $this->hasMany(Pendaftar::class);
    }
}