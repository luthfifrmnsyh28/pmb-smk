<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('pendaftars', function (Blueprint $table) {

        $table->id();

        $table->foreignId('user_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->foreignId('jurusan_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->foreignId('gelombang_id')
              ->constrained()
              ->cascadeOnDelete();

        // Nomor pendaftaran otomatis
        $table->string('nomor_pendaftaran')->unique();

        // Biodata
        $table->string('nisn')->nullable();
        $table->string('nik')->nullable();

        $table->string('nama_lengkap');

        $table->string('jenis_kelamin');

        $table->string('tempat_lahir')->nullable();

        $table->date('tanggal_lahir')->nullable();

        $table->text('alamat')->nullable();

        $table->string('asal_sekolah')->nullable();

        $table->string('no_hp')->nullable();

        $table->string('nama_ayah')->nullable();

        $table->string('nama_ibu')->nullable();

        // Berkas
        $table->string('foto')->nullable();

        $table->string('ijazah')->nullable();

        $table->string('kk')->nullable();

        $table->string('akta')->nullable();

        // Status
        $table->enum('status', [
            'menunggu',
            'diterima',
            'ditolak'
        ])->default('menunggu');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftars');
    }
};
