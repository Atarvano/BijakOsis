<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EskulSiswa>
 */
class EskulSiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
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

        $selectedEskul = collect($daftarEskul)->random(2)->toArray();

        return [
            'siswa_id' => \App\Models\SiswaSekolah::factory(),
            'nama_eskul1' => $selectedEskul[0],
            'nama_eskul2' => $this->faker->boolean(60) ? $selectedEskul[1] : null,
        ];
    }
}
