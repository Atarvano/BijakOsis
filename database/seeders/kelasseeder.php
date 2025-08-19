<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        $list = ['X PPLG 1', 'X PPLG 2', 'X TKJ 1', 'X TKJ 2', 'XI PPLG 1', 'XI PPLG 2', 'XI TKJ 1', 'XI TKJ 2', 'XII PPLG 1', 'XII PPLG 2', 'XII TKJ 1', 'XII TKJ 2'];
        foreach ($list as $nama) {
            Kelas::firstOrCreate(['nama' => $nama]);
        }
    }
}
