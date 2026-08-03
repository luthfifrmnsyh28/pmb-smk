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
    Schema::create('settings', function (Blueprint $table) {
        $table->id();

        $table->string('nama_sekolah');
        $table->string('logo')->nullable();

        $table->string('npsn')->nullable();
        $table->string('akreditasi')->nullable();

        $table->text('alamat')->nullable();

        $table->string('telepon')->nullable();
        $table->string('email')->nullable();

        $table->string('website')->nullable();

        $table->longText('visi')->nullable();
        $table->longText('misi')->nullable();

        $table->string('nama_kepala_sekolah')->nullable();
        $table->string('foto_kepala_sekolah')->nullable();
        $table->longText('sambutan_kepala_sekolah')->nullable();

        $table->longText('google_maps')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
