<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'nama_sekolah',
        'logo',
        'npsn',
        'akreditasi',
        'alamat',
        'telepon',
        'email',
        'website',
        'visi',
        'misi',
        'nama_kepala_sekolah',
        'foto_kepala_sekolah',
        'sambutan_kepala_sekolah',
        'google_maps'
    ];
}