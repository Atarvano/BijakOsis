<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siswasekolah extends Model
{
    protected $table = 'siswa_sekolah';

    protected $fillable = [
        'nama',
        'nisn',
        'kelas_id',
        'nilai_siswa',
        'motivasi',
    ];

    protected $primaryKey = 'id';

}
