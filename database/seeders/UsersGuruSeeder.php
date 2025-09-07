<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersGuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users_guru')->insert([
            [
                'username' => 'budi.santoso',
                'password' => Hash::make('password123'),
                'nama' => 'Budi Santoso',
                'nip' => '198001012005011001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'siti.aminah',
                'password' => Hash::make('password123'),
                'nama' => 'Siti Aminah',
                'nip' => '198202022006022002',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'agus.prabowo',
                'password' => Hash::make('password123'),
                'nama' => 'Agus Prabowo',
                'nip' => '197903032004033003',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
