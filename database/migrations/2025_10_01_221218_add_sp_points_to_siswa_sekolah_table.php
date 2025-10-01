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
            $table->integer('sp_points')->default(0)->after('nilai_siswa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siswa_sekolah', function (Blueprint $table) {
            $table->dropColumn('sp_points');
        });
    }
};
