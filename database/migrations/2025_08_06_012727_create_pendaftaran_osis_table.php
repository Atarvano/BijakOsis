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
        Schema::create('pendaftaran_osis', function (Blueprint $table) {
            $table->id();
            $table->integer('nisn');
            $table->string('nama');
            $table->integer('kelas_id');
            $table->integer('no_hp');
            $table->text('motivasi');
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_osis');
    }
};
