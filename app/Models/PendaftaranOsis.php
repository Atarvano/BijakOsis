<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PendaftaranOsis extends Authenticatable
{
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
