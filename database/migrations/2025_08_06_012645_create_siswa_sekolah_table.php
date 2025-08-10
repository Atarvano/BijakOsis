<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswa_sekolah', function (Blueprint $table) {
            $table->id();
            $table->integer('nisn')->unique();
            $table->string('nama');
            $table->integer('kelas_id');
            $table->integer('nilai_siswa');
            $table->foreign('nilai_siswa')->references('id')->on('nilai_siswa');
            $table->foreign('kelas_id')->references('id')->on('kelas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa_sekolah');
    }
};
