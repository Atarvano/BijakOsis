<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiSiswa extends Model
{
    use HasFactory;  

    protected $table = 'nilai_siswa';
    protected $fillable = ['siswa_id','b_indo','b_inggris','sejarah','pelajaran_jurusan','mtk'];
}
