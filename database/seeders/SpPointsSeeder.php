<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiswaSekolah;

class SpPointsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua siswa
        $siswa = SiswaSekolah::all();

        echo "Generating SP Points untuk " . $siswa->count() . " siswa...\n";

        foreach ($siswa as $s) {
            // Array nilai SP Points dengan probabilitas:
            // 60% chance untuk 0
            // 20% chance untuk 300
            // 15% chance untuk 600
            // 5% chance untuk 900
            $values = [
                0,
                0,
                0,
                0,
                0,
                0,     // 60% (6 dari 10)
                300,
                300,             // 20% (2 dari 10)
                600,                  // 10% (1 dari 10)
                900                   // 10% (1 dari 10)
            ];

            // Pilih random dari array
            $sp_points = $values[array_rand($values)];

            // Update siswa
            $s->update(['sp_points' => $sp_points]);

            echo "Siswa {$s->nama}: {$sp_points} SP Points\n";
        }

        // Tampilkan statistik
        $stats = SiswaSekolah::selectRaw('sp_points, COUNT(*) as count')
            ->groupBy('sp_points')
            ->orderBy('sp_points')
            ->get();

        echo "\n=== STATISTIK SP POINTS ===\n";
        foreach ($stats as $stat) {
            $percentage = round(($stat->count / $siswa->count()) * 100, 1);
            echo "{$stat->sp_points} points: {$stat->count} siswa ({$percentage}%)\n";
        }
    }
}
