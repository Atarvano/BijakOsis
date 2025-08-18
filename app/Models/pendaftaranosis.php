<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendaftaranosis extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_osis';

    protected $fillable = [
        'nisn',
        'nama',
        'kelas_id',
        'no_hp',
        'motivasi',
        'status'
    ];

    // Jika ingin relasi ke kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
