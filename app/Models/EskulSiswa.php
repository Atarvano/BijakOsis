<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EskulSiswa extends Model
{
    use HasFactory;

    protected $table = 'eskul_siswa';

    protected $fillable = [
        'siswa_id',
        'nama_eskul1',
        'nama_eskul2',
    ];

    public function siswa()
    {
        return $this->belongsTo(SiswaSekolah::class, 'siswa_id');
    }
}