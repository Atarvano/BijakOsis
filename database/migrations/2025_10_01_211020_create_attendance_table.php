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
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->integer('total_hari_efektif')->default(200); // 200 hari dalam semester
            $table->integer('total_hadir')->default(0);
            $table->integer('total_alpha')->default(0);
            $table->integer('total_izin')->default(0);
            $table->integer('total_sakit')->default(0);
            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('siswa_sekolah')->onDelete('cascade');
            $table->unique(['siswa_id']); // satu siswa satu record
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};