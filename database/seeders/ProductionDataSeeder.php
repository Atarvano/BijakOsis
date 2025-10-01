<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;
use App\Models\SiswaSekolah;
use App\Models\NilaiSiswa;
use App\Models\EskulSiswa;
use App\Models\Attendance;
use App\Models\UsersGuru;

class ProductionDataSeeder extends Seeder
{
    /**
     * Run the database seeds untuk production/deployment.
     * Seeder ini akan generate semua data yang dibutuhkan untuk aplikasi BijakOSIS
     */
    public function run(): void
    {
        echo "🚀 Memulai seeding data production...\n\n";

        // 1. Buat data kelas
        $this->seedKelas();

        // 2. Buat data siswa
        $this->seedSiswa();

        // 3. Buat data nilai siswa
        $this->seedNilaiSiswa();

        // 4. Buat data eskul
        $this->seedEskul();

        // 5. Buat data attendance
        $this->seedAttendance();

        // 6. Update SP Points
        $this->seedSpPoints();

        // 7. Buat user guru
        $this->seedGuru();

        echo "\n✅ Seeding production data selesai!\n";
        echo "📊 Data yang dibuat:\n";
        echo "   - Kelas: " . Kelas::count() . "\n";
        echo "   - Siswa: " . SiswaSekolah::count() . "\n";
        echo "   - Nilai: " . NilaiSiswa::count() . "\n";
        echo "   - Eskul: " . EskulSiswa::count() . "\n";
        echo "   - Attendance: " . Attendance::count() . "\n";
        echo "   - Guru: " . UsersGuru::count() . "\n";
    }

    private function seedKelas()
    {
        echo "📚 Seeding kelas...\n";

        $kelas = [
            ['nama' => 'X IPA 1'],
            ['nama' => 'X IPA 2'],
            ['nama' => 'X IPS 1'],
            ['nama' => 'X IPS 2'],
            ['nama' => 'XI IPA 1'],
            ['nama' => 'XI IPA 2'],
            ['nama' => 'XI IPS 1'],
            ['nama' => 'XI IPS 2'],
            ['nama' => 'XII IPA 1'],
            ['nama' => 'XII IPA 2'],
            ['nama' => 'XII IPS 1'],
            ['nama' => 'XII IPS 2'],
        ];

        foreach ($kelas as $k) {
            Kelas::create($k);
        }
    }

    private function seedSiswa()
    {
        echo "👥 Seeding siswa (100 siswa)...\n";

        // Generate 100 siswa
        SiswaSekolah::factory(100)->create();
    }

    private function seedNilaiSiswa()
    {
        echo "📝 Seeding nilai siswa...\n";

        $siswa = SiswaSekolah::all();
        foreach ($siswa as $s) {
            NilaiSiswa::factory()->create(['siswa_id' => $s->id]);
        }
    }

    private function seedEskul()
    {
        echo "🏃 Seeding eskul siswa...\n";

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

        $siswa = SiswaSekolah::all();
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
        }
    }

    private function seedAttendance()
    {
        echo "📅 Seeding attendance...\n";

        $siswa = SiswaSekolah::all();
        foreach ($siswa as $s) {
            Attendance::factory()->create(['siswa_id' => $s->id]);
        }
    }

    private function seedSpPoints()
    {
        echo "⚠️ Seeding SP Points...\n";

        $siswa = SiswaSekolah::all();
        foreach ($siswa as $s) {
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
        }
    }

    private function seedGuru()
    {
        echo "👨‍🏫 Seeding user guru...\n";

        UsersGuru::create([
            'nama' => 'Admin OSIS',
            'email' => 'admin@sekolah.com',
            'password' => bcrypt('admin123'),
        ]);
    }
}
