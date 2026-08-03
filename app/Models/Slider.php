<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'judul',
        'subjudul',
        'gambar',
        'aktif',
        'urutan'
    ];
}