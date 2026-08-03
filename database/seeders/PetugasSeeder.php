<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PetugasSeeder extends Seeder
{
    public function run(): void
    {
        $petugas = User::firstOrCreate(
            [
                'email' => 'petugas@smkspgriindramayu.sch.id'
            ],
            [
                'name' => 'Petugas PPDB',
                'password' => Hash::make('petugas123'),
            ]
        );

        $petugas->assignRole('petugas');
    }
}