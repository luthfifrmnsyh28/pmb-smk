<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    protected $fillable = [
    'visi',
    'misi',
    'tujuan',
    'motto',
    'budaya',
];
}