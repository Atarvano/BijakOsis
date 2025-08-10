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
        Schema::create('nilai_siswa', function (Blueprint $table) {
            $table->id();
            $table->integer('siswa_id');
            $table->float('b_indo')->nullable();
            $table->float('b_inggris')->nullable();
            $table->float('sejarah')->nullable();
            $table->float('pelajaran_jurusan')->nullable();
            $table->float('mtk')->nullable();
            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('siswa_sekolah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_siswa');
    }
};
