<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Kelas;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kelas>
 */
class KelasFactory extends Factory
{
    protected $model = \App\Models\Kelas::class;
    public function definition(): array
    {
        return [
            'nama' => $this->faker->randomElement(['X IPA 1', 'X IPA 2', 'XI IPS 1', 'XI IPS 2', 'XII IPA 1', 'XII IPS 2']),
        ];
    }
}
