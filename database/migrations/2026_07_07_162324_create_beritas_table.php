<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('beritas', function (Blueprint $table) {

            $table->id();

            $table->string('judul');

            $table->string('slug')->unique();

            $table->string('thumbnail')->nullable();

            $table->longText('isi');

            $table->tinyInteger('status')->default(1);

            $table->integer('views')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};