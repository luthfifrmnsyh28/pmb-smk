<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriGaleri extends Model
{
    protected $fillable = [
        'nama',
        'status',
        'urutan',
    ];

    public function galeris()
    {
        return $this->hasMany(
            Galeri::class,
            'kategori_galeri_id'
        );
    }
}