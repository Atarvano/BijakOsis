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
        Schema::table('siswa_sekolah', function (Blueprint $table) {
            $table->unsignedBigInteger('eskul_id')->nullable()->after('nilai_siswa');
            $table->unsignedBigInteger('attendance_id')->nullable()->after('eskul_id');

            $table->foreign('eskul_id')->references('id')->on('eskul_siswa')->onDelete('set null');
            $table->foreign('attendance_id')->references('id')->on('attendance')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siswa_sekolah', function (Blueprint $table) {
            $table->dropForeign(['eskul_id']);
            $table->dropForeign(['attendance_id']);
            $table->dropColumn(['eskul_id', 'attendance_id']);
        });
    }
};
