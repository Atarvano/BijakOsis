<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaSekolah extends Model
{
    use HasFactory;

    protected $table = 'siswa_sekolah';

    protected $fillable = [
        'nisn',
        'nama',
        'kelas_id',
        'nilai_siswa',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function nilaiSiswa()
    {
        return $this->hasOne(NilaiSiswa::class, 'siswa_id');
    }

    public function eskul()
    {
        return $this->hasOne(EskulSiswa::class, 'siswa_id');
    }
}