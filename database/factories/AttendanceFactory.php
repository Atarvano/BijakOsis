<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $totalHariEfektif = 200; // tetap 200 hari
        $totalHadir = $this->faker->numberBetween(160, 200); // 80-100% kehadiran
        $totalAlpha = $this->faker->numberBetween(0, 15);
        $totalIzin = $this->faker->numberBetween(0, 10);
        $totalSakit = $this->faker->numberBetween(0, 8);

        // Pastikan total tidak melebihi hari efektif
        $totalAbsen = $totalAlpha + $totalIzin + $totalSakit;
        if ($totalHadir + $totalAbsen > $totalHariEfektif) {
            $totalHadir = $totalHariEfektif - $totalAbsen;
        }

        return [
            'siswa_id' => \App\Models\SiswaSekolah::factory(),
            'total_hari_efektif' => $totalHariEfektif,
            'total_hadir' => $totalHadir,
            'total_alpha' => $totalAlpha,
            'total_izin' => $totalIzin,
            'total_sakit' => $totalSakit,
        ];
    }
}
