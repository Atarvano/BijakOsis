<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EskulSiswa;
use App\Models\SiswaSekolah;
use App\Models\Attendance;

class EskulSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $daftarEskul = [
            'Pramuka',
            'PMR (Palang Merah Remaja)',
            'OSIS',
            'Basket',
            'Futsal',
            'Voli',
            'Badminton',
            'Tenis Meja',
            'Band',
            'Paduan Suara',
            'Tari',
            'Teater',
            'Jurnalistik',
            'KIR (Karya Ilmiah Remaja)',
            'Rohis',
            'English Club',
            'Komputer',
            'Fotografi',
            'Paskibra',
            'Pencak Silat'
        ];

        // Ambil semua siswa yang sudah ada
        $allSiswa = SiswaSekolah::all();

        foreach ($allSiswa as $siswa) {
            // Random pilih 1-2 eskul untuk setiap siswa
            $jumlahEskul = rand(1, 2);
            $selectedEskul = collect($daftarEskul)->random($jumlahEskul)->toArray();

            $eskulData = [
                'siswa_id' => $siswa->id,
                'nama_eskul1' => $selectedEskul[0],
                'nama_eskul2' => isset($selectedEskul[1]) ? $selectedEskul[1] : null,
            ];

            $eskul = EskulSiswa::create($eskulData);

            // Generate data attendance untuk semester ini (200 hari)
            $totalHariEfektif = 200;
            $totalHadir = rand(floor($totalHariEfektif * 0.8), $totalHariEfektif); // 80-100% kehadiran
            $totalAlpha = rand(0, 15);
            $totalIzin = rand(0, 10);
            $totalSakit = rand(0, 8);

            // Pastikan total tidak melebihi hari efektif
            $totalAbsen = $totalAlpha + $totalIzin + $totalSakit;
            if ($totalHadir + $totalAbsen > $totalHariEfektif) {
                $sisaHari = $totalHariEfektif - $totalHadir;
                $totalAlpha = min($totalAlpha, floor($sisaHari * 0.6));
                $totalIzin = min($totalIzin, floor($sisaHari * 0.3));
                $totalSakit = min($totalSakit, $sisaHari - $totalAlpha - $totalIzin);
            }

            $attendanceData = [
                'siswa_id' => $siswa->id,
                'total_hari_efektif' => $totalHariEfektif,
                'total_hadir' => $totalHadir,
                'total_alpha' => $totalAlpha,
                'total_izin' => $totalIzin,
                'total_sakit' => $totalSakit,
            ];

            $attendance = Attendance::create($attendanceData);

            // Update foreign key di siswa_sekolah
            $siswa->update([
                'eskul_id' => $eskul->id,
                'attendance_id' => $attendance->id
            ]);
        }

        $this->command->info('Data eskul dan attendance berhasil di-generate untuk ' . $allSiswa->count() . ' siswa');
        $this->command->info('Total attendance records: ' . $allSiswa->count());
    }
}
