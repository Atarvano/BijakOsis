<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaSekolah extends Model
{
    use HasFactory;

    protected $table = 'siswa_sekolah';
    protected $fillable = ['nisn','nama','kelas_id','nilai_siswa'];
}
