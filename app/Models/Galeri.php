<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $fillable = [
        'kategori_galeri_id',
        'judul',
        'foto',
        'deskripsi',
        'status',
        'urutan'
    ];

    public function kategori()
    {
        return $this->belongsTo(
            KategoriGaleri::class,
            'kategori_galeri_id'
        );
    }
}