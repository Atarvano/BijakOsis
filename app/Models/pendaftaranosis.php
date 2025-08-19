<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranOsis extends Model
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

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
