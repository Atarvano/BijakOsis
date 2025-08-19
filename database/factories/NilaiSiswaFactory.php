<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NilaiSiswaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'b_indo'            => $this->faker->numberBetween(60, 100),
            'b_inggris'         => $this->faker->numberBetween(60, 100),
            'sejarah'           => $this->faker->numberBetween(60, 100),
            'pelajaran_jurusan' => $this->faker->numberBetween(60, 100),
            'mtk'               => $this->faker->numberBetween(60, 100),
        ];
    }
}
