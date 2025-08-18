<?php

namespace Database\Seeders;

use App\Models\SiswaSekolah;
use App\Models\NilaiSiswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SiswaDanNilaiSeeder extends Seeder
{
    public function run(): void
    {
        $driver = DB::getDriverName();
        if ($driver === 'sqlite') {
            DB::statement('PRAGMA foreign_keys = OFF;');
        } else {
            Schema::disableForeignKeyConstraints();
        }

        $siswas = SiswaSekolah::factory()->count(50)->create();

        foreach ($siswas as $siswa) {
            $nilai = NilaiSiswa::factory()->create([
                'siswa_id' => $siswa->id,
            ]);

            $siswa->update(['nilai_siswa' => $nilai->id]);
        }

        if ($driver === 'sqlite') {
            DB::statement('PRAGMA foreign_keys = ON;');
        } else {
            Schema::enableForeignKeyConstraints();
        }
    }
}
