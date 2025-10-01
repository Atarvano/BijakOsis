<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiswaSekolah;
use App\Models\EskulSiswa;
use App\Models\Attendance;

class UpdateKolomBaruSeeder extends Seeder
{
    /**
     * Seeder khusus untuk update kolom baru saja
     * (sp_points, eskul, attendance)
     * Untuk teman yang udah punya data siswa
     */
    public function run(): void
    {
        echo "🔄 Update kolom baru untuk siswa yang sudah ada...\n\n";

        $siswa = SiswaSekolah::all();

        if ($siswa->count() == 0) {
            echo "❌ Tidak ada data siswa! Jalankan seeder data siswa dulu.\n";
            return;
        }

        echo "📊 Ditemukan {$siswa->count()} siswa existing\n\n";

        // 1. Update SP Points
        $this->updateSpPoints($siswa);

        // 2. Buat data Eskul
        $this->createEskul($siswa);

        // 3. Buat data Attendance
        $this->createAttendance($siswa);

        echo "\n✅ Update kolom baru selesai!\n";
        echo "📊 Data yang diupdate:\n";
        echo "   - SP Points: {$siswa->count()} siswa\n";
        echo "   - Eskul: " . EskulSiswa::count() . " record\n";
        echo "   - Attendance: " . Attendance::count() . " record\n";
    }

    private function updateSpPoints($siswa)
    {
        echo "⚠️ Update SP Points...\n";

        foreach ($siswa as $s) {
            // Skip jika sp_points sudah ada (bukan 0 atau null)
            if ($s->sp_points && $s->sp_points > 0) {
                continue;
            }

            // Array dengan probabilitas: 60% = 0, 20% = 300, 15% = 600, 5% = 900
            $values = [
                0,
                0,
                0,
                0,
                0,
                0,     // 60%
                300,
                300,             // 20%
                600,                  // 10%
                900                   // 10%
            ];

            $sp_points = $values[array_rand($values)];
            $s->update(['sp_points' => $sp_points]);

            if ($sp_points > 0) {
                echo "   {$s->nama}: {$sp_points} SP Points\n";
            }
        }
    }

    private function createEskul($siswa)
    {
        echo "\n🏃 Buat data Eskul...\n";

        // Hapus data eskul lama (kalau ada)
        EskulSiswa::truncate();

        $eskulList = [
            'Pramuka',
            'PMR',
            'Paskibra',
            'OSIS',
            'MPK',
            'Basket',
            'Futsal',
            'Voli',
            'Badminton',
            'Tenis Meja',
            'Karate',
            'Taekwondo',
            'Silat',
            'Judo',
            'Kempo',
            'Paduan Suara',
            'Band',
            'Tari',
            'Teater',
            'English Club'
        ];

        foreach ($siswa as $s) {
            // Random 1-2 eskul per siswa
            $jumlahEskul = rand(1, 2);
            $eskul1 = $eskulList[array_rand($eskulList)];
            $eskul2 = $jumlahEskul == 2 ? $eskulList[array_rand($eskulList)] : null;

            // Pastikan eskul2 berbeda dari eskul1
            while ($eskul2 && $eskul2 == $eskul1) {
                $eskul2 = $eskulList[array_rand($eskulList)];
            }

            EskulSiswa::create([
                'siswa_id' => $s->id,
                'nama_eskul1' => $eskul1,
                'nama_eskul2' => $eskul2,
            ]);

            echo "   {$s->nama}: {$eskul1}" . ($eskul2 ? ", {$eskul2}" : "") . "\n";
        }
    }

    private function createAttendance($siswa)
    {
        echo "\n📅 Buat data Attendance...\n";

        // Hapus data attendance lama (kalau ada)
        Attendance::truncate();

        foreach ($siswa as $s) {
            // Generate data attendance random tapi realistis
            $total_hari_efektif = 200;
            $total_hadir = rand(160, 195); // 80-97.5% kehadiran
            $total_sakit = rand(0, 10);
            $total_izin = rand(0, 8);
            $total_alpha = $total_hari_efektif - $total_hadir - $total_sakit - $total_izin;

            // Pastikan alpha tidak negatif
            if ($total_alpha < 0) {
                $total_alpha = 0;
                $total_hadir = $total_hari_efektif - $total_sakit - $total_izin;
            }

            Attendance::create([
                'siswa_id' => $s->id,
                'total_hari_efektif' => $total_hari_efektif,
                'total_hadir' => $total_hadir,
                'total_sakit' => $total_sakit,
                'total_izin' => $total_izin,
                'total_alpha' => $total_alpha,
            ]);

            $persentase = round(($total_hadir / $total_hari_efektif) * 100, 1);
            echo "   {$s->nama}: {$persentase}% kehadiran\n";
        }
    }
}
