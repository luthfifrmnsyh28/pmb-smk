<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KepalaSekolah extends Model
{
    protected $fillable = [

        'nama',
        'nip',
        'jabatan',
        'foto',
        'sambutan'

    ];
}