<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galeris', function (Blueprint $table) {

            $table->id();

            $table->foreignId('kategori_galeri_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('judul');

            $table->string('foto');

            $table->text('deskripsi')
                  ->nullable();

            $table->boolean('status')
                  ->default(1);

            $table->integer('urutan')
                  ->default(1);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};