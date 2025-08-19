<?php

namespace Database\Factories;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaSekolahFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nisn' => (int) $this->faker->unique()->numerify('##########'), 
            'nama' => $this->faker->name(), 
            'kelas_id' => Kelas::inRandomOrder()->value('id') ?? 1,
            'nilai_siswa' => 0,
        ];
    }
}
